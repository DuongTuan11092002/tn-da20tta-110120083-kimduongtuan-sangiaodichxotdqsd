<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-center font-weight-bold text-uppercase" style="letter-spacing: 5px;">Thông tin danh mục <?php echo '<span class=" text-primary font-weight-bold font-italic">' . $categoryID->name . '</span>' ?></h2>
		<div class="container mt-5">
			<form action="<?php echo base_url('category-management/info-category-edit/' . $categoryID->id) ?>" method="post">
				<div class="mb-3">
					<label for="" class=" font-italic font-weight-bold">Tên danh mục:</label>
					<input type="text" name="name" class=" form-control form-control-lg w-100" id="slug" onkeyup="ChangeToSlug()" value="<?php echo $categoryID->name ?>">
				</div>

				<div class="mb-3">
					<label for="" class=" font-italic font-weight-bold">Slug:</label>
					<input type="text" name="slug" class=" form-control form-control-lg w-100" id="convert_slug" value="<?php echo $categoryID->slug ?>">
				</div>

				<div class="mb-3">
					<label for="" class=" font-italic font-weight-bold">Trạng thái:</label>
					<select name="status" id="" class=" form-control form-control-lg w-50 rounded-pill">
						<?php
						if ($categoryID->status == 1) {
						?>
							<option value="1" selected>Hiển thị</option>
							<option value="0">Không hiển thị</option>
						<?php
						} else if ($categoryID->status == 0) {
						?>
							<option value="1">Hiển thị</option>
							<option value="0" selected>Không hiển thị</option>
						<?php
						}
						?>
					</select>
				</div>

				<div class="row">
					<div class="col-lg-5"></div>
					<div class="col-lg-5"></div>
					<div class="col-lg-2">
						<input type="submit" value="Sửa" style="letter-spacing: 2px;" class="btn btn-block btn-success font-weight-bold p-2">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>