

<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Flot Charts -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Thêm mới sản phẩm</h2>
			</div>
		</div> 
		<!-- /.row -->
		<form action="" method="POST" enctype='multipart/form-data'>
			<div class="form-group">
				<label for="cate_id">Loại sản phẩm<span style="color: red;">*</span></label>
				<select class="form-control" name="id_cate" id="id_cate">
					<?php  
					$count=0;
					foreach ($cate as $key => $value) {
						
						?>

						<option <?php if(isset($_POST['id']) && $_POST['id_cate'] == $value['id']){ echo "selected"; } ?> value="<?php echo $value['id']; ?>" >
							<?php echo $value['name_cate']; ?>
						</option>
						<?php
					}
					?>
				</select>

			</div>
			<div class="form-group">
				<label for="namePro">Tên sản phẩm:</label>
				<input type="text" class="form-control" name="namePro" placeholder="Tên sản phẩm" id="namePro" value="<?php if(isset($_POST['namePro'])) echo $_POST['namePro']; ?>">
			</div>
			<div class="form-group">
				<label for="price">Giá:</label>
				<input type="number" class="form-control" name="price" placeholder="Giá sản phẩm" id="price" value="<?php if(isset($_POST['price'])) echo $_POST['price']; ?>">
			</div>
			<div class="form-group">
				<label for="quantity">Số lượng:</label>
				<input type="number" class="form-control" name="quantity" placeholder="Số lượng sản phẩm" id="quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity']; ?>">
			</div>
			<div class="form-group">
				<label for="description">Mô tả sản phẩm:</label>
				<textarea class="form-control" rows="5" id="description" name="description" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>"></textarea>
			</div>
			<div class="form-group">
				<label for="">Upload Ảnh</label>
				<span style="color: red;">
					<?php  
					if (isset($erros) && !empty($erros)) {
						echo $erros;
					}
					?>
				</span>

				<span style="color: green;">
					<?php  

					if (isset($erross) && !empty($erross)) {
						echo $erross;
					}
					?>
				</span>
				<input type="file" name="avatar" class="form-control" />
				<br>
				<input type="file" name="img2" class="form-control" />
				<br>
				<input type="file" name="img3" class="form-control" />
				<br>
				
			</div>

			<button type="submit" name="addProduct" class="btn btn-success" style="margin: 30px 0px;">
				Thêm mới
			</button>

		</form>
		

	</div>
	<!-- /.container-fluid -->
	<br><br>
</div>