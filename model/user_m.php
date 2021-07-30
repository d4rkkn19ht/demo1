<?php  
	 
	include_once 'config/config.php';

	class user_m extends Connect
	{
		
		function __construct() 
		{
			parent::__construct(); 
		}

		public function updateMember($email, $passw){

			$sql = "update tbl_member SET passw = :passw WHERE email = :email";
			$pre = $this->pdo->prepare($sql); // Chuẩn bị thực thi câu lệnh truy vấn
			$pre->bindParam(':email', $email);
			$pre->bindParam(':passw', $passw);
			return $pre->execute();

		}
		public function addMember($username, $phone, $email, $password){

			$sql = "INSERT INTO tbl_member(name, phone, email, passw) VALUES(:username, :phone, :email, :password)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':username', $username);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':password', $password);

			return $pre->execute();

		}
		public function loginUser($email,$password){
			$sql = "SELECT *FROM tbl_user WHERE email = :email AND password = :password";
			$pre = $this->pdo->prepare($sql); // thực thi truy vấn
			$pre->bindParam(':email', $email);
			$pre->bindParam(':password', $password);
			$pre->execute();
			$count = $pre->rowCount();
			return $count;
		}
		

		public function loginMember($email,$password){
			$sql = "SELECT *FROM tbl_member WHERE email = :email AND passw = :password";
			$pre = $this->pdo->prepare($sql); // thực thi truy vấn
			$pre->bindParam(':email', $email);
			$pre->bindParam(':password', $password);
			$pre->execute();
			$count = $pre->rowCount();
			return $count;
		}

		public function getMember($email, $passw){
			$sql = "SELECT * FROM tbl_member WHERE email = :email AND passw = :passw";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':passw', $passw);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		public function getUser($email, $passw){
			$sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :passw";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':passw', $passw);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		public function getName($id){
			$sql = "SELECT p.name AS 'fullname', SUBSTRING_INDEX(p.name, ' ', 1) AS 'firstname',SUBSTRING_INDEX(p.name, ' ', -2) AS 'lastname' FROM tbl_member AS p WHERE id=:id";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

		public function checkEmail($email){
			$sql = "SELECT DISTINCT * FROM tbl_user, tbl_member WHERE (tbl_member.email = :email) OR (tbl_user.email = :email)";
			$pre = $this->pdo->prepare($sql); // thực thi truy vấn
			$pre->bindParam(':email', $email);
			$pre->execute();
			$count = $pre->rowCount();
			return $count;
		}
		
	}


?>