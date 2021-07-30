<?php 
	session_start();

	if (isset($_POST['id'])) {
		$id = (int)$_POST['id'];
		
		if (isset($_SESSION['heart']) && !empty($_SESSION['heart']) ) {
			unset($_SESSION['heart'][$id]);
			echo "<h1 class='animate__animated animate__tada' style='
    		animation-duration: 2s;'>Xóa thành công!</h1>";
		}

	}
	
?>