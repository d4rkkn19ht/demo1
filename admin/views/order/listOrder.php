

<div id="page-wrapper">

	<div class="container-fluid">


		<h4>DANH SÁCH ĐƠN HÀNG</h4>

		<?php
		if (isset($_SESSION['noti']) && $_SESSION['noti'] == 'update') {
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Cập nhật thành công!
			</div>
			<?php
		}else if(isset($_SESSION['noti']) && $_SESSION['noti'] == 'deleteOrder'){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong>Xóa thành công!
			</div>
			<?php
		}unset($_SESSION['noti']);
		?>

		<?php
			$count0=0; $count1=0; $count2=0; $count3=0;
					foreach ($orderStatus as $key => $value) {
						$status = $value['status_order'];
						if ($status==0) {
							$count0++;
						}else if($status==1){
							$count1++;
						}else if($status==2){
							$count2++;
						}else if($status==3){
							$count3++;
						}
					}
		?>
		<a href="index.php?page=order&method=loading">Đơn hàng đang xử lý <span class="badge" style="background-color: red;"><?php echo $count0;; ?></span></a><br>
		<a href="index.php?page=order&method=ship">Đơn hàng đang giao <span class="badge" style="background-color: blue;"><?php echo $count1; ?></span></a><br>
		<a href="index.php?page=order&method=end">Đơn hàng hoàn thành <span class="badge" style="background-color: green;"><?php echo $count2; ?></span></a><br>
		<a href="index.php?page=order&method=cancel">Đơn hàng đã hủy <span class="badge" style="background-color: black;"><?php echo $count3;; ?></span></a><br>
		<div class="table-responsive">
			<table class="table table-hover"> 
				<thead>
					<tr>
						<th>STT</th>
						<th>ID đơn hàng</th>
						<th>Tên khách hàng</th>
						<th>Tình trạng</th>
						<th>Ngày tạo</th>
						<th>Ghi chú</th>	
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php  
					$count = 0;
					foreach ($order as $value) {
						$count += 1;
						?>	
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $value['id']; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php $status = $value['status_order'];
							if ($status==0) {
								?><p style="color: red;"><?php echo "Đang xử lý"; ?></p><?php
							
							}else if ($status==1) {
								?><p style="color: blue;"><?php echo "Đang giao hàng"; ?></p><?php
							}elseif ($status==2) {
								?><p style="color: green;"><?php  echo "Đơn hàng hoàn thành"; ?></p><?php
							}else if ($status==3) {
								?><p style="color: black;"><?php echo "Đã hủy"; ?></p><?php
							}?></td>
							<td><?php echo $value['create_at']; ?></td>
							<td><?php echo $value['note']; ?></td>
							<td>
								<a href="index.php?page=order&method=detail&id=<?php echo $value['id']; ?>">
									<button class="btn btn-success">Xem chi tiết</button>
								</a>
								<?php if ($_SESSION['user']==1) {
									?>
										<a href="index.php?page=order&method=remove&id=<?php echo $value['id']; ?>" onclick="return confirm('Bạn có muốn xóa đơn hàng này không? ');">
									<button class="btn btn-danger">Xóa</button>
								</a>
									<?php
								} ?>
							
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