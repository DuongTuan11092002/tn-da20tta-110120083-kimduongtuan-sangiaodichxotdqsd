<div class="main-panel">
	<div class="content-wrapper">
		<div class="container">
			<?php

			?>
			<h3 class=" text-uppercase text-center text-black" style="letter-spacing: 4px;">Thông tin hãng xe <?php echo '<span class=" text-primary font-italic ">' . $companyID->name . '</span>' ?> </h3>
			<form action="<?php echo base_url('company-managament/info-company-edit/' . $companyID->id) ?>" method="POST" class="mt-4" enctype="multipart/form-data">
				<div class="row">

					<div class="col-lg-6 mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Tên hãng xe:</label>
						<input type="text" name="name" id="slug" onkeyup="ChangeToSlug();" class=" form-control form-control-lg w-75" value="<?php echo $companyID->name ?>">
						<?php echo '<span class=" text-danger font-weight-bold">' . form_error('name') . '</span>'; ?>
					</div>

					<div class="col-lg-6 mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Slug:</label>
						<input type="text" name="slug" id="convert_slug" value="<?php echo $companyID->slug ?>" class=" form-control form-control-lg w-75">
						<?php echo '<span class=" text-danger font-weight-bold">' . form_error('slug') . '</span>'; ?>
					</div>

				</div>
				<div class="row">

					<div class="col-lg-6 mb-3">
						
					</div>

					<div class="col-lg-6 mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Trạng thái:</label>
						<select name="status" id="" class=" form-control form-control-lg w-25 rounded-pill">
							<?php
							if ($companyID->status == 1) {
							?>
								<option value="1" selected>Hiển thị</option>
								<option value="0">Không hiển thị</option>
							<?php
							} else if ($companyID->status == 0) {
							?>
								<option value="1">Hiển thị</option>
								<option value="0" selected>Không hiển thị</option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-2">
						<input type="submit" value="Sửa" class="btn btn-block btn-outline-success w-50" style="font-size: 0.9rem;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>