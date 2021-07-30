

<div id="page-wrapper">
	<form action="" method="POST" role="form">
		<legend>Sửa thông tin nhân viên</legend>

		<div class="form-group">
			<label for="username">Username<span style="color: red;">*</span></label>
			<input type="text" id="username" required class="form-control" name="username" value="<?php echo $user['username']; ?>">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
		</div>

		<div class="form-group">
			<label for="phone">Số điện thoại</label>
			<input type="number" id="phone" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
		</div>

		<div class="form-group">
			<label for="role">Vai trò</label>
			<select class="form-control" name="role" id="role"> 
				<option <?php if($user['role'] == 1) { echo "selected"; } ?> value="1" >
					<?php echo "Admin"; ?>
				</option>
				<option <?php if($user['role'] == 0) { echo "selected"; } ?> value="0" >
					<?php echo "Nhân viên"; ?>
				</option>
			</select>
		</div>

		<div class="form-group">
			<label>Tình trạng 
				<label><input style="margin-left: 20px;" type="radio" name="status" value="1" <?php 
				$status = $user['status']; if ($status==1) { echo "checked";} ?>> Đang hoạt động.</label>
				<label><input style="margin-left: 20px;" type="radio" name="status" value="0" <?php $status = $user['status']; if ($status==0) { echo "checked";} ?>> Ngừng hoạt động. </label>
			</label>
		</div>

		<button type="submit" name="update" class="btn btn-primary" style="margin: 30px 0px;">
			Cập nhật
		</button>
	</form>

</div>
