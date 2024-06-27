<div class="section">
	<div class="post-entry">
		<div class="row">

			<?php
			$this->data['NewListHot'] = $this->indexModel->getNewLimit();
			$this->data['NewSaleCarHot'] = $this->indexModel->selectNewSaleCarHot();
			$this->data['citys'] = $this->cityModel->select();
			$this->load->view('user/template_user/sidebarNew', $this->data);
			?>

			<div class="col-lg-9">
				<h3 class=" text-uppercase text-center mt-5">Đăng tin bán xe hơi</h3>
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php
							if ($this->session->userdata('success')) {
							?>
								<span class=" alert alert-success"><?php echo $this->session->userdata('success') ?></span>
							<?php
							} else  if ($this->session->userdata('error')) {
							?>
								<span class=" alert alert-danger"><?php echo $this->session->userdata('error') ?></span>

							<?php
							}
							?>
						</div>
					</div>

					<form action="<?php echo base_url('thong-tin-dang-tin-ban-xe') ?>" method="post" enctype="multipart/form-data">
						<div class=" row mt-4">
							<div class="col-lg-8">
								<div class="mb-3">
									<label for="" style="color:#333; font-style:italic;">Tên dòng xe: </label>
									<input type="text" name="product_name" id="slug" onkeyup="ChangeToSlug()" class=" form-control form-form-control-plaintext shadow">
									<?php echo "<span class=' text-danger font-italic'>" . form_error('product_name') . "<span>" ?>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="mb-3">
									<label for="" style="color:#333; font-style:italic;" style="color:#888;	">Đường dẫn SEO: </label>
									<input type="text" name="product_slug" id="convert_slug" class=" form-control form-form-control-plaintext shadow" readonly>
									<?php echo "<span class=' text-danger font-italic'>" . form_error('product_slug') . "<span>" ?>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-12 d-flex">
								<div class="mb-3 mr-5">
									<label for="" style="color:#333; font-style:italic;">Hãng xe hơi: </label>
									<select name="categories_company_id" id="" class=" form-control shadow w-100 rounded-pill" required>
										<option value="">CHỌN HÃNG XE HƠI</option>
										<?php
										foreach ($companies as $key => $value) {
										?>
											<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
										<?php
										}
										?>
									</select>
								</div>

								<div class="mb-3 mr-5">
									<label for="" style="color:#333; font-style:italic;">Dòng phân khúc xe hơi: </label>
									<select name="vehicles_id" id="" class=" form-control shadow w-100 rounded-pill" required>
										<option value="">CHỌN DÒNG PHÂN KHÚC</option>
										<?php
										foreach ($vehicles as $key => $value) {
										?>
											<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
										<?php
										}
										?>
									</select>
								</div>

								<div class="mb-3 mr-5">
									<label for="" style="color:#333; font-style:italic;">Khu vực (tỉnh): </label>
									<select name="city_area_id" id="" class=" form-control shadow w-100 rounded-pill" required>
										<option value="">CHỌN THÀNH PHỐ </option>
										<?php
										foreach ($citys as $key => $value) {
										?>
											<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
										<?php
										}
										?>
									</select>
								</div>

								<div class="mb-3 mr-5 ">
									<label for="" style="color:#333; font-style:italic;">Đơn giá(VND): </label>
									<input type="number" name="product_price" id="" min="5000000" class=" form-control form-control-lg w-75 shadow d-flex">
									<?php echo "<span class=' text-danger font-italic'>" . form_error('product_price') . "<span>" ?>

								</div>

							</div>
						</div>


						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="" style="color:#333; font-style:italic;">Năm sản xuất: </label>
											<input type="number" name="manufacture_year" id="" class="w-50 form-control form-control-lg shadow">
											<?php echo "<span class=' text-danger font-italic'>" . form_error('manufacture_year') . "<span>" ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3 mr-5">
											<label for="" style="color:#333; font-style:italic;">Loại hộp số: </label>
											<select name="type_gearbox" id="" class=" form-control shadow w-100 rounded-pill" required>
												<option value="">CHỌN LOẠI HỢP SỐ </option>
												<option value="1">Hộp số tự động</option>
												<option value="2">Hộp số sàn</option>
												<option value="3">Hộp số CVT</option>
												<option value="4">Hộp số DVT</option>
												<option value="5">Khác</option>
											</select>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<label for="" style="color:#333; font-style:italic;">Mô tả: </label>
									<textarea name="product_content" id="" cols="8" rows="5" class=" form-control form-control-lg shadow-lg"></textarea>
									<?php echo "<span class=' text-danger font-italic'>" . form_error('product_content') . "<span>" ?>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="mb-3">
									<label for="" style="color:#333; font-style:italic;">Hình ảnh: </label>
									<input type="file" name="product_thumbnail" id="" class=" form-control form-control-file">
									<span style="color: #888; font-style:italic;">Lưu ý: 1 ảnh toàn cảnh xe hơi</span>
									<?php if (isset($error)) {
										echo $error;
									} ?>
								</div>

								<div class="mb-3">
									<label for="" style="color:#333; font-style:italic;">Hình ảnh chi tiết: </label>
									<input type="file" name="images[]" id="" class=" form-control form-control-file" multiple>
									<span style="color: #888; font-style:italic;">Lưu ý: cung cấp ảnh (nội thất, ngoại thất) xe hơi</span>
									<?php if (isset($error)) {
										echo $error;
									} ?>
								</div>
							</div>
						</div>

					

						<div class="row mb-5">
							<div class="col-lg-4"></div>
							<div class="col-lg-6"></div>
							<div class="col-lg-2">
								<input type="submit" value="Gửi" class="btn btn-success w-100	">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>