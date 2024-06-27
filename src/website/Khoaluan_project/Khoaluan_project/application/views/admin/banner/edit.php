<div class="main-panel">
	<div class="content-wrapper">
		<h1 class=" text-center text-black font-weight-bold text-uppercase">Cập nhật thông tin banner</h1>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<span class="alert alert-success"><?php echo $this->session->flashdata('success') ?></span>
				<?php
				}
				?>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="container">
			<form action="<?php echo base_url('banner-management/info-banner-edit/' . $value->id) ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold">Hình ảnh:</label>
							<input type="file" name="thumbnail" id="" class=" form-control form-control-file">
							<img src="<?php echo base_url('uploads/banner/' . $value->image) ?>" alt="" width="300px" class="mt-3">
						</div>
					</div>
					<div class="col-lg-6">
						<label for="" class=" text-black font-weight-bold">Trạng thái:</label>
						<select name="status" id="" class=" form-control rounded-pill w-50">
							<?php
							if ($value->status == 0) {
							?>
								<option value="0" selected>Không hiển thị</option>
								<option value="1">Hiển thị</option>
								<option value="2">Nổi bật</option>
							<?php
							} else if ($value->status == 1) {
							?>
								<option value="0">Không hiển thị</option>
								<option value="1" selected>Hiển thị</option>
								<option value="2" >Nổi bật</option>
							<?php
							} else if ($value->status == 2) {
							?>
								<option value="0">Không hiển thị</option>
								<option value="1" >Hiển thị</option>
								<option value="2" selected>Nổi bật</option>
							<?php
							}
							?>

						</select>
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