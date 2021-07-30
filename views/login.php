<div class="form-container sign-in-container">
     <div class="container" style="background-image:  url('images/background.jpg');">
        <div class="w3ls_w3l_banner_nav_right_grid" style="border: 1px black;">
            <br>
            <h3>Đăng nhập</h3>
            <br>
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group"> 
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" placeholder="Nhập email..." name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Mật khẩu:</label>
                    <div class="col-sm-6">          
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu..." name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-3 col-sm-6">
                    <div class="checkbox">
                        <p style="color: red;"><?php if (isset($erro)) {
                            echo $erro;
                        } ?></p>
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
                        <a href="quen-mat-khau">Quên mật khẩu?</a>
                    </div>
                    <div class="col-sm-offset-3 col-sm-6">
                        <p>Nếu chưa có tài khoản, hãy <a href="dang-ki">Đăng ký</a></p>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>