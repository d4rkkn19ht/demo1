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
<div class="container datafav">
	<div class="w3ls_w3l_banner_nav_right_grid1 dataFav">
	<h2 class="text-center">Sản phẩm yêu thích</h2><br>
	<?php if (isset($_SESSION['heart'])&& !empty($_SESSION['heart'])) {
    ?> 
	<ul>
		<li>
			<div class="row" style="margin-bottom: 50px;">
				<?php  
				 foreach ($_SESSION['heart'] as $key => $value){	
					
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
												<a href="chi-tiet-san-pham/<?php echo $value['id']; ?>"><img src="images/product/<?php echo  $value['img'] ?>" alt=" " class="img-responsive"/></a>
												<p><?php echo $value['name']; ?></p>
												<h4 style="margin-top: -10px;"><?php echo $value['price']; ?>đ<span></span></h4>
											</div>
											<div class="snipcart-details">
												<fieldset>	
													<a><i class="fa fa-2x fa-cart-plus" style="position: relative;"><button style="position: absolute; left:2px; opacity:0;" class="addcart" value="<?php  echo $value['id']; ?>"></button></i></a>
													<a  data-toggle="modal" data-target="#myModal<?php echo $value['id']; ?>" style="float: left;"><i class="fa fa-2x fa-eye"></i></a>
													<a><i class="fa fa-2x fa-trash" style="position: relative;  float: right;"><button style="position: absolute; opacity:0;left:2px;" class="deltrash" value="<?php  echo $value['id']; ?>"></button></i></a>
												</fieldset>
												
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
					<!-- xem nhanh sản phẩm-->
					<div class="modal fade" id="myModal<?php  echo $value['id']; ?>">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->



								<div class="background container-fluid" style="margin: 30px;">
									<section class="detail pt-4">
										<div class="row">
											<div class="col-sm-6">
							                    <img style="height: 350px;" src="images/product/<?php echo $value['img'];?>" alt="photo" id="change">
							                    
							                </div>
											<div class="col-sm-6">
												<h2 class="text-center mb-4"><?php echo $value['name']; ?></h2>
												<p class="mr-2"> <?php echo $value['description'] ?></p>
												<div class="price text-center">
													Giá: <?php echo $value['price'] ?> VNĐ
												</div>
												<div class="mt-5 mb-3" style="margin-top:20px;">
													<button class="addcarts" value="<?php  echo $value['id']; ?>">Add to cart</button>
													<a><i class="fa fa-2x fa-trash" style="position: relative;margin-left: 30px;"><button style="position: absolute; opacity:0;left:2px;" class="deltrash" value="<?php  echo $value['id']; ?>"></button></i></a>
												</div>

											</div>
										</div>

									</section>
								</div>

								<script>
									function changeImg(id){
										let picture = document.getElementById(id).getAttribute('src');
										document.getElementById('change').setAttribute('src', picture);
									}
								</script>


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
	<?php 
	}else{
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> Không có sản phẩm yêu thích nào! <a href="menu"><button class="btn btn-danger">Tiếp tục xem sản phẩm</button></a>
	</div>
	<?php
	} 
	?>	
	<div class="clearfix"> </div>
</div>
</div>