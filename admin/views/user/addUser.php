

<div id="page-wrapper">
	<form action="" method="POST" role="form">
		<legend>Thêm mới nhân viên</legend>

		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" id="username" required class="form-control" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
		</div>

		<div class="form-group">
			<label for="email">Email <span style="color: red;"><?php if (isset($erro)) {
				echo $erro;
			} ?></span></label>
			<input type="email" id="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
		</div>

		<div class="form-group">
			<label for="phone">Số điện thoại</label>
			<input type="number" id="phone" class="form-control" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
		</div>

		<div class="form-group">
			<label for="role">Vai trò</label>
			<select class="form-control" name="role" id="role"> 
				
				<option <?php if (isset($_POST['role']) && $_POST['role']==0) { echo "selected";} ?> value="0" >
					Nhân viên
				</option>
				<option <?php if (isset($_POST['role']) && $_POST['role']==1) { echo "selected";} ?> value="1" >
					Admin
				</option>
				
			</select>
		</div>

	

		<button type="submit" name="add" class="btn btn-primary" style="margin: 30px 0px;">
			Thêm mới
		</button>
	</form>

</div>
