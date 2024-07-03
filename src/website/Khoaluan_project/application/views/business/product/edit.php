<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase font-weight-bold" style="letter-spacing: 4px;">Cập nhật thông tin sản phẩm <?php echo "<span class='text text-primary font-italic'>" . $product_car->product_name . "</span>" ?> </h2>

		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<span class=" alert alert-success"><?php echo $this->session->flashdata('success') ?></span>
				<?php
				} else if ($this->session->flashdata('error')) {
				?>
					<span class=" alert alert-danger"><?php echo $this->session->flashdata('error') ?></span>
				<?php
				}
				?>
			</div>
			<div class="col-lg-4"></div>
		</div>

		<form action="<?php echo base_url('san-pham-doanh-nghiep/thong-tin-san-pham-chinh-sua/' . $product_car->product_id) ?>" method="post" class="m-5" enctype="multipart/form-data">

			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Tên sản phẩm:</label>
						<input type="text" name="name" id="slug" onkeyup="ChangeToSlug()" class=" form-control form-control-lg" value="<?php echo $product_car->product_name ?>">
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('name') . "</span>" ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Slug:</label>
						<input type="text" name="slug" id="convert_slug" class=" form-control form-control-lg" readonly value="<?php echo $product_car->product_slug ?>">
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('slug') . "</span>" ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Giá:</label>
						<input type="number" name="price" min="100000" id="" class=" form-control form-control-lg w-50 rounded-pill" value="<?php echo $product_car->product_price ?>">
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('price') . "</span>" ?>
					</div>
				</div>
				<div class="col-lg-6">


					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Trạng thái:</label>
						<select name="status" id="" class=" form-control form-control-lg rounded-pill w-50">
							<?php
							if ($product_car->product_status == 1) {
							?>
								<option value="1" selected>Hiển thị</option>
								<option value="0">Không hiển thị</option>
							<?php
							} else if ($product_car->product_status == 0) {
							?>
								<option value="1">Hiển thị</option>
								<option value="0" selected>Không hiển thị</option>

							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Danh mục hãng xe:</label>
						<select name="company_id" id="" class=" form-control form-control-lg">
							<option value="">---Chọn hãng xe---</option>
							<?php
							foreach ($list_company as $key => $company) {
							?>
								<?php
								if ($product_car->categories_company_id == $company->id) {
								?>
									<option value="<?php echo $company->id ?>" selected><?php echo $company->name ?></option>
								<?php
								} else {
								?>
									<option value="<?php echo $company->id ?>"><?php echo $company->name ?></option>
								<?php
								}
								?>
							<?php
							}
							?>
						</select>
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('company_id') . "</span>" ?>

					</div>

					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Dòng xe:</label>
						<select name="vehicles_id" id="" class=" form-control form-control-lg">
							<option value="">---Chọn dòng xe---</option>
							<?php
							foreach ($list_vehicles as $key => $vehicles) {
							?>
								<?php
								if ($product_car->vehicles_id == $vehicles->id) {
								?>
									<option value="<?php echo $vehicles->id ?>" selected><?php echo $vehicles->name ?></option>
								<?php
								} else {
								?>
									<option value="<?php echo $vehicles->id ?>"><?php echo $vehicles->name ?></option>
								<?php
								}
								?>
							<?php
							}
							?>
						</select>
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('vehicles_id') . "</span>" ?>

					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Thành phố:</label>
						<select name="city_id" id="" class=" form-control form-control-lg ">
							<option value="">---Chọn khu vực---</option>
							<?php
							foreach ($list_citys as $key => $city) {
							?>
								<?php
								if ($product_car->city_area_id == $city->id) {
								?>
									<option value="<?php echo $city->id ?>" selected><?php echo $city->name ?></option>
								<?php
								} else {
								?>
									<option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
								<?php
								}
								?>
							<?php
							}
							?>
						</select>
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('city_id') . "</span>" ?>

					</div>

					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Năm sản xuất:</label>
						<input type="number" name="manufacture_year" id="" class=" form-control form-control-lg  " value="<?php echo $product_car->manufacture_year ?>">
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('price') . "</span>" ?>
					</div>

				</div>

				<div class="col-lg-4">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Loại hộp số:</label>
						<select name="type_gearbox" id="" class=" form-control form-control-lg ">
							<?php
							if ($product_car->type_gearbox == 1) {
							?>
								<option value="">---Loại hộp số---</option>
								<option value="1" selected>Hộp số tự động</option>
								<option value="2">Hộp số sàn</option>
								<option value="3">Hộp số CVT</option>
								<option value="4">Hộp số DCT</option>
							<?php
							} else if ($product_car->type_gearbox == 2) {
							?>
								<option value="">---Loại hộp số---</option>
								<option value="1">Hộp số tự động</option>
								<option value="2" selected>Hộp số sàn</option>
								<option value="3">Hộp số CVT</option>
								<option value="4">Hộp số DCT</option>
							<?php
							} else if ($product_car->type_gearbox == 3) {
							?>
								<option value="">---Loại hộp số---</option>
								<option value="1">Hộp số tự động</option>
								<option value="2">Hộp số sàn</option>
								<option value="3" selected>Hộp số CVT</option>
								<option value="4">Hộp số DCT</option>
							<?php
							} else if ($product_car->type_gearbox == 4) {
							?>
								<option value="">---Loại hộp số---</option>
								<option value="1">Hộp số tự động</option>
								<option value="2">Hộp số sàn</option>
								<option value="3">Hộp số CVT</option>
								<option value="4" selected>Hộp số DCT</option>
							<?php
							}
							?>


						</select>
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('type_gearbox') . "</span>" ?>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-8">
					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Nội dung sản phẩm:</label>
						<textarea name="content" id="content-product" cols="30" rows="5"><?php echo $product_car->product_content ?></textarea>
						<?php echo "<span class=' text-danger font-italic font-weight-bold'>" . form_error('content') . "</span>" ?>
					</div>
				</div>
				<div class="col-lg-4">


					<div class="form-group">
						<label for="" class=" text-black font-italic font-weight-bold">Hình nền:</label>
						<input type="file" name="thumbnail" id="" class=" form-control form-control-lg ">
						<img src="/uploads/product/<?php echo $product_car->product_thumbnail ?>" alt="" srcset="" width="300px" class="m-3">
						<?php if (isset($error)) {
							echo $error;
						} ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-7">
					<div class="form-group">
						<label for="" class="text-black font-italic font-weight-bold">Hình ảnh:</label>
						<input type="file" name="images[]" id="" multiple class="form-control form-control-lg">
						<span class="font-italic ml-2">Hình ảnh: nộp hình ảnh xe hơi (bên ngoài, nội thất bên trong)</span>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="row">
						<?php foreach ($library_img as $key => $library) { ?>
							<div class="col-lg-3 mb-2">
								<div class="position-relative">
									<img src="<?php echo base_url('uploads/product/' . $library->img_car) ?>" alt="" width="100px">
									<a href="<?php echo base_url('xoa-anh-thu-vien/' . $library->id . '/' . $library->product_id) ?>" type="button" class="btn btn-danger btn-sm btn-delete-image">Xóa</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<input type="submit" value="Sửa" class="btn btn-block btn-success text-white font-weight-bold">
				</div>
			</div>

		</form>
	</div>
</div>