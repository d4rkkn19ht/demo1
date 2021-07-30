<?php
include_once '../config/config.php'; 

class order_m extends Connect 
{
	function __construct()
	{ 
		parent::__construct();
	}

	public function getOrder(){
		$sql = "SELECT tbl_orders.id, tbl_orders.status_order, tbl_orders.note, tbl_orders.create_at, tbl_member.name FROM tbl_orders, tbl_member WHERE tbl_member.id = tbl_orders.member_id ORDER BY tbl_orders.create_at DESC ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getOrderLoading(){
		$sql = "SELECT tbl_orders.id, tbl_orders.status_order, tbl_orders.note, tbl_orders.create_at, tbl_member.name FROM tbl_orders, tbl_member WHERE tbl_member.id = tbl_orders.member_id and tbl_orders.status_order=0 ORDER BY tbl_orders.create_at DESC ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getOrderShip(){
		$sql = "SELECT tbl_orders.id, tbl_orders.status_order, tbl_orders.note, tbl_orders.create_at, tbl_member.name FROM tbl_orders, tbl_member WHERE tbl_member.id = tbl_orders.member_id and tbl_orders.status_order=1 ORDER BY tbl_orders.create_at DESC ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getOrderEnd(){
		$sql = "SELECT tbl_orders.id, tbl_orders.status_order, tbl_orders.note, tbl_orders.create_at, tbl_member.name FROM tbl_orders, tbl_member WHERE tbl_member.id = tbl_orders.member_id and tbl_orders.status_order=2 ORDER BY tbl_orders.create_at DESC ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getOrderCancel(){
		$sql = "SELECT tbl_orders.id, tbl_orders.status_order, tbl_orders.note, tbl_orders.create_at, tbl_member.name FROM tbl_orders, tbl_member WHERE tbl_member.id = tbl_orders.member_id and tbl_orders.status_order=3 ORDER BY tbl_orders.create_at DESC ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
			$result[] = $row;
		}
		return $result;
	}

	public function getOrderByID($id){
		$sql = "SELECT * FROM tbl_orders, tbl_member WHERE tbl_orders.member_id = tbl_member.id and tbl_orders.id =:id";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':id', $id);
		$pre->execute();
		return $pre->fetch(PDO::FETCH_ASSOC);
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

	public function updateOrder($id, $status){
		$sql = "update tbl_orders SET status_order = :status WHERE id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':status', $status);
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}

		
		public function deleteDetailOrder($id){
			$sql = "DELETE FROM tbl_detail_order WHERE tbl_detail_order.order_id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}

		public function deleteOrder($id){
			$sql = "DELETE FROM tbl_orders WHERE tbl_orders.id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':id', $id);
			return $pre->execute();
		}
	}
	?>