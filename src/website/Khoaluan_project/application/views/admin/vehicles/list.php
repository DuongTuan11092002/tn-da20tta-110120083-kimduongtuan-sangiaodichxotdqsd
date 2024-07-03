<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Quản lý phân khúc và dòng xe hơi</h2>
		<div class="row">
			<div class="col-lg-3">
				<a href="<?php echo base_url('add-vehicles') ?>" class="btn btn-block btn-success  w-50 m-3" style="letter-spacing: 3px;">Tạo thông tin phân khúc dòng xe </a>
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
		<table id="vehicles-table" class="table table-bordered mt-3 shadow-lg">
			<thead class=" bg-info text-white text-uppercase font-weight-bold">
				<tr>
					<th scope="col">Stt</th>
					<th scope="col">Tên dòng xe</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Quản lý</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				foreach ($list_vehicles as $key => $vehicles) {
					$i++;
				?>
					<tr>
						<th scope="row"><?php echo $i ?></th>
						<td><?php echo $vehicles->name ?></td>
						<td>
							<?php
							if ($vehicles->status == 1) {
								echo '<span class=" text-primary font-weight-bold"> Hiển thị </span>';
							} else {
								echo '<span class=" text-danger font-weight-bold"> Không hiển thị </span>';
							}
							?>
						</td>
						<td class="">
							<a href="<?php echo base_url('edit-vehicles/' . $vehicles->id . '/' . $vehicles->slug)  ?>" class="btn w-25 btn-outline-info  d-inline-block mr-3">Sửa</a>
							<a href="<?php echo base_url('delete-vehicles/' . $vehicles->id )?>" class="btn w-25 btn-outline-danger  d-inline-block">Xóa</a>
						
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>