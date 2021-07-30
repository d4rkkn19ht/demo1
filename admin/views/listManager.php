<div id="page-wrapper">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Home</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Quản lý</a></li>
        <li><a href="index.php?page=cate">Loại sản phẩm</a></li>
        <li><a href="index.php?page=product">Sản phẩm</a></li>
         <li><a href="index.php?page=order">Đơn hàng</a></li>
        <?php
        if ($_SESSION['user']==1) {
         ?>
         <li><a href="index.php?page=user">Nhân viên</a></li>
         <?php
       }
       ?>

     </ul>
   </div>
 </nav>
</div>




