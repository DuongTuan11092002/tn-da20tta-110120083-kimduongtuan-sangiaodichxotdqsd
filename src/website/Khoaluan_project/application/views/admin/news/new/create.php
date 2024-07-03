<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-center font-weight-bold text-uppercase" style="letter-spacing: 5px;">Thêm thông tin bài viết mới</h2>
		<form action="<?php echo base_url('new-management/info-new') ?>" method="post" enctype="multipart/form-data">
			<div class="row mt-2">
				<div class="col-lg-6">
					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Tên bài viết:</label>
						<input type="text" name="name" id="slug" class=" form-control form-control-lg" onkeyup="ChangeToSlug()">
						<?php echo '<span class=" text-danger font-italic font-weight-bold">' . form_error('name') . '</span>' ?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Slug:</label>
						<input type="text" name="slug" id="convert_slug" class=" form-control form-control-lg" readonly>
						<?php echo '<span class=" text-danger font-italic font-weight-bold">' . form_error('slug') . '</span>' ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Mô tả:</label>
						<textarea name="description" id="" cols="30" rows="6" class=" form-control form-control-lg w-75"></textarea>
						<?php echo '<span class=" text-danger font-italic font-weight-bold">' . form_error('description') . '</span>' ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Danh mục:</label>
						<select name="category_id" id="" class=" form-control form-control-lg rounded-pill">
							<?php
							foreach ($list_category as $key => $category) {
							?>
								<option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Người đăng:</label>
						<select name="account_id" id="" class=" form-control form-control-lg rounded-pill">
							<?php
							foreach ($list_account_admin as $key => $account_admin) {
							?>
								<option value="<?php echo $account_admin->id ?>"><?php echo $account_admin->fullname ?></option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Trạng thái:</label>
						<select name="status" id="" class=" form-control form-control-lg rounded-pill w-50">
							<option value="0">Không hiển thị</option>
							<option value="1" selected>Hiển thị</option>
						</select>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-lg-7">
					<div class="mb-3">
						<label for="" class=" text-black font-italic font-weight-bold">Nội dung:</label>
						<textarea name="content" id="content-new-table" cols="30" rows="10"></textarea>
						<?php echo '<span class=" text-danger font-italic font-weight-bold">' . form_error('content') . '</span>' ?>
					</div>
				</div>
				<div class="col-lg-5">
					<label for="" class="text-black font-italic font-weight-bold">Hình ảnh:</label>
					<input type="file" name="thumbnail" id="" class="form-control-file">
					<?php if(isset($error)) { echo $error;} ?>
				</div>

			</div>

			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-5"></div>
				<div class="col-lg-3">
					<input type="submit" value="Thêm" class="btn btn-block btn-success w-50 font-weight-bold">
				</div>
			</div>
		</form>
	</div>
</div>