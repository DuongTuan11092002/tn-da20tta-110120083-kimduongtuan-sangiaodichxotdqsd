<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Quản lý đăng ký gói</h2>


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
		<div class=" table table-responsive-lg">
			<table class="table  table-bordered shadow shadow-lg" id="register-package-table">
				<thead>
					<tr>
						<th scope="col">Stt</th>
						<th scope="col">Tên khách hàng</th>
						<th scope="col">Tên gói dịch vụ</th>
						<th scope="col">Ngày đăng ký</th>
						<th scope="col">Trạng thái</th>
						<th scope="col">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list as $key => $value) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $value->tenKH ?></td>
							<td><?php echo $value->tengoi ?></td>
							<td><?php echo date('d-m-Y', strtotime($value->created_at)) ?></td>
							<td>
								<?php
								if ($value->status == 1) {
									echo "<span class=' text-danger font-weight-bold'>Chưa xử lý</span>";
								} else if ($value->status == 2) {
									echo "<span class=' text-primary font-weight-bold'>Đã xử lý</span>";
								} if ($value->status == 3) {
									echo "<span class=' text-warning font-weight-bold'>Đã hết hạn</span>";
								}
								?>
							</td>
							<td>
								<a href="<?php echo base_url('detail-register_package/' . $value->id) ?>" class="btn btn-warning text-black mr-2">Chi tiết</a>
								<a href="<?php echo base_url('delete-register_package/' . $value->id) ?>" class="btn btn-danger text-white">Xóa</a>
							</td>
						</tr>
					<?php
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>