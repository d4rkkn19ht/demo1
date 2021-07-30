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
<div class="container">
	<div class="col-md-2 col-sm-2 col-lg-2 col-12">
		<div id="shop-title-cate" style="margin-bottom: 10px;margin-top:20px;">
			<h2 class="text-center">Danh mục</h2>
		</div>
		<ul class="list-group" id="show-cate-product" style="cursor: pointer;">
			<?php
			foreach ($cate as $value) { 
				?>
				<li cate_id="<?php echo $value['id']; ?>" class="name-cate-product list-group-item">
					<?php echo $value['name_cate']; ?>
				</li>
				<?php
			} 
			?>
		</ul>

	</div>

	<div class="col-md-10 col-sm-10 col-lg-10 col-12">
		<form action="" method="POST">
			<div class="textbox2 os-animation" >
				<input type="text" name="name" value="<?php if(isset($name)) { echo $names; } ?>" placeholder="Tên món ăn" />
				<button class="searchh" name="search" type="submit">Tìm kiếm</button>
			</div>
		</form>
		<div class="w3ls_w3l_banner_nav_right_grid1 cate-product">
			<ul>
				<li>
					<div class="row">
						<?php  
						foreach ($product as $valuepro) {
							
							?>
							<div class="col-md-4 w4ls_w4l_banner_left" style="margin-bottom: 50px;">
								<div class="hover14 column">
									<div class="agile_top_brand_left_grid w4l_agile_top_brand_left_grid">
										<div class="agile_top_brand_left_grid_pos">
											<img src="images/offer.png" alt=" " class="offer" />
										</div>
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block">
													<div class="snipcart-thumb">
														<a href="chi-tiet-san-pham/<?php echo $valuepro['id']; ?>"><img src="images/product/<?php echo  $valuepro['img'] ?>" alt=" " class="img-responsive" /></a>
														<p><?php echo $valuepro['name']; ?></p>
														<h4 style="margin-top: -10px;"><?php echo $valuepro['price']; ?>đ<span></span></h4>
													</div>
													<div class="snipcart-details">
														<fieldset>	
															<a><i class="fa fa-2x fa-cart-plus" style="position: relative;"><button style="position: absolute; left:2px; opacity:0;" class="addcart" value="<?php  echo $valuepro['id']; ?>"></button></i></a>
															<a  data-toggle="modal" data-target="#myModal<?php echo $valuepro['id']; ?>" style="float: left;"><i class="fa fa-2x fa-eye"></i></a>
															<a><i class="fa fa-2x fa-heart" style="position: relative;  float: right;"><button style="position: absolute; opacity:0;left:2px;" class="addheart" value="<?php  echo $valuepro['id']; ?>"></button></i></a>
														</fieldset>
														
													</div>
												</div>
											</figure>
										</div>
									</div>
								</div>
							</div>
							<!-- xem nhanh sản phẩm-->
							<div class="modal fade" id="myModal<?php  echo $valuepro['id']; ?>">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->



										<div class="background container-fluid" style="margin:30px;">
											<section class="detail pt-4">
												<div class="row">
													<div class="col-sm-6">
														<img style="height: 350px;" src="images/product/<?php echo $valuepro['img'];?>" alt="photo" id="change">

													</div>
													<div class="col-sm-6">
														<h2 class="text-center mb-4"><?php echo $valuepro['name']; ?></h2>
														<p class="mr-2"> <?php echo $valuepro['description'] ?></p>
														<div class="price text-center">
															Giá: <?php echo $valuepro['price'] ?> VNĐ
														</div>
														<div class="mt-5 mb-3" style="margin-top:20px;">
															<button class="addcarts" value="<?php  echo $valuepro['id']; ?>">Add to cart</button>
															<a><i class="fa fa-2x fa-heart" style="position: relative;margin-left: 30px;"><button style="position: absolute; opacity:0;left:2px;" class="addheart" value="<?php  echo $valuepro['id']; ?>"></button></i></a>
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
			
			<ul class="paginations ">
				<li><a href="menu">&laquo;</a></li>
				<?php
				for ($i = 1; $i <= $pag; $i++){
					?>
					<li class="<?php if(isset($_GET['pag']) && $_GET['pag']!=null) echo "active"; ?>"><a href="index.php?page=cate&pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php
				} 
				?>
				<li><a href="menu">&raquo;</a></li>
			</ul>
			<div class="clearfix"> </div>
		</div>
		
		

	</div>
</div>
