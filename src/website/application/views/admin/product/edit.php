<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-center text-black text-uppercase font-weight-bold">Cập nhật thông tin đăng bán sản phẩm</h2>
		<div class="container">
			<form action="<?php echo base_url('handle-edit-product-management/' . $value->product_id) ?>" method="post">
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="">Tên sản phẩm: </label>
							<input type="text" name="" id="" value="<?php echo $value->product_name ?>" readonly class=" form-control form-control-lg shadow">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="">Tên sản phẩm: </label>
							<input type="text" name="" id="" value="<?php echo number_format($value->product_price) . ' VND' ?>" readonly class=" form-control form-control-lg shadow">
						</div>
					</div>
				</div>

				<div class="row">

					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" d-block">Hình ảnh: </label>
							<img src="<?php echo base_url('uploads/product/' . $value->product_thumbnail) ?>" alt="" width="200px">
						</div>
					</div>

					<div class="col-lg-6 ">
						<div class="row d-flex">
							<div class="col-lg-5">
								<div class="mb-3">
									<label for="">Năm sản xuất: </label>
									<input type="text" name="" id="" value="<?php echo $value->manufacture_year ?>" readonly class=" form-control form-control-lg shadow w-50">
								</div>
							</div>
							<div class="col-lg-5">

								<div class="mb-3">
									<label for="">Loại hợp số: </label>
									<input type="text" name="" id="" value="<?php
																			if ($value->type_gearbox == 1) {
																				echo "Hộp số tự động";
																			} else if ($value->type_gearbox == 2) {
																				echo "Hộp số sàn";
																			} else if ($value->type_gearbox == 3) {
																				echo "Hộp số CVT";
																			} else if ($value->type_gearbox == 4) {
																				echo "Hộp số DCT";
																			} else if ($value->type_gearbox == 5) {
																				echo "Khác";
																			}
																			?>" readonly class=" form-control form-control-lg shadow w-75">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-5">
								<div class="mb-3">
									<label for="">Ngày đăng bài: </label>
									<input type="text" name="" id="" value="<?php echo date('d-m-Y', strtotime($value->created_at)) ?>" readonly class=" form-control form-control-lg shadow w-100">
								</div>
							</div>
							<div class="col-lg-5">
								<div class="mb-3">
									<label for="">Ngày hết hạn: </label>
									<?php $date = date('Y-m-d', strtotime($value->created_end)); ?>
									<input type="date" name="created_end" id="" value="<?php echo $date ?>" class="form-control form-control-lg shadow w-100">
								</div>
							</div>
						</div>


					</div>


				</div>

				<div class="row">

					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" d-block">Hình ảnh chi tiết: </label>
							<div class="row">

								<?php
								foreach ($valueIMG as $key => $image) {
								?>
									<div class="col-lg-3 mb-2">
										<div class="position-relative">
											<img src="<?php echo base_url('uploads/product/' . $image->img_car) ?>" alt="" width="100px">

										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>


					<div class="col-lg-6">
						<div class="mb-3">
							<label for="">Nội dung: </label>
							<textarea name="" id="" readonly class=" form-control form-control-lg" rows="10" cols="10"><?php echo $value->product_content ?></textarea>
						</div>
					</div>

				</div>



				<div class="row">
					<div class="col-lg-6">

					</div>

					<div class="col-lg-6">
						<div class="row d-flex">
							<div class="col-lg-5">
								<div class="mb-3">
									<label for="">Thành phố:</label>
									<input type="text" class=" form-control form-control-lg" value="<?php echo $value->tenTP ?>" readonly>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="mb-3">
									<label for="">Dòng xe:</label>
									<input type="text" class=" form-control form-control-lg" value="<?php echo $value->tenDX ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-5">
								<div class="mb-3 mr-2">
									<label for="">Tên hãng xe:</label>
									<input type="text" class=" form-control form-control-lg" value="<?php echo $value->tenHX ?>" readonly>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="mb-3 mr-2">
									<label for="">Trạng thái:</label>
									<select name="product_status" id="" class=" form-control rounded-pill">
										<?php
										if ($value->product_status == 0) {
										?>
											<option value="0" selected>Chưa duyệt</option>
											<option value="1">Đã duyệt</option>
											<option value="2">Tin nổi bật</option>
											<option value="3" >Hết hạn</option>

										<?php
										} else if ($value->product_status == 1) {
										?>
											<option value="0">Chưa duyệt</option>
											<option value="1" selected>Đã duyệt</option>
											<option value="2">Tin nổi bật</option>
											<option value="3" >Hết hạn</option>

										<?php
										} else if ($value->product_status == 2) {
										?>
											<option value="0">Chưa duyệt</option>
											<option value="1">Đã duyệt</option>
											<option value="2" selected>Tin nổi bật</option>
											<option value="3" >Hết hạn</option>

										<?php
										} else if ($value->product_status == 3) {
										?>
											<option value="0">Chưa duyệt</option>
											<option value="1">Đã duyệt</option>
											<option value="2">Tin nổi bật</option>
											<option value="3" selected>Hết hạn</option>
										<?php
										}
										?>
									</select>

								</div>
							</div>

						</div>


					</div>
				</div>
				<div class="row">
					<div class="col-lg-5"></div>
					<div class="col-lg-5"></div>
					<div class="col-lg-2">
						<input type="submit" value="Cập nhật" class="btn btn-success w-100">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>