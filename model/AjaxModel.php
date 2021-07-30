<?php  
	
	include_once '../config/config.php';

	class AjaxModel extends Connect
	{
		
		function __construct()
		{
			parent::__construct(); 
		}


		// Viết hàm lấy ra sản phẩm theo id danh mục
		public function getProductCate($cate_id){
			$sql = "SELECT *FROM tbl_product
				WHERE tbl_product.cate_id = :cate_id ";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':cate_id', $cate_id);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
		}
		// public function getProduct_id($id){
		// 	$sql = "SELECT *FROM tbl_product
		// 		WHERE id = :id ORDER BY id DESC ";
		// 	$pre = $this->pdo->prepare($sql);
		// 	$pre->bindParam(':id', $id);
		// 	$pre->execute();
		// 	$result = array();

		// 	return $pre->fetch(PDO::FETCH_ASSOC);
		// }


	}

?>