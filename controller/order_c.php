
<?php  

include_once 'model/order_m.php';

class order_c extends order_m
{
	private $order;

	function __construct()
	{
		$this->order = new order_m();
	}
	public function order(){
		if (isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
			$detail = array();
			$order = $this->order->getOrderByMember($id);
			foreach ($order as $key => $value) {
				$idOrder=$value['id'];
				$detail[$idOrder]= $this->order->getDetailOrder($idOrder);
				
			} 
			include_once 'views/order/orderHistory.php';
		}
		
		

	}
}


	?>