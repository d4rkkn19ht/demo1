
 
        <div class="form-container sign-in-container">
     <div class="container" style="background-image:  url('images/background.jpg');">
        <div class="w3ls_w3l_banner_nav_right_grid" style="border: 1px black;">
            <br>
            <h3>Đăng ký</h3>
            <br>
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Họ tên:</label>
                    <div class="col-sm-6">
                        <input type="text" required class="form-control" id="username" placeholder="Nhập họ tên..." name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" onblur="checkName();">
                    </div>
                    <span id="erroName" style="color: red; font-size: 14px;"></span>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" required class="form-control" id="email" placeholder="Nhập email..." name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" onkeyup="checkEmail();">
                    </div>
                     <span id="erroEmail" style="color: red; font-size: 14px;"><?php if (isset($erroEmail)) {
                        echo $erroEmail;
                    } ?></span>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="phone">Số điện thoại:</label>
                    <div class="col-sm-6">
                        <input type="number" required class="form-control" id="phone" placeholder="Nhập SĐT..." name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" onblur="checkPhone();">
                    </div>
                    <span id="erroPhone" style="color: red; font-size: 14px;"></span>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Mật khẩu:</label>
                    <div class="col-sm-6">          
                        <input type="password" required class="form-control" id="password" placeholder="Nhập mật khẩu..." name="password"  id="pass" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" onblur="checkPass();" >
                    </div>
                    <span id="erroPass" style="color: red; font-size: 14px;"></span>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="repassword">Nhập lại mật khẩu:</label>
                    <div class="col-sm-6">          
                        <input type="password" required class="form-control" id="repassword" placeholder="Nhập lại mật khẩu..." name="repassword" id="repass" value="<?php if(isset($_POST['repassword'])) echo $_POST['repassword']; ?>" onkeyup="checkPass1();">
                    </div>
                    <span id="erroRepass" style="color: red; font-size: 14px;"></span>
                </div>
                
                <div class="form-group">        
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" name="register" class="btn btn-primary">Đăng ký</button>
                        
                    </div>
                    <div class="col-sm-offset-3 col-sm-6">
                        <p>Nếu đã tài khoản, hãy <a href="index.php?page=sign&method=login">Đăng nhập</a></p>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

<script >
    function checkName(){
      var name = document.getElementById('username').value;
      var reGexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;
      var erroName = document.getElementById('erroName');

      if (name == '' || name == null) {
        erroName.innerHTML = 'Họ tên không được để trống!';
      }else if(!reGexName.test(name)){
        erroName.innerHTML = 'Dữ liệu không hợp lệ!';
      }else{
        erroName.innerHTML = '';
        return name;
      }
    }
    function checkPhone(){
      var phone = document.getElementById('phone').value;
      var reGexPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
      var erroPhone = document.getElementById('erroPhone');

      if(phone=='' || phone==null){
        erroPhone.innerHTML = 'Số điện thoại không được để trống!';
      }
      else if(!reGexPhone.test(phone)){
        erroPhone.innerHTML = 'Số điện thoại không hợp lệ';
      }
      else{
        erroPhone.innerHTML = '';
        return phone;
      }
    }
    function checkEmail(){
      var email = document.getElementById('email').value;
      var erroEmail = document.getElementById('erroEmail');
      var reGexEmail = /^[a-z][a-z0-9_\.]{3,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/

      if(email=='' || email==null){
        erroEmail.innerHTML = 'Email không được để trống!';
      }
      else if(!reGexEmail.test(email)){
        erroEmail.innerHTML = 'Email không hợp lệ';
      }
      else{
        erroEmail.innerHTML = '';
        return email;
      }
    }
    function checkPass(){
      var pass = document.getElementById('pass').value;
      var erroPass = document.getElementById('erroPass');
      var reGexPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/

      if(pass=='' || pass==null){
        erroPass.innerHTML = 'Password không được để trống!';
      }
      else if(!reGexPass.test(pass)){
        erroPass.innerHTML = 'Pass không hợp lệ';
      }
      else{
        erroPass.innerHTML = '';
        return pass;
      }
    }
    function checkPass1(){
      var pass1 = document.getElementById('repass').value;
      var pass = document.getElementById('pass').value;
      var erroRepass = document.getElementById('erroRepass');
      var reGexPass1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/

      if(pass1=='' || pass1==null){
        erroRepass.innerHTML = 'Password không được để trống!';
      }
      else if(pass!=pass1){
        erroRepass.innerHTML = 'Password không trùng khớp!';
      }
      else{
        erroRepass.innerHTML = '';
        return pass;
      }
    }
</script>