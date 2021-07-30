<?php  
	session_start();
	if (isset($_POST['id']) && $_POST['qty']) {
		$id = $_POST['id'];
		$qty = $_POST['qty'];

		if (isset($_SESSION['carts']) && array_key_exists($id, $_SESSION['carts'])) {
			 	if ($qty <= 0) {
			 		unset($_SESSION['carts'][$id]);
			 	}else{
					$_SESSION['carts'][$id]['qty'] = $qty;
				}
			echo "<h1 class='animate__animated animate__tada' style='
    		animation-duration: 2s;'>Cập nhật giỏ hàng thành công!</h1>";
		}

	}	


?>