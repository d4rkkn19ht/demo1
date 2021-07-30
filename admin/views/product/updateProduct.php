

<div id="page-wrapper">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<legend>Sửa thông tin sản phẩm</legend>

		<div class="form-group">
			<label for="namePro">Tên món ăn<span style="color: red;">*</span></label>
			<input type="text" id="namePro" required class="form-control" name="namePro" placeholder="Tên món ăn..." value="<?php echo $row['name']; ?>">
		</div>


		<div class="form-group">
			<label for="id_cate">Loại món ăn<span style="color: red;">*</span></label>
			<select class="form-control" name="id_cate" id="id_cate">
				<?php  
				foreach ($cate as $key => $value) {
					?>
					<option <?php if($value['id'] == $row['cate_id']) { echo "selected"; } ?> value="<?php echo $value['id']; ?>" >
						<?php echo $value['name_cate']; ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="price">Giá</label>
			<input type="number" id="price" class="form-control" name="price" placeholder="Gía món ăn..." value="<?php echo $row['price']; ?>">
		</div>

		<div class="form-group">
			<label for="quantity">Số lượng<span style="color: red;">*</span></label>
			<input type="number" id="quantity" required class="form-control" name="quantity" placeholder="Số lượng..." value="<?php echo $row['quantity']; ?>">
		</div>

		<div class="form-group">
			<label for="description">Mô tả<span style="color: red;">*</span></label>	
			<textarea class="form-control" rows="3" id="description" name="description"><?php echo $row['description']; ?></textarea>

		</div>

		<div class="form-group">
			<label for="img">Ảnh<span style="color: red;">*</span></label>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Ảnh hiện tại</th>
						<th>Ảnh cập nhật</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><img style="width: 250px; margin: 0px auto;" src="../images/product/<?php echo $row['img'];?>" alt=""></td>
						<td><input type="file" name="avatar" class="form-control" ></td>
					</tr>
					<!-- <tr>
						<td><img style="width: 250px; margin: 0px auto;" src="../images/product/<?php echo $img2;?>" alt=""></td>
						<td><input type="file" name="img2" class="form-control" ></td>
					</tr>
					<tr>
						<td><img style="width: 250px; margin: 0px auto;" src="../images/product/<?php echo $img3;?>" alt=""></td>
						<td><input type="file" name="img3" class="form-control" ></td>
					</tr> -->
				</tbody>
			</table>

		</div>

		<button type="submit" name="update" class="btn btn-primary" style="margin: 30px 0px;">
			Cập nhật
		</button>
	</form>

</div>
