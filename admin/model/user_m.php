
<?php  
	include_once '../config/config.php';

	class user_m extends Connect{
		function __construct()
		{
			parent::__construct();
		}

	
		public function getUser(){
			$sql = "SELECT * FROM tbl_user ORDER BY status desc";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			$result = array();

			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
				$result[] = $row;
			}
			return $result;
		}

		public function checkEmail($email){
			$sql = "SELECT DISTINCT * FROM tbl_user, tbl_member WHERE (tbl_member.email = :email) OR (tbl_user.email = :email)";
			$pre = $this->pdo->prepare($sql); // thực thi truy vấn
			$pre->bindParam(':email', $email);
			$pre->execute();
			$count = $pre->rowCount();
			return $count;
		}

		public function updateUser($id, $username, $email, $phone, $role, $status){
			$sql = "update tbl_user SET username = :username, email = :email, phone = :phone, role=:role, status=:status WHERE id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':id', $id);
			$pre->bindParam(':username', $username);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':role', $role);
			$pre->bindParam(':status', $status);
			return $pre->execute();
		}

		public function addUser($username, $email, $phone, $role){

			$sql = "INSERT INTO tbl_User(username, email, phone, role) VALUES(:username, :email, :phone, :role)";
			$pre = $this->pdo->prepare($sql);

			$pre->bindParam(':username', $username);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':role', $role);
			return $pre->execute();

		}

		public function deleteUser($id)
		{
		 $sql = "DELETE FROM tbl_user WHERE id = :id";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':id', $id);
			return $pre->execute();   
		}

		public function getUserById($id){
			$sql ="SELECT * FROM tbl_user WHERE tbl_user.id=:id";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		public function searchUser($key){
		$sql = "SELECT * FROM tbl_user WHERE (username LIKE :key) OR (email LIKE :key) OR (phone LIKE :key) ORDER BY status DESC";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam(':key', $key);
		 $pre->execute(); 
		$result = array();
			while ($row = $pre->fetch(PDO::FETCH_ASSOC)) { 
				$result[] = $row;
			}
			return $result;
		}
		
	}

?>