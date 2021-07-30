<?php 
include_once '../config/config.php'; 

class product_m extends Connect 
{
	function __construct()
	{
		parent::__construct();
	}

	public function sumCount(){
		$sql="SELECT COUNT(id) as id FROM tbl_product";;
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetch(PDO::FETCH_ASSOC);
	}
	public function getProduct(){
		$sql = "SELECT tbl_product.id, tbl_product.name, tbl_product.price, tbl_product.quantity, tbl_product.img, tbl_product.description, tbl_product.create_at, tbl_cate.name_cate FROM tbl_product, tbl_cate WHERE tbl_product.cate_id = tbl_cate.id ORDER BY tbl_product.create_at DESC";
		$pre = $this->pdo->prepare($sql);
		
		$pre->execute(); 
		$result = array();
		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getProducts($page){
		$sql = "SELECT tbl_product.id, tbl_product.name, tbl_product.price, tbl_product.quantity, tbl_product.img, tbl_product.description, tbl_product.create_at, tbl_cate.name_cate FROM tbl_product, tbl_cate WHERE tbl_product.cate_id = tbl_cate.id ORDER BY tbl_product.create_at DESC LIMIT :page, 6";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':page', $page, PDO::PARAM_INT);
		$pre->execute(); 
		$result = array();
		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function searchProduct($key){
		$sql = "SELECT tbl_product.id, tbl_product.name, tbl_product.price, tbl_product.quantity, tbl_product.slug, tbl_product.description, tbl_product.create_at, tbl_cate.name_cate FROM tbl_product, tbl_cate WHERE tbl_product.cate_id = tbl_cate.id AND tbl_product.name LIKE :key ORDER BY tbl_product.create_at DESC";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':key', $key);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getCate(){
		$sql = "SELECT * FROM tbl_cate";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getProductById($id){
		$sql ="SELECT * FROM tbl_cate, tbl_product WHERE tbl_cate.id = tbl_product.cate_id AND tbl_product.id=:id";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':id', $id);
		$pre->execute();
		return $pre->fetch(PDO::FETCH_ASSOC);
	}

	public function updateProduct($id, $namePro, $id_cate, $price, $quantity, $description){
		$sql = "update tbl_product SET name = :namePro, cate_id = :id_cate, price = :price, quantity=:quantity, description=:description WHERE id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':namePro', $namePro);
			$pre->bindParam(':id_cate', $id_cate);
			$pre->bindParam(':price', $price);
			$pre->bindParam(':quantity', $quantity);
			$pre->bindParam(':description', $description);
			
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}

		public function updateImg($id, $img){
			$sql = "update tbl_img_detail, tbl_product SET tbl_img_detail.img=:img WHERE tbl_product.id = :id and tbl_product.id = tbl_img_detail.product_id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':img', $img);
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}

		public function updateProductImg($id, $img){
			$sql = "update tbl_product SET tbl_product.img=:img WHERE tbl_product.id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':img', $img);
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}

		public function deleteProduct($id){
			$sql = "DELETE FROM tbl_product WHERE tbl_product.id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}

		public function addProduct($cate_id, $namePro, $price, $description,$name, $quantity){
			$sql = "INSERT INTO tbl_product(cate_id, name, price, description, img, quantity) VALUES(:cate_id, :namePro, :price, :description, :name, :quantity)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':cate_id', $cate_id);
			$pre->bindParam(':name', $name);
			$pre->bindParam(':price', $price);
			$pre->bindParam(':description', $description);
			$pre->bindParam(':namePro', $namePro);
			$pre->bindParam(':quantity', $quantity);
			return $pre->execute();

		}
		public function getProductLast(){
			$sql = "SELECT id FROM tbl_product ORDER BY create_at DESC LIMIT 1 ";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		public function addImg($id, $img){

			$sql = "INSERT INTO tbl_img_detail(product_id, img) VALUES(:id, :img)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id', $id);
			$pre->bindParam(':img', $img);

			return $pre->execute();

		}

		public function getImgById($id){
			$sql = "SELECT tbl_img_detail.img FROM `tbl_product`, tbl_img_detail WHERE tbl_product.id=tbl_img_detail.product_id AND tbl_product.id = :id";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			$result = array();
			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
				$result[] = $row;
			}
			return $result;
		}

	}
	?>