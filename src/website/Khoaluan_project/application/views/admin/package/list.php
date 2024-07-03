<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Quản lý gói dịch vụ</h2>
		<div class="row">
			<div class="col-lg-3">
				<a href="<?php echo base_url('add-package') ?>" class="btn btn-block btn-success  w-50 m-3" style="letter-spacing: 3px;">Tạo gói</a>
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
		<div class=" table table-responsive-lg">
			<table class="table shadow shadow-lg table-bordered" id="package-table">
				<thead>
					<tr>
						<th scope="col">Stt</th>
						<th scope="col">Tên gói</th>
						<th scope="col">Giá</th>
						<th scope="col">Thới gian</th>
						<th scope="col">Trạng thái</th>
						<th scope="col">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list_package as $key => $package) {
					$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $package->name ?></td>
							<td><?php echo number_format($package->price) . 'đ' ?></td>
							<td><?php echo $package->date . ' tháng' ?></td>
							<td>
								<?php 
									if($package->status == 1) {
										echo '<span class=" text-primary font-italic font-weight-bold"> Hiển thị </span>';
									}else if($package->status == 0){
										echo '<span class=" text-danger font-italic font-weight-bold"> Không hiển thị </span>';
									}else if($package->status == 2){
										echo '<span class=" text-warning font-italic font-weight-bold"> Nổi bật </span>';
									}
								?>
							</td>
							<td>
								<a href="<?php echo base_url('edit-package/' . $package->id . '/' . $package->slug) ?>" class="btn btn-outline-warning mr-3">Sửa</a>
								<a href="<?php echo base_url('delete-package/'. $package->id) ?>" class="btn btn-outline-danger">Xóa</a>
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