<div class="main-panel">
	<div class="content-wrapper">
		<div class="container">
			<h3 class=" text-uppercase text-center text-black" style="letter-spacing: 4px;">Sửa thông tin <?php echo '<span class=" text-primary font-weight-bold font-italic">' . $packageID->name . '</span>' ?></h3>
			<form action="<?php echo base_url('package-management/info-package-edit/' . $packageID->id) ?>" method="POST" class="mt-4">

				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-italic font-weight-bold">Tên dịch vụ:</label>
							<input type="text" name="name" id="slug" onkeyup="ChangeToSlug();" class=" form-control form-control-lg" value="<?php echo $packageID->name ?>">
							<?php echo '<span class=" text-danger font-weight-bold">' . form_error('name') . '</span>'; ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-italic font-weight-bold">Slug:</label>
							<input type="text" name="slug" id="convert_slug" class=" form-control form-control-lg" value="<?php echo $packageID->slug ?>">
							<?php echo '<span class=" text-danger font-weight-bold">' . form_error('slug') . '</span>'; ?>
						</div>
					</div>
				</div>


				<div class="mb-3">
					<label for="" class=" text-black font-italic font-weight-bold">Mô tả:</label>
					<textarea name="description" id="description-package" cols="30" rows="10" class=" form-control form-control-lg"><?php echo $packageID->description ?></textarea>
					<?php echo '<span class=" text-danger font-weight-bold">' . form_error('description') . '</span>'; ?>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-italic font-weight-bold">Thời gian gói:</label>
							<input type="number" name="date" id="" min="1" class=" form-control form-control-lg w-50 rounded-pill" placeholder="Tháng" value="<?php echo $packageID->date ?>">
							<?php echo '<span class=" text-danger font-weight-bold">' . form_error('date') . '</span>'; ?>
						</div>

						<div class="mb-3">
							<label for="" class=" text-black font-italic font-weight-bold">Trạng thái:</label>
							<select name="status" id="" class=" form-control form-control-lg w-50 rounded-pill">
								<?php
								if ($packageID->status == 2) {
								?>
									<option value="2" selected>Hiển thị - Nổi bật</option>
									<option value="1">Hiển thị</option>
									<option value="0">Không hiển thị</option>

								<?php
								} else if ($packageID->status == 1) {
								?>
									<option value="2">Hiển thị - Nổi bật</option>
									<option value="1" selected>Hiển thị</option>
									<option value="0">Không hiển thị</option>
								<?php
								} else  if ($packageID->status == 1) {
								?>
									<option value="2">Hiển thị - Nổi bật</option>
									<option value="1">Hiển thị</option>
									<option value="0" selected>Không hiển thị</option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class="text-black font-italic font-weight-bold">Giá:</label>
							<input type="number" name="price" id="priceInput" min="100000" max="99999999" class="form-control form-control-lg w-75 rounded-pill" value="<?php echo $packageID->price ?>">
							<?php echo '<span class="text-danger font-weight-bold">' . form_error('price') . '</span>'; ?>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-2">
						<input type="submit" value="Sửa" class="btn btn-block btn-outline-success w-100" style="font-size: 0.9rem;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>