<?php  
	// Kết nối cơ sở dữ liệu
	$host = "php0620e-2.itpsoft.com.vn/phpmyadmin";
	$user = "PHP0620E_nhom2";
	$pass = "PHP0620E_nhom2*";
	$database = "PHP0620E_nhom2";

	$conn = mysqli_connect($host, $user, $pass, $database) or die("Can't connect database!");

	if ($conn){
		mysqli_set_charset($conn, 'utf8');
	}else{
		echo "Can't connect database!";
	}
?>