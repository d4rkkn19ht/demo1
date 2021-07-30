<div class="container-fluid table-cart" >

  <div class="w3ls_w3l_banner_nav_right_grid container" id="dataCart">
    <br>
    <h3>Giỏ hàng</h3>
    <br>
    <?php if (isset($_SESSION['carts'])&& !empty($_SESSION['carts'])) {
      ?> 
      <div class="col-md-8 col-sm-8 col-lg-8 col-12">       
        <form action="" method="POST" >
          <table class="table">
            <thead>
              <tr>
                <th>Món ăn</th>
                <th>Tên món ăn</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th> Xóa</th>
              </tr>
            </thead>
                  <?php 
                  $_SESSION['sum_price'] = 0;
                  $count =0;

                  foreach ($_SESSION['carts'] as $key => $value) {
                    $count += $value['qty'];
                    ?>
                    <tbody>
                      <tr>
                        <td>   
                          <img src="images/product/<?php echo $value['img'] ?>" width="120px" alt="photo">
                        </td>
                        <td>
                         <?php echo $value['name'];?>
                       </td>
                       <td>
                        <input onchange="updateCart(<?php echo $value['id']; ?>)" type="number" name="<?php echo $value['id']; ?>" value="<?php echo $value['qty']; ?>" min="1" max="10" id="qty_<?php echo $value['id']; ?>" />
                      </td>
                      
                    <td>
                      <?php echo number_format($value['price']); ?>VNĐ
                    </td>
                    <td>
                     <?php  
                     $item_sum = $value['price'] * $value['qty'];
                     $_SESSION['sum_price'] += $item_sum;
                     echo number_format($item_sum);
                     ?>VNĐ
                   </td>
                   <td>
                    <button class="btn btn-danger delCart" value="<?php echo $value['id']; ?>" >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
              <?php 
            }
            ?>
            <?php 
            if(isset($count)&&$count>0){
             ?>
             <p>Bạn đang có <span style="color: #2f9c5c"><?php echo $count ?></span> sản phẩm trong giỏ hàng</p>
             <?php 
           }
           ?>
         </table>
        </form>
      </div>

      <div class="col-md-4 col-sm-4 col-lg-4 col-12 ">
        <h2 class="p-3">Tóm lược đặt hàng</h2>
        <div class="p-2">
        <table class="table">
          <tbody>
            <tr>
              <td>Tổng thu</td>
              <td><?php echo number_format($_SESSION['sum_price']); ?>VND</td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Phí ship</td>
              <td><?php $ship= 25000; echo number_format($ship)."VND"; ?></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Tổng hóa đơn</td>
              <td><?php $total=$_SESSION['sum_price'] + $ship; echo number_format($total); ?> VND</td>
            </tr>
          </tbody>
        </table>

          <form action="" method="POST" role="form">
            <h2 class="p-3">Thông tin khách hàng</h2>
            <span style="color: #759075; font-size: 14px;">
              <?php
              if (!isset($_SESSION['id'])) {
                echo "Hãy "?> <a href="index.php?page=sign&method=login">đăng nhập</a> <?php echo " để nhận khuyến mãi.";
              }
              ?>
            </span>
            <div class="form-group">
              <label for="name">Họ tên:</label>
              <input type="text" class="form-control" name="name" required placeholder="Họ tên khách hàng" id="name" value="<?php if(isset($member['name'])) echo $member['name']; ?>">
            </div>
            <div class="form-group">
              <label for="emailCus">Email:</label>
              <input type="email" class="form-control" name="email" required placeholder="Nhập email" id="email" value="<?php if(isset($member['email'])) echo $member['email']; ?>">
            </div>
            <div class="form-group">
              <label for="phoneCus">Số điện thoại:</label>
              <input type="number" class="form-control" name="phone" required placeholder="Nhập số điện thoại" id="phone" value="<?php if(isset($member['phone'])) echo $member['phone']; ?>">
            </div>

            <div class="form-group">
              <label for="address">Địa chỉ:</label>

              <input type="text" class="form-control col-md-2" name="address" required placeholder="Địa chỉ giao hàng" id="address" style="margin-top: 5px;" value="<?php if(isset($member['address'])) echo $member['address']; ?>">

              <p style="color: #759075; font-size: 14px;">Note: Hiện tại nhà hàng chỉ giao tại Hà Nội.</p>
            </div>
            <div class="form-group">
              <label for="note">Ghi chú:</label>
              <textarea class="form-control" name="note" placeholder="Ghi chú cho đơn hàng" rows="3"></textarea>

            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="order">
              Đặt hàng
            </button>
          </form>

      </div>
      <?php 
          }else{
      ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thông báo!</strong> Giỏ hàng trống <a href="menu"><button class="btn btn-danger">Tiếp tục mua hàng</button></a>
          </div>
        <?php 
          } 
        ?>

  </div>
</div>
<!-- <?php  
   if (isset($_POST['order']) && isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
      $name  = $_POST['name'];
      $phone  = $_POST['phone'];
      $email  = $_POST['email'];
      $addres = $_POST['address'];
        
          // Gửi mail cho khách hàng
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
            $mail->Body    = 'Xin chào '.$name.' Cảm ơn bạn đã đặt hàng! Thông tin đơn hàng gồm '.$count.' sản phẩm '.$value['name'].' '.'. Tổng tiền: '.$total.'VNĐ' ;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      
      
    }
      


?> -->
