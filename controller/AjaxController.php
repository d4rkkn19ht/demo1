<?php  
	
	include_once '../model/AjaxModel.php'; 

	class AjaxController extends AjaxModel
	{
		private $ajax;
		
		function __construct()
		{
			$this->ajax = new AjaxModel();
		}

		public function getProductCate($cate_id){
			return $this->ajax->getProductCate($cate_id);
		}
		// public function getPro_id($id){
		// 	return $this->ajax->getProduct_id($id);
		// }
		

	}	

?>