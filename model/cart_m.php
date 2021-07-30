<?php  

include_once 'config/config.php';

class cart_m extends Connect
{

	function __construct()
	{
		parent::__construct(); 
	}

	public function getMemberById($id){
		$sql ="SELECT * FROM tbl_member WHERE tbl_member.id=:id";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':id', $id);
		$pre->execute();
		return $pre->fetch(PDO::FETCH_ASSOC);
	}

	public function getMemberLast(){
		$sql = "SELECT id FROM tbl_member ORDER BY id DESC LIMIT 1 ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		return $pre->fetch(PDO::FETCH_ASSOC);
	}

	public function getOrderLast(){
		$sql = "SELECT id FROM tbl_orders ORDER BY id DESC LIMIT 1 ";
		$pre = $this->pdo->prepare($sql);
		$pre->execute();
		$result = array();

		return $pre->fetch(PDO::FETCH_ASSOC);
	}


	public function addMember($name, $email, $phone, $address){

		$sql = "INSERT INTO tbl_member(name, phone, email, address) VALUES(:name, :phone, :email, :address)";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':name', $name);
		$pre->bindParam(':phone', $phone);
		$pre->bindParam(':email', $email);
		$pre->bindParam(':address', $address);
		return $pre->execute();
	}

	public function updateMember($id, $name, $email, $phone, $address){

		$sql = "update tbl_member SET name = :name, email = :email, phone = :phone, address=:address WHERE id = :id";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':name', $name);
		$pre->bindParam(':phone', $phone);
		$pre->bindParam(':email', $email);
		$pre->bindParam(':address', $address);
		$pre->bindParam(':id', $id);
		return $pre->execute();
	}

	public function addOrder($id, $note, $total){
		$sql = "INSERT INTO tbl_orders(member_id, note, total) VALUES(:id, :note, :total)";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':id', $id);
		$pre->bindParam(':note', $note);
		$pre->bindParam(':total', $total);
		return $pre->execute();
	}

	public function addDetailOrder($id, $idPro, $qty){

		$sql = "INSERT INTO tbl_detail_order(order_id, product_id, qty) VALUES(:id, :idPro, :qty)";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':id', $id);
		$pre->bindParam(':idPro', $idPro);
		$pre->bindParam(':qty', $qty);
		return $pre->execute();
	}



}


?>