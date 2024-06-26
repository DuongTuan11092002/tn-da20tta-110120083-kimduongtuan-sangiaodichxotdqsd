<div class="main-panel">
	<div class="content-wrapper">
		<div class="container">
			<h3 class=" text-uppercase text-center text-black" style="letter-spacing: 4px;">Thêm thông tin dòng xe mới</h3>
			<form action="<?php echo base_url('vehicles-management/info-vehicles') ?>" method="POST" class="mt-4">
				<div class="mb-3">
					<label for="" class=" text-black font-italic font-weight-bold">Tên phân khúc và dòng xe:</label>
					<input type="text" name="name" id="slug" onkeyup="ChangeToSlug();" class=" form-control form-control-lg w-75">
					<?php echo '<span class=" text-danger font-weight-bold">' . form_error('name') . '</span>'; ?>
				</div>

				<div class="mb-3">
					<label for="" class=" text-black font-italic font-weight-bold">Slug:</label>
					<input type="text" name="slug" id="convert_slug" class=" form-control form-control-lg w-75">
					<?php echo '<span class=" text-danger font-weight-bold">' . form_error('slug') . '</span>'; ?>
				</div>

				<div class="mb-3">
					<label for="" class=" text-black font-italic font-weight-bold">Trạng thái:</label>
					<select name="status" id="" class=" form-control form-control-lg w-25 rounded-pill">
						<option value="1" selected>Hiển thị</option>
						<option value="0">Không hiển thị</option>
					</select>
				</div>
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-2">
						<input type="submit" value="Thêm" class="btn btn-block btn-outline-success w-50" style="font-size: 0.9rem;">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>