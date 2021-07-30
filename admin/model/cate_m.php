<?php
	include_once '../config/config.php'; 

	class cate_m extends Connect 
	{
		function __construct()
		{
			parent::__construct();
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
	}
?>