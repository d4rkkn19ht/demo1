

        <div class="form-container sign-in-container">
     <div class="container" style="background-image:  url('images/background.jpg');">
        <div class="w3ls_w3l_banner_nav_right_grid" style="border: 1px black;">
            <br>
            <h3>Password</h3>
            <br>
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <div class="col-sm-6">          
                        <input type="email" class="form-control" id="email" placeholder="Nhập email..." name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Mật khẩu mới:</label>
                    <div class="col-sm-6">          
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu..." name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="repassword">Nhập lại mật khẩu mới:</label>
                    <div class="col-sm-6">          
                        <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu..." name="repassword" value="<?php if(isset($_POST['repassword'])) echo $_POST['repassword']; ?>">
                    </div>
                </div>
                
                <div class="form-group">        
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" name="update" class="btn btn-primary">Thay đổi</button>
                        
                </div>


            </form>
        </div>
    </div>
</div>