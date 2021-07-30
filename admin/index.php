<?php
session_start();
ob_start();

if (!isset($_SESSION['name']) || $_SESSION['name']==null) {
	header("location: ../index.php");
}else{
	$user = $_SESSION['name'];
	$role = $_SESSION['user'];
	$id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin - FoodNow</title>

	Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<?php 
			include_once 'layout/header.php';
			include_once 'layout/menu.php';
			?>
		</nav>

		<?php
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		else{
			$page = 'index'; 

		}
		if (isset($_GET['manager'])) {
			$manager = $_GET['manager'];
		}
		include_once 'views/listManager.php';

		switch ($page) {
			case 'index':
			include_once 'views/listManager.php';
			include_once 'controller/product_c.php';
			$product = new product_c();
			$product->product();	
			break;
			
			case 'user':
			include_once 'controller/user_c.php';
			$user = new user_c();
			$user->user();
			break;

			case 'product':
			include_once 'controller/product_c.php';
			$product = new product_c();
			$product->product();
			break;

			case 'cate':
			include_once 'controller/cate_c.php';
			$cate = new cate_c();
			$cate->cate();
			break;
			
			case 'order':
			include_once 'controller/order_c.php';
			$order = new order_c();
			$order->order();
			break;

		}
		if (file_exists('views/product/'.$page.'.php')) {
			include_once 'views/product/'.$page.'.php';   
			
		}


		?>

	</div>	
</body>
</html> 