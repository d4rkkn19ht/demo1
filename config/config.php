<?php
	class Connect{
		private $dns = "mysql:host=http://php0620e-2.itpsoft.com.vn/phpmyadmin/;dbname=PHP0620E_nhom2";
		private $user = "PHP0620E_nhom2";
		private $pass = "PHP0620E_nhom2*";
		protected $pdo = null;

		function __construct(){
			try {
		
				$this->pdo = new PDO($this->dns, $this->user, $this->pass);
				$this->pdo->query("SET NAMES utf8");

			} catch (PDOException $e) {
				echo $e->getMessage();
				exit();
			}
		}
	}

?>