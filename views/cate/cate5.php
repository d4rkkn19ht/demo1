<style>
.cart-product{
	position: absolute;
	z-index: 9999999;
	width: 50px;
	height: 50px;
	object-fit: cover;
	border-radius: 100%; 
	transition: all 2s ease;
}
	
</style>
<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>Đồ Uống</h6>
				   <ul>
				   	<li>
				   		<div class="row">
				   			<?php  
				               foreach ($product5 as $valuePro) {
				           ?>
				   			<div class="col-md-3 w3ls_w3l_banner_left">
				   				<div class="hover14 column">
				   					<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
				   						<div class="agile_top_brand_left_grid_pos">
				   							<img src="images/offer.png" alt=" " class="offer" />
				   						</div>
				   						<div class="agile_top_brand_left_grid1">
				   							<figure>
				   								<div class="snipcart-item block">
				   									<div class="snipcart-thumb">
				   										<a href="chi-tiet-san-pham/<?php echo $valuePro['id']; ?>"><img src="images/product/<?php echo  $valuePro['img'] ?>" alt=" " class="img-responsive" /></a>
				   										<p><?php echo $valuePro['name']; ?></p>
				   										<h4  style="margin-top: -10px;"><?php echo number_format($valuePro['price']); ?>đ<span></span></h4>
				   									</div>
				   									<div class="snipcart-details">
														<fieldset>	
															<a><i class="fa fa-2x fa-cart-plus" style="position: relative;"><button style="position: absolute; left:2px; opacity:0;" class="addcart" value="<?php  echo $valuePro['id']; ?>"></button></i></a>
															<a  data-toggle="modal" data-target="#myModal<?php echo $valuePro['id']; ?>" style="float: left;"><i class="fa fa-2x fa-eye"></i></a>
															<a><i class="fa fa-2x fa-heart" style="position: relative;  float: right;"><button style="position: absolute; opacity:0;left:2px;" class="addheart" value="<?php  echo $valuePro['id']; ?>"></button></i></a>
														</fieldset>
														
													</div>
				   								</div>
				   							</figure>
				   						</div>
				   					</div>
				   				</div>
				   			</div>
				   			<!-- xem nhanh sản phẩm-->
					<div class="modal fade" id="myModal<?php  echo $valuePro['id']; ?>">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->



								<div class="background container-fluid" style="margin:30px;">
									<section class="detail pt-4">
										<div class="row">
											<div class="col-sm-6">
							                    <img style="height: 350px;" src="images/product/<?php echo $valuePro['img'];?>" alt="photo" id="change">
							                  
							                </div>
											<div class="col-sm-6">
												<h2 class="text-center mb-4"><?php echo $valuePro['name']; ?></h2>
												<p class="mr-2"> <?php echo $valuePro['description'] ?></p>
												<div class="price text-center">
													Giá: <?php echo number_format($valuePro['price']); ?> VNĐ
												</div>
												<div class="mt-5 mb-3" style="margin-top:20px;">
													<button class="addcarts" value="<?php  echo $valuePro['id']; ?>">Add to cart</button>
													<a><i class="fa fa-2x fa-heart" style="position: relative;margin-left: 30px;"><button style="position: absolute; opacity:0;left:2px;" class="addheart" value="<?php  echo $valuePro['id']; ?>"></button></i></a>
												</div>

											</div>
										</div>

									</section>
								</div>

								


								<!-- Modal footer -->


							</div>
						</div>
					</div>
				   			 <?php
				               }
				            ?>
				   		</div>
				   	</li>
				   </ul>
					<div>
						<a href="menu">
							<button type="button" class=" viewMore">Xem Thêm</button>
						</a>
					</div>
					<div class="clearfix"> </div>
				</div>
