
<?php  

include_once 'model/cart_m.php';

class cart_c extends cart_m
{
	private $cart;

	function __construct()
	{
		$this->cart = new cart_m();
	}
	public function cart(){

		if (isset($_SESSION['id'])) {
			$idMember = $_SESSION['id'];
			$member = $this->cart->getMemberById($idMember);
		}
		
		include_once 'views/cart/cart.php';

		if (isset($_POST['order'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			include_once 'PHPMailer/class.phpmailer.php';
	        include_once 'PHPMailer/class.smtp.php';

	        // Instantiation and passing `true` enables exceptions
	        $mail = new PHPMailer(true);

	        try {
	          $mail->CharSet = 'utf8';
	            //Server settings
	            $mail->SMTPDebug = 0;                      // Enable verbose debug output
	            $mail->isSMTP();                                            // Send using SMTP
	            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	            $mail->SMTPAuth   = true;                                   // Enable SMTP authentications
	            $mail->Username   = 'quangbinh011199@gmail.com';                     // SMTP username
	            $mail->Password   = 'quangbinh99';             

	            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	            //Recipients
	            $mail->setFrom('support@shop.com', 'Thông báo!');
	            $mail->addAddress($email, $name);     // Add a recipient

	            // Content
	            $mail->isHTML(true);                                  // Set email format to HTML
	            $mail->Subject = 'Thông báo đơn hàng!';
	            // $mail->Body    = 'Xin chào '.$name.' Cảm ơn bạn đã đặt hàng! Thông tin đơn hàng gồm'.'<br>'.$count.' sản phẩm '.$value['name'].' '.'. Tổng tiền: '.$total.'VNĐ' ;
	            $j = 1;
			    $mail->Body  = "Xin chào ".$name." cảm ơn bạn đã mua hàng tại <a href='http://php0620e-2.itpsoft.com.vn/' target='_blank'>FoodNow<a><br>
			    <h5>Đơn hàng của bạn: </h5>
			    <table style='border:1px solid red; border-collapse: collapse;'>
			        <thead>
			            <tr>
			                <th>STT</th>
			                <th>Tên sản phẩm</th>
			                <th>Giá</th>
			                <th>Số lương</th>
			                <th>Thành tiền</th>
			            </tr>
			        </thead>
			        <tbody>";
			        foreach ($_SESSION["carts"] as $value){
			    
			          $mail->Body .="<tr>
			                <td>".$j++."</td>
			                <td>".$value['name']."</td>
			                <td style='text-align:center;>".number_format($value['price'])."</td>
			                <td style='text-align:center;'>".$value['qty']."</td>
			                <td style='text-align:right;>".number_format($item_sum)."</td>

			            </tr>";
			        }
			          $mail->Body .= "<tr><td colspan='4'>Phí vận chuyển: </td>
			                        <td style='text-align:right;'> ".number_format($ship)."</td>";
			           $mail->Body .= "<tr><td colspan='4'>Tổng tiền: </td>
			                        <td> ".number_format($total).' vnđ'."</td></tr>
			        </tbody>
			    </table>";
	            $mail->send();
	        } catch (Exception $e) {
	            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	        }

			if (isset($idMember)) {
				$update = $this->cart->updateMember($idMember, $name, $email, $phone, $address);
			}else{
				$add = $this->cart->addMember($name, $email, $phone, $address);

				//if ($add) {
					$idMem = $this->cart->getMemberLast();
					
					$idMember = $idMem['id'];
				//}
			}

			$addOrder = $this->cart->addOrder($idMember, $_POST['note'], $total);

			$idOrder = $this->cart->getOrderLast();
			$id = $idOrder['id'];
			
			foreach ($_SESSION['carts'] as $key => $value) {
				$idPro = $value['id'];
				$qty = $value['qty'];
				$addDetailOrder = $this->cart->addDetailOrder($id, $idPro, $qty);
				
			}
			if ($addOrder && $addDetailOrder) {

				if (isset($_SESSION['id']) && $_SESSION['id']!=null) {
					header("Location: lich-su-mua-hang");
					echo "<script>alert('Đặt hàng thành công!');</script>";
				}else{
					header("Location: trang-chu");
					echo "<div class='alert alert-success'>Đặt hàng thành công!</div>";
				}
				unset($_SESSION['carts']);
			}else{
				echo "<script>alert('Lỗi đặt hàng!')</script>";
			}
			
		}

	}
}


	?>