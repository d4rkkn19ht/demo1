<?php  
	
	include_once 'config/config.php';

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

		public function getProduct($page){
			$sql = "SELECT tbl_product.id , img, price, name, tbl_product.description, tbl_product.cate_id FROM tbl_product, tbl_cate
				WHERE tbl_product.cate_id = tbl_cate.id LIMIT :page,6";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':page', $page, PDO::PARAM_INT);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		public function CountProduct(){
		$sql = "SELECT COUNT(id)  FROM tbl_product";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		return $pre->fetch(PDO::FETCH_ASSOC);
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
		
		public function getProduct1(){
			$sql = "SELECT *FROM tbl_product
				WHERE cate_id = 1 ORDER BY id DESC limit 0,4";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		public function getProduct5(){
			$sql = "SELECT *FROM tbl_product
				WHERE cate_id = 5 ORDER BY id DESC limit 0,4";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		public function getProduct2(){
			$sql = "SELECT *FROM tbl_product
				WHERE cate_id = 2 ORDER BY id DESC limit 0,4";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		public function getProduct4(){
			$sql = "SELECT *FROM tbl_product
				WHERE cate_id = 4	 ORDER BY id DESC limit 0,4";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		public function getCate(){
			$sql = "SELECT *FROM tbl_cate";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		public function getCate_id($id){
			$sql = "SELECT *FROM tbl_product, tbl_cate
				WHERE tbl_product.cate_id = tbl_cate.id AND tbl_product.cate_id = :id ORDER BY id DESC ";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		
		public function getProduct_id($id){
			$sql = "SELECT * FROM tbl_product
				WHERE id = :id ORDER BY id DESC ";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			$result = array();

			return $pre->fetch(PDO::FETCH_ASSOC);
		}
		public function addMember_order($id, $name, $phone, $email, $address){

			$sql = "INSERT INTO tbl_member(id, name, phone, email, addres) VALUES(:idKhoa, :name, :phone, :email, :addres)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id', $id);
			$pre->bindParam(':name', $name);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':addres', $addres);

			return $pre->execute();

		}
		public function addOrder($id, $member_id, $note){

			$sql = "INSERT INTO tbl_orders(id, member_id, note) VALUES(:id, :member_id, :note)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':id', $id);
			$pre->bindParam(':member_id', $member_id);
			$pre->bindParam(':note', $note);

			return $pre->execute();

		}
		public function addProduct_order($order_id, $product_id, $quantity, $price, $total){

			$sql = "INSERT INTO tbl_detail_order(order_id, product_id, quantity, price, total) VALUES(:order_id, :product_id, :quantity, :price, :total)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':order_id', $order_id);
			$pre->bindParam(':product_id', $product_id);
			$pre->bindParam(':quantity', $quantity);
			$pre->bindParam(':price', $price);
			$pre->bindParam(':total', $total);
			return $pre->execute();

		}
		 public function addMember($name, $phone, $email, $passw, $address){
			$sql = "INSERT INTO tbl_member(name, phone, email, passw, address) VALUES(:name, :phone, :email, :passw, :address)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':name', $name);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':passw', $passw);
			$pre->bindParam(':address', $address);

			return $pre->execute();
		 }
		 public function search_product($name){
			$sql = "SELECT *FROM tbl_product, tbl_cate WHERE tbl_product.cate_id = tbl_cate.id AND name LIKE :name";
		 	$pre = $this->pdo->prepare($sql);
		 	$pre->bindParam(":name", $name);
		 	$pre->execute();

			$result = array();

		 	while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
		 		$result[] = $row;
		 	}
			return $result;

		 }

		 public function Rating($id){
			$sql = "SELECT *FROM tbl_rating, tbl_product
				WHERE tbl_product.id =tbl_rating.product_id AND tbl_rating.product_id = :id ";
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