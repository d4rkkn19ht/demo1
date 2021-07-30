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
		
		if (isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method='listOrder';
		}

		switch ($method) {
			case 'detail':
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$detail = $this->order->getOrderByID($id);
				$detail_order = $this->order->getDetailOrder($id);
			}
			include_once 'views/order/detail_order.php';

			if (isset($_POST['update'])) {
				$status = $_POST['status'];
				echo $status;
				$update = $this->order->updateOrder($id, $status);
				if ($update) {
					$_SESSION['noti'] = 'update';
					header("Location: index.php?page=order");
					break;
				}else{
					echo "<script>alert('Lỗi không cập nhật được!');</script>";
				}
			}
			break;

			case 'remove':
			if (isset($_GET['id'])) {
				$id = (int)$_GET['id'];
				if ($_SESSION['user']==1) {
					$remove = $this->order->deleteDetailOrder($id);
				} else{
					header("Location: index.php");
					echo "<script>alert('Bạn chưa được phân quyền!');</script>";
				}
				if ($remove) {
					$delete = $this->order->deleteOrder($id);
					if ($delete) {
						$_SESSION['noti'] = 'deleteOrder';
						header("Location: index.php?page=order");
					}else{
						echo "<script>alert('Lỗi không xóa được!');</script>";
					}
					
				}else{
					echo "<script>alert('Lỗi không xóa được!');</script>";
				}
			}
			break;

			case 'loading':
			$order = $this->order->getOrderLoading();
			$orderStatus = $this->order->getOrder();
			include_once 'views/order/listOrder.php';
			break;

			case 'ship':
			$order = $this->order->getOrderShip();
			$orderStatus = $this->order->getOrder();
			include_once 'views/order/listOrder.php';
			break;

			case 'end':
			$order = $this->order->getOrderEnd();
			$orderStatus = $this->order->getOrder();
			include_once 'views/order/listOrder.php';
			break;

			case 'cancel':
			$order = $this->order->getOrderCancel();
			$orderStatus = $this->order->getOrder();
			include_once 'views/order/listOrder.php';
			break;

			default:
			$orderStatus = $this->order->getOrder();
			$order = $this->order->getOrder(); 	
			include_once 'views/order/listOrder.php';
			break;

		}
	}
}
?>