<?php 
session_start();
	include_once'../../config/configg.php';

if (isset($_POST['id'])) {

	$id = (int)$_POST['id'];

	$sql = "SELECT *FROM tbl_product
				WHERE id = $id ";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);


	if (!isset($_SESSION['carts']) || empty($_SESSION['carts'])) {
		$_SESSION['carts'][$id] = $row;
		$_SESSION['carts'][$id]['qty'] = 1;
	}else{
		if (array_key_exists($id, $_SESSION['carts'])) {
			$_SESSION['carts'][$id]['qty'] += 1;
		}else{
			$_SESSION['carts'][$id] = $row;
			$_SESSION['carts'][$id]['qty'] = 1;
		}
	}
	// echo "<div class='alert alert-success'>Đã thêm vào giỏ hàng</div>";
	header("Location: gio-hang");

}


?>