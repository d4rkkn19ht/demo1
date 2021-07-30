<?php  

include_once 'model/product_m.php';

class product_c extends product_m
{
	private $pro;
	
	function __construct()
	{
		$this->pro = new product_m();
	}

	public function product(){


		if(isset($_GET['method'])){
			$method = $_GET['method'];
		}else{
			$method = '';
		}
		switch($method){
			
			case 'addMember':
			
			if (isset($_POST['addMember'])) {

				$name = $_POST['name'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$passw = $_POST['passw'];
				$address = $_POST['address'];
				$addMember = $this->pro->addMember($name, $phone, $email, $passw, $address);
				if ($addMember) {
					$_SESSION['noti']='add';
					include_once 'index.php';
				}else {
					echo "<script>alert('Lỗi không thêm được!');</script>";
					
				}
			}
			break;
			
			default:
			$product1 = $this->pro->getProduct1();	
			$product5 = $this->pro->getProduct5();
			$product2 = $this->pro->getProduct2();	
			$product4 = $this->pro->getProduct4();
			if (isset($value['id'])) {
				$img = $this->pro->getImgById($id);
				$img2 = $img[0]['img'];
				$img3 = $img[1]['img'];
			}
			include_once 'views/product/list_product.php';
			include_once 'views/cate/cate1.php';
			include_once 'views/cate/cate5.php';
			include_once 'views/cate/cate2.php';
			include_once 'views/cate/cate4.php';


			break;
			
		}
	}
	public function cate(){
		$sum = $this->pro->sumCount();
		foreach ($sum as $value) {
			$sum_count= $value;
		}
		$pag = ceil($sum_count/6);
		if (isset($_GET['pag'])) {
			$page = $_GET['pag'];
			$from = $page*6-6;
			echo $from;
		}else{
			$from=0;
		}
		$cate = $this->pro->getCate();
		if (isset($_POST['search'])) {
			$name = '%'.$_POST['name'].'%';
			$names = $_POST['name'];
			$product = $this->pro->search_product($name);
		}else{

			$product = $this->pro->getProduct($from);
		}
		include_once 'views/cate/list_cate.php';
	}
	public function detail_product(){
		if (isset($_GET['id'])) {
			$id = (int)$_GET['id'];
			$pro_id= $this->pro->getProduct_id($id);
			$img = $this->pro->getImgById($id);
			$img2 = $img[0]['img'];
			$img3 = $img[1]['img'];
			include_once 'views/product/detail_product.php';
		}
		
	}
}	

?>