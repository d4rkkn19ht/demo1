
<div id="page-wrapper">

	<div class="container-fluid">
		<form action="" method="POST" role="form" style="margin: 20px 0px;">

			<div class="row">
				<div class="col-lg-12 col-xs-12 col-md-12">
					<div class="input-group">
						<input type="text" value="<?php if(isset($key)) { echo $keys; } ?>" name="key" class="form-control" placeholder="Nhập thông tin nhân viên cần tìm...">
						<span class="input-group-btn">
							<button class="btn btn-default" name="search" type="submit">Tìm kiếm</button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->

		</form>
		<a href="index.php?page=user&method=add">
			<button class="btn btn-success">Thêm mới</button>
		</a>


		<h4>DANH SÁCH NHÂN VIÊN</h4>

		<?php
		if (isset($_SESSION['noti']) && $_SESSION['noti'] == 'update') {
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Cập nhật thành công!.
			</div>
			<?php
		}else if (isset($_SESSION['noti']) && $_SESSION['noti'] == 'delete') {
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Xóa thành công!
			</div>
			<?php
		}else if (isset($_SESSION['noti']) && $_SESSION['noti'] == 3) {
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Có <?php echo $count; ?> nhân viên được tìm thấy!
			</div>
			<?php
		}else if (isset($_SESSION['noti']) && $_SESSION['noti'] == 4) {
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Không có nhân viên được tìm thấy!
			</div>
			<?php
		}else if (isset($_SESSION['noti']) && $_SESSION['noti'] == 'add') {
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Thêm mới thành công!
			</div>
			<?php
		}
		unset($_SESSION['noti']);
		?>

		<div class="table-responsive">
			<table class="table table-hover"> 
				<thead>
					<tr>
						<th>STT</th>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>SĐT</th>
						<th>Vai trò</th>
						<th>Tình trạng</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php  
					$count = 0;
					foreach ($user as $value) {
						$count += 1;
						?>	
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $value['id']; ?></td>
							<td><?php echo $value['username']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['phone']; ?></td>
							<td><?php if ($value['role']==0) {
								?> <p > <?php echo "Nhân viên"; ?> </p><?php
							}else{
								?> <p> <?php echo "Admin"; ?> <?php
							} ?></td>
							<td>
							<td><?php if ($value['status']==0) {
									?> <p style="color: red;"> <?php echo "Ngừng hoạt động."; ?> </p><?php
								}else{
									?> <p style="color: green;"> <?php echo "Đang hoạt động"; ?> <?php
								} ?>
							</td>
							<td>
								<a href="index.php?page=user&method=update&id=<?php echo $value['id']; ?>">
									<button class="btn btn-primary">Sửa</button>
								</a>
								<a href="index.php?page=user&method=remove&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có muốn xóa nhân viên này không? ');">
									<button class="btn btn-danger">Xóa</button>
								</a>
							</td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>