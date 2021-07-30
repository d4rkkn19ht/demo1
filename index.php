<?php session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/Github/PHP0620E_Do_An/demoFood/">
	<meta charset="utf-8">
	<title>FoodNow</title>
	<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300,700' rel='stylesheet' type='text/css' />
	<link rel="shortcut icon" href="images/logoicon.png">

	<!--MOBILE DEVICE-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<!--CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
	<link rel="stylesheet" type="text/css" href="css/detail-product.css"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<!--JS-->
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	-->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/main.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<style>
		a{
			cursor: pointer;
		}
	</style>
</head>
<body>

	<?php include_once 'layout/header.php'; ?>

	<div>
		<?php
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		else{
			$page = 'index'; 
			
		}
		                
	     switch ($page) {
	     			
					case 'sign':
						include_once 'controller/user_c.php';
						$user = new user_c();
						$user->user();
						break;
					case 'index':
						include_once 'layout/banner.php';
						include_once 'controller/product_c.php';
						$pro = new product_c();	
						$pro->product();
						break;
					case 'cart':
						include_once 'controller/cart_c.php';
						$cart = new cart_c();	
						$cart->cart();
						break;
					case 'cate':
						include_once 'controller/product_c.php';
						$pro = new product_c();
						$pro->cate();
						break;
					case 'favourite':
						include_once 'views/product/favourite_product.php';
						break;
					case 'history':
						include_once 'controller/order_c.php';
						$order = new order_c();
						$order->order();	
						break;
					case 'detail_product':
						include_once 'controller/product_c.php';
						$pro = new product_c();
						$pro->detail_product();
						break;
			}
			if (file_exists('views/'.$page.'.php')) {
		      include_once 'views/'.$page.'.php';             
			}
		?>
	</div>
	<?php include_once 'layout/footer.php'; ?>	

	
	<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="109425987656942"
	  theme_color="#84C639"
	  logged_in_greeting="Cảm ơn bạn đã ghé thăm FoodNow, chúng tôi có thể giúp gì cho bạn?"
	  logged_out_greeting="Cảm ơn bạn đã ghé thăm FoodNow, chúng tôi có thể giúp gì cho bạn?">
      </div>
      <script type="text/javascript" src="js/sidemenu.js"></script>
</body>
</html>