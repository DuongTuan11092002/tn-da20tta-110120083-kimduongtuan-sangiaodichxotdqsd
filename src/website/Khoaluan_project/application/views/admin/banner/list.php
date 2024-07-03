<div class="main-panel">
	<div class="content-wrapper">
		<h1 class=" text-center text-black font-weight-bold text-uppercase">Quản lý banner</h1>
		<div class="row">
			<div class="col-lg-3 ">
				<a href="<?php echo base_url('add-banner') ?>" class="btn btn-block btn-success  w-50 m-3" style="letter-spacing: 3px;">Tạo banner mới</a>
			</div>
			<div class="col-lg-4"></div>
			<div class="col-lg-4"></div>
		</div>
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
		<!-- START TABLE -->
		<div class="table-responsive-lg">
			<table id="company-table" class="table table-bordered mt-3 shadow-lg">
				<thead class="text-white font-weight-bold text-uppercase">
					<tr class="">
						<th scope="col">Stt</th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">Trạng thái</th>
						<th scope="col">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list_banners as $key => $banner) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td>
								<img src="<?php echo base_url('uploads/banner/' . $banner->image) ?>" alt="" srcset="">
							</td>
							<td>
								<?php
								if ($banner->status == 1) {
									echo '<span class=" text-primary font-weight-bold"> Hiển thị </span>';
								} else if($banner->status == 2) {
									echo '<span class=" text-warning font-weight-bold"> Nổi bật </span>';
								}else{
									echo '<span class=" text-danger font-weight-bold"> Không hiển thị </span>';
								}
								?>
							</td>
							<td class="">
								<a href="<?php echo base_url('edit-banner/' . $banner->id)  ?>" class="btn w-25 btn-outline-info  d-inline-block mr-3">Sửa</a>
								<a href="<?php echo base_url('delete-banner/' . $banner->id) ?>" class="btn w-25 btn-outline-danger  d-inline-block">Xóa</a>

							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<!-- END TABLE -->
	</div>
</div>