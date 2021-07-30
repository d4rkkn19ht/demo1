<?php
	include_once 'model/cate_m.php'; 

	class cate_c extends cate_m{
		private $cate;

		function __construct()
		{
			$this->cate = new cate_m();
		}

	 	public function cate(){
			if (isset($_GET['method'])) {
				$method = $_GET['method']; 
			}else{
				$method = 'listCate';
			}

			switch ($method) {
				case 'addCate':
					include_once 'views/cate/addCate.php';
					$addCate = $this->cate->addCate();
					if ($addCate) {
						include_once 'views/cate/listCate.php';
						 $_SESSION['noti']='addCate';
					}
					break;
				default:
					$cate = $this->cate->getCate();
					include_once 'views/cate/listCate.php';
					break;
			}

		}
	}
?>