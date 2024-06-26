<div class="main-panel">
	<div class="content-wrapper">
		<h1 class=" text-center text-black font-weight-bold text-uppercase">Thêm banner mới</h1>
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
			<form action="<?php echo base_url('banner-management/info-banner') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold">Hình ảnh:</label>
							<input type="file" name="thumbnail" id="" class=" form-control form-control-file">
						</div>
					</div>
					<div class="col-lg-6">
						<label for="" class=" text-black font-weight-bold">Trạng thái:</label>
						<select name="status" id="" class=" form-control rounded-pill w-50">
							<option value="0">Không hiển thị</option>
							<option value="1" selected>Hiển thị</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5"></div>
					<div class="col-lg-5"></div>
					<div class="col-lg-2">
						<input type="submit" value="Thêm mới" class="btn btn-success w-100">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>