

<div id="page-wrapper">
	<div class="container" >
		<div class="w3ls_w3l_banner_nav_right_grid">
			<br>
			<h3>Lịch sử đặt hàng</h3>
			
		</div>
		<?php
		if ($order==null) {
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> Lịch sử đặt hàng trống <a href="menu"><button class="btn btn-danger">Tiếp tục mua hàng</button></a>
			</div>
			<?php
		}else{
			?>
			<div class="table-responsive ">
				<table class="table table-hover table-bordered "> 
					<thead>
						<tr>
							<th>ID đơn hàng</th>
							<th>Địa chỉ</th>
							<th>Ngày đặt</th>
							<th>Tổng hóa đơn</th>
							<th>Tình trạng</th>
							<th>Chi tiết</th>	

						</tr>
					</thead>
					<tbody>

						<tr>
							<?php

							foreach ($order as $value) {

								$idOrder = $value['id'];

								$total = $value['total'];

								?>	

								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['address']; ?></td>
								<td><?php echo $value['create_at']; ?></td>
								<td><?php echo number_format($total)."VND";?></td>
								<td><?php $status = $value['status_order'];
								if ($status==0) {
									?><p style="color: red;"><?php echo "Đang xử lý"; ?></p><?php

								}else if ($status==1) {
									?><p style="color: blue;"><?php echo "Đang giao hàng"; ?></p><?php
								}else if ($status==2) {
									?><p style="color: green;"><?php  echo "Đơn hàng hoàn thành"; ?></p><?php
								}else if ($status==3) {
									?><p style="color: black;"><?php echo "Đơn hàng đã hủy"; ?></p><?php
								} ?>
							</td>
							
							<td>

								
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $idOrder; ?>" >Xem</button>

								<!-- Modal -->
								<div id="myModal<?php echo $idOrder;?>" class="modal fade" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Chi tiết đơn hàng</h4>
											</div>
											<div class="modal-body">
												<div class="table-responsive ">
													<table class="table table-hover table-bordered ">
														<thead>
															<th>STT</th>
															<th>Món ăn</th>
															<th>Ảnh</th>
															<th>Số lượng</th>
															<th>Đơn giá</th>
															<th>Thành tiền</th>
														</thead> 
														<tbody>
															<?php
															$count1=1;
															
															foreach ($detail[$idOrder] as $key => $value) {

																?>
																<tr>
																	<td><?php echo $count1; $count1++; ?></td>
																	<td><?php echo $value['name']; ?></td>
																	<td><img style="width: 100px;" src="images/product/<?php echo $value['img']; ?>" alt=""></td>
																	<td><?php echo $value['qty']; ?></td>
																	<td><?php echo number_format($value['price'])."VND"; ?></td>
																	<td><?php echo number_format($value['qty']*$value['price'])."VND"; ?></td>
																</tr>
																<?php
															}
															?>
															<tr>
																<td colspan="5">Ship</td>
																<td>25.000VND</td>
															</tr>
															<tr>
																<td colspan="5">Tổng</td>
																<td><?php echo number_format($total)."VND"; ?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>

									</div>
								</div>

							</td>
						</tr>
						<?php
					}
					?>

				</tbody>

			</table>
			
		</div>
	<?php } ?>
</div>
</div>