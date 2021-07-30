
<div id="page-wrapper">

	<div class="container-fluid">
		<div>
			<form aaction="" method="POST" role="form">
				<p>Tên khách hàng: <span class="detail_order"><?php echo $detail['name']; ?> </span> </p>
				<p>Số điện thoại: <span class="detail_order"><?php echo $detail['phone']; ?> </span></p>
				<p>Địa chỉ giao hàng:  <span class="detail_order"><?php echo $detail['address']; ?> </span></p>
				<p>Ngày đặt:  <span class="detail_order"><?php echo $detail['create_at']; ?> </span></p>
				
				<p>Tình trạng đơn hàng: 
					<label><input type="radio" name="status" value="0" <?php 
					$status = $detail['status_order']; if ($status==0) { echo "checked";} ?>> Đang xử lý.</label>
					<label><input type="radio" name="status" value="1" <?php $status = $detail['status_order']; if ($status==1) { echo "checked";} ?>> Đang giao hàng. </label>
					<label><input type="radio" name="status" value="2" <?php $status = $detail['status_order']; if ($status==2) { echo "checked";} ?>> Đơn hàng hoàn thành.</label>
					<label><input type="radio" name="status" value="3" <?php $status = $detail['status_order']; if ($status==3) { echo "checked";} ?>> Hủy đơn hàng.</label>
				</p>
				
				<p>Chi tiết đơn hàng: 
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Đơn giá</th>
								<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count=0; $total=0;
							foreach ($detail_order as $key => $value) {
								?>
								<tr>
									<td><?php $count++; echo $count; ?></td>
									<td><?php echo $value['name']; ?></td>
									<td><?php echo $value['qty']; ?></td>
									<td><?php echo $value['price']; ?>đ</td>
									<td><?php $sum =$value['qty']*$value['price']; echo $sum; $total+=$sum ?>đ</td>
								</tr>
								<?php
							}
							?>
							<tr>
								<th>Tổng tiền</th>
								<th style="text-align: right; font-size: 15px; " colspan="4"><?php echo $total; ?>đ</th>
							</tr>
						</tbody>
					</table>

				</p>

				<button type="submit" name="update" class="btn btn-primary" style="margin: 30px 0px;">
					Cập nhật
				</button>
			</form>
		</div>
	</div>
</div>