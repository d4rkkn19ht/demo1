
<div id="page-wrapper">

	<div class="container-fluid">
		<form action="" method="POST" role="form" style="margin: 20px 0px;">

			<div class="row">
				<div class="col-lg-12 col-xs-12 col-md-12">
					<div class="input-group">
						<input type="text" value="<?php if(isset($key)) { echo $keys; } ?>" name="key" class="form-control" placeholder="Nhập tên khoa cần tìm...">
						<span class="input-group-btn">
							<button class="btn btn-default" name="search" type="submit">Tìm kiếm</button>
						</span>
					</div>
				</div>
			</div>

		</form>
		<a href="index.php?page=manager&manager=addCate">
			<button class="btn btn-success">Thêm mới</button>
		</a>
		<h4>DANH SÁCH LOẠI SẢN PHẨM</h4>
		<div class="table-responsive">
			<table class="table table-hover"> 
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên</th>
						<th>Mô tả</th>
						<th>Ngày tạo</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					$count = 0;
					foreach ($cate as $value) {
						$count += 1;
						?>	
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $value['name_cate']; ?></td>
							<td><?php echo $value['description']; ?></td>
							<td><?php echo $value['date_cate']; ?></td>
							
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>