<div id="page-wrapper">

	<div class="container-fluid">
		<form action="" method="POST" role="form" style="margin: 20px 0px;">

			<div class="row">
				<div class="col-lg-12 col-xs-12 col-md-12">
					<div class="input-group">
						<input type="text" value="<?php if(isset($key)) { echo $keys; } ?>" name="key" class="form-control" placeholder="Nhập tên sản phẩm cần tìm...">
						<span class="input-group-btn">
							<button class="btn btn-default" name="search" type="submit">Tìm kiếm</button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
 
		</form>
		<a href="index.php?page=product&method=addProduct">
			<button class="btn btn-success">Thêm mới</button>
		</a>


		<h4>DANH SÁCH SẢN PHẨM</h4>

		<?php
		if (isset($_SESSION['noti']) && $_SESSION['noti'] == 1) {
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Xóa thành công!
			</div>
			<?php

		}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 'add'){
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Thêm mới thành công!
			</div>
			<?php
		}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 3){
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Có <?php echo $count;?> sản phẩm được tìm thấy
			</div>
			<?php
		}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 4){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Không có sản phẩm được tìm thấy.
			</div>
			<?php
		}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 'update'){
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Cập nhật sản phẩm thành công.
			</div>
			<?php
		}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 'deleteProduct'){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Xóa sản phẩm thành công.
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
						<th>Tên</th>
						<th>Loại</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Ảnh</th>
						<th>Ngày tạo</th>
						<th>Mô tả</th>	
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					$count = 0;
					foreach ($product as $value) {
						$count += 1;
						?>	
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['name_cate']; ?></td>
							<td><?php echo $value['price']; ?></td>
							<td><?php echo $value['quantity']; ?></td>
							<td><img style="width: 100px;" src="../images/product/<?php echo $value['img'];?>" alt=""></td>
							<td><?php echo $value['create_at']; ?></td>
							<td><?php echo $value['description']; ?></td>
							<td>
								<a href="index.php?page=product&method=update&id=<?php echo $value['id']; ?>">
									<button class="btn btn-primary">Sửa</button>
								</a>
								<br><br>
								<?php
								if ($_SESSION['user']==1) {
									?>
									<a href="index.php?page=product&method=remove&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này không? ');">
										<button class="btn btn-danger">Xóa</button>
									</a>
									<?php
								} 
								?>
								
							</td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>

			 <ul class="pagination pagination-lg">
                    <li><a href="#">&laquo;</a></li>
                    <?php
                    	for ($i = 1; $i <= $pag; $i++){
                    	 	?>
                    	 	<li><a href="index.php?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    	 	<?php
                    	 } 
                    ?>
                    <li><a href="#">&raquo;</a></li>
                </ul>
		</div>
	</div>
</div>