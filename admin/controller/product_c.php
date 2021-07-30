<?php 
include_once 'model/product_m.php';

class product_c extends product_m
{ 
	private $product; 
 
	function __construct()
	{
		$this->product = new product_m();
	}

	public function product(){
		$cate = $this->product->getCate();
		if (isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method='listProduct'; 
		}  

		switch ($method) {
			case 'addProduct':
			if (isset($_POST['addProduct'])) {
				$file = $_FILES['avatar'];
				$size = $file['size']; // Dung lượng của hình
				$type = $file['type'];
				$name = time().$file['name']; // name file
				$tmp_name = $file['tmp_name'];

				$file2 = $_FILES['img2']; 
				$size2 = $file2['size']; // Dung lượng của hình
				$name2 = time().$file2['name']; // name file
				$tmp_name2 = $file2['tmp_name'];
				$type2 = $file2['type'];

				$file3 = $_FILES['img3'];
				$size3 = $file3['size']; // Dung lượng của hình
				$name3 = time().$file3['name']; // name file
				$tmp_name3 = $file3['tmp_name'];
				$type3 = $file3['type'];

				$namePro = $_POST['namePro'];
				$id_cate = $_POST['id_cate'];
				$price = $_POST['price'];
				$quantity = $_POST['quantity'];

				$description = $_POST['description'];

				if (($type == 'image/png' || $type == 'image/jpeg') && ($type2 == 'image/png' || $type2 == 'image/jpeg') && ($type3 == 'image/png' || $type3 == 'image/jpeg') ) {

					if ($size < 1048576 && $size2<1048576 && $size3<1048576) {

						$addProduct = $this->product->addProduct($id_cate, $namePro, $price, $description,$name, $quantity);
						
						if ($addProduct) {
							$_SESSION['noti']='add';
							$row = $this->product->getProductLast();
							move_uploaded_file($tmp_name, '../images/product/'.$name);
							$addImg2 = $this->product->addImg($row['id'], $name2);
							$addImg3 = $this->product->addImg($row['id'], $name3);
							
							if ($addImg2 && $addImg3) {
								move_uploaded_file($tmp_name2, '../images/product/'.$name2);
								move_uploaded_file($tmp_name3, '../images/product/'.$name3);
							}
							
							header('location: index.php');
							break;
						}else{
							echo "<script>alert('Lỗi không thêm mới được!');</script>";
						}
					}else{
						echo "<script>alert('Dung lượng của file cần nhỏ hơn 1MB!');</script>";
					}
				}else{
					echo "<script>alert('File không đúng định dạng!');</script>";
				}
			}
			include_once 'views/product/addProduct.php';
			break;

			case 'update':
			if (isset($_GET['id'])) {
				$id = (int)$_GET['id'];
				$row = $this->product->getProductById($id);
				$img = $row['img'];
				$row2 = $this->product->getImgById($id);
				if (isset($row2) && $row2!=null) {
					$img2 = $row2[0]['img'];
					$img3= $row2[1]['img'];
				}
				
				$cate = $this->product->getCate();
				include_once 'views/product/updateProduct.php';

				if (isset($_POST['update'])) {

					$namePro     = $_POST['namePro'];
					$id_cate     = $_POST['id_cate'];
					$price       = $_POST['price'];
					$quantity    = $_POST['quantity'];
					$description = $_POST['description'];
					$update = $this->product->updateProduct($id, $namePro, $id_cate, $price, $quantity, $description);
					$file = $_FILES['avatar'];
					if (isset($file) && $file['error']==0){
						
						$file = $_FILES['avatar'];
						$size = $file['size']; // Dung lượng của hình
						$type = $file['type'];
						$name = time().$file['name']; // name file
						$tmp_name = $file['tmp_name'];
						$updateImg = $this->product->updateProductImg($id, $name);
						if ($update && $updateImg) {
							unlink('../images/product/'.$img);
							move_uploaded_file($tmp_name, '../images/product/'.$name);
						}

					}

					

					// $file3 = $_FILES['img3'];
					// if (isset($file3) && $file3['error']==0) {

					// 	$file3 = $_FILES['img3']; 
					// 	$size3 = $file3['size']; // Dung lượng của hình
					// 	$name3 = time().$file3['name']; // name file
					// 	$tmp_name3 = $file3['tmp_name'];
					// 	$type3 = $file3['type'];
					// 	echo $id ." ".$name3;
					// 	$updateImg3 = $this->product->updateImg($id, $name3);
					
					// 	if ($update && $updateImg3) {

					// 		move_uploaded_file($tmp_name3, '../images/product/'.$name3);
					// 	}
					// }

					if (!$update) {
						echo "<script>alert('Lỗi không cập nhật được!');</script>";
					}else{

						$_SESSION['noti'] = 'update';
						$product = $this->product->getProduct();
						header("Location: index.php");
						break;
					}
				}
			}
			break;		

			case 'remove':
			if (isset($_GET['id'])) {
				$id = (int)$_GET['id'];
				$row = $this->product->getProductById($id);
				$img = $row['img'];
				$row2 = $this->product->getImgById($id);
				$img2 = $row2[0]['img'];
				$img3= $row2[1]['img'];
				if ($_SESSION['user']==1) {
					$remove = $this->product->deleteProduct($id);
				} else{
					echo "<script>alert('Bạn chưa được phân quyền!');</script>";
					die();
				}
				if ($remove) {

					unlink('../images/product/'.$img);
					unlink('../images/product/'.$img2);
					unlink('../images/product/'.$img3);

					$_SESSION['noti'] = 'deleteProduct';
					header("Location: index.php");
				}else{
					echo "<script>alert('Lỗi không xóa được!');</script>";
				}
			}
			break;


			default:
			$sum = $this->product->sumCount();
				foreach ($sum as $value) {
					$sum_count= $value;
				}
				$pag = ceil($sum_count/6);
				if (isset($_GET['pag'])) {
					$from = $_GET['pag']*6-6;
					echo $from;
				}else{
					$from=0;
				}
			if (isset($_POST['search'])) {
				$key = '%'.$_POST['key'].'%';
				$keys = $_POST['key'];
				$product = $this->product->searchProduct($key);
				$count = count($product);
				if ($count>0) {
					$_SESSION['noti']=3;
				}else{
					$_SESSION['noti']=4;
				}

			}
			else{
				$product =$this->product->getProducts($from);
			}
			include_once 'views/product/listProduct.php';
			break;
		}
	}

	
} 
?>