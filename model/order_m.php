<?php  
	
	include_once 'config/config.php';

	class order_m extends Connect
	{
		
		function __construct()
		{
			parent::__construct(); 
		}

		public function getOrderByMember($id){
			$sql = "SELECT * FROM `tbl_member`, tbl_orders WHERE tbl_member.id=:id AND tbl_orders.member_id=tbl_member.id  order by tbl_orders.create_at desc";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;
			
		}

		public function getDetailOrder($id){
		$sql = "SELECT DISTINCT * FROM tbl_orders, tbl_detail_order, tbl_product WHERE tbl_orders.id = tbl_detail_order.order_id AND tbl_detail_order.product_id = tbl_product.id AND tbl_orders.id=:id ";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':id', $id);
		$pre->execute();

		$result = array();
		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

		public function addMember($username, $phone, $email, $password){

			$sql = "INSERT INTO tbl_member(name, phone, email, passw) VALUES(:username, :phone, :email, :password)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':username', $username);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':password', $password);
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
				$result[] = $row;
			}
			return $result;

		}
		
	}


?>