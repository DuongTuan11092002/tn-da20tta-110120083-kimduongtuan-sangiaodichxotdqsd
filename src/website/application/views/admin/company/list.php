<div class="main-panel">
	<div class="content-wrapper">
		<h1 class=" text-center text-black font-weight-bold text-uppercase">Quản lý danh mục hãng xe hơi</h1>
		<div class="row">
			<div class="col-lg-3 ">
				<a href="<?php echo base_url('add-company') ?>" class="btn btn-block btn-success  w-50 m-3" style="letter-spacing: 3px;">Tạo hãng xe</a>
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
						<th scope="col">Tên danh mục</th>
						<th scope="col">Trạng thái</th>
						<th scope="col">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list_company as $key => $company) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td class=" text-uppercase"><?php echo $company->name ?></td>
						
							<td>
								<?php
								if ($company->status == 1) {
									echo '<span class=" text-primary font-weight-bold"> Hiển thị </span>';
								} else {
									echo '<span class=" text-danger font-weight-bold"> Không hiển thị </span>';
								}
								?>
							</td>
							<td class="">
								<a href="<?php echo base_url('edit-company/' . $company->id)  ?>" class="btn w-25 btn-outline-info  d-inline-block mr-3">Sửa</a>
								<a href="<?php echo base_url('delete-company/' . $company->id) ?>" class="btn w-25 btn-outline-danger  d-inline-block">Xóa</a>

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