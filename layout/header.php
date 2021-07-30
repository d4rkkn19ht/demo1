<?php ob_start(); ?>

<style>
  .affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
}
</style>
<div class="se-pre-con"></div>
 <header class="homePage">
  <div class="container">
    <div class="row clearfix ">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="logo">
          <h1> <a href="trang-chu"><img src="images/logoicon.png" alt="" style="width: 60%" /></a> </h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="contacts">
          <p><?php if (isset($_SESSION['name'])) {
            echo 'Xin chào ' .$_SESSION['name'] .", ";
          } ?>Hãy gọi cho chúng tôi miễn phí!<span class="number"><a href="#">1800-0000-7777</a></p>
          </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
         <ul class="list-unstyled list-inline">
                        <li><a href="https://www.facebook.com/FoodNow-109425987656942"><span><i class="fa fa-facebook"></i></span></a></li>
                        <li><a href="https://www.twitter.com/"><span><i class="fa fa-twitter"></i></span></a></li>
                        <li><a href="https://www.google.com/"><span><i class="fa fa-google-plus"></i></span></a></li>
                        <li><a href="https://www.instagram.com/"><span><i class="fa fa-instagram"></i></span></a></li>
                        <li><a href="https://www.youtube.com/"><span><i class="fa fa-youtube-play"></i></span></a></li>
                        <li>
                           <form>
                               <ul class="list-inline">

                                <li>
                                    <div class="form-group language">

                                        <select class="">
                                            <option value="">VI</option>
                                            <option value="">UR</option>
                                            <option value="">EN</option>
                                        </select>
                                    </div><!-- end form-group -->
                                </li>
                            </ul>
                        </form>
                    </li>
                </ul>
      </div>
      </div>
    </div>
  </div>
</header>

<section class="saction1 container-fluid" data-spy="affix" data-offset-top="200">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="menu">
          <div class="mobile-nav-container"> </div>
          <div class="mobile-nav-btn"><img class="nav-open" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/6214/nav-open.png" alt="Nav Button Open" /> <img class="nav-close" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/6214/nav-close.png" alt="Nav Button Close" /> </div>
          <nav>
            <ul>
              <li><a href="trang-chu">Trang chủ</a></li>
              <li><a href="menu">Menu</a></li>
              <li><a href="san-pham-yeu-thich">Sản phẩm <i class="fa fa-heart" style="color: #dca214;"></i></a></li>
              <li><a href="gio-hang">Giỏ hàng</a></li>
              <li><a href="#contact">Liên hệ</a></li>

            </ul>
          </nav>
        </div>
        <div class="login">
          <ul>
             <?php 
              if (isset($_SESSION['name'])) {
                ?>
                <li><a href="dang-xuat">Đăng xuất</a></li>
                <li><a href="lich-su-mua-hang">Lịch sử mua hàng</a></li>
                <?php
              }else{
                ?>
                <li><a href="dang-nhap">Đăng nhập</a></li>
                <li><a href="dang-ki">Đăng kí</a></li>
                <?php
              }
            $count =0; 
            if (isset($_SESSION['carts'])&& !empty($_SESSION['carts'])) {
               foreach ($_SESSION['carts'] as $key => $value) {
                    $count += $value['qty'];
                   } 
            }
            ?>  
            <li><a href="gio-hang" id="cart-shop"><img src="images/cart2.png" alt="" style="width: 25px;"><span id="qtyCart" data-count="<?php echo $count ?>" style="color:#dca214;"><?php echo $count ?></span></a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  
</section>