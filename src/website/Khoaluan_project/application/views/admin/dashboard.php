<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<?php
		if ($this->session->flashdata('success')) {
		?>
			<div class=" alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
		<?php
		} else if ($this->session->flashdata('error')) {
		?>
			<div class=" alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
		<?php
		}
		?>
		<div class="d-xl-flex justify-content-between align-items-start">
			<h2 class="text-dark font-weight-bold mb-2">Tổng quan trang chủ </h2>
			<div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
					<ul class="nav nav-tabs tab-transparent" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="user-tab" data-toggle="tab" href="#business-user" role="tab" aria-selected="true">Người dùng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="business-tab" data-toggle="tab" href="#business-product" role="tab" aria-selected="false">Thống kê</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#business-contact" role="tab" aria-selected="false">Liên hệ</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" id="conversion-tab" data-toggle="tab" href="#" role="tab" aria-selected="false">Conversion</a>
						</li> -->
					</ul>
					<div class="d-md-block d-none">
						<a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
						<a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
					</div>
				</div>
				<div class="tab-content tab-transparent-content">
					<!-- người dùng -->
					<div class="tab-pane fade show active" id="business-user" role="tabpanel" aria-labelledby="user-tab">
						<div class="row">
							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-danger">
										<h5 class="mb-2 text-white font-weight-Bold ">Khách hàng</h5>
										<h2 class="mb-4 font-weight-bolder" style="color: yellow;"><?php echo $count_all_account ?></h2>
										<h1 class=""><i class="bi bi-person-add text-white"></i></h1>
										<h4 class="mt-2 mb-0 text-white">Tài khoản</h4>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-warning">
										<h5 class="mb-2 text-black font-weight-normal">Đăng ký dịch vụ</h5>
										<h2 class="mb-4 text-black font-weight-bold"><?php echo $count_packages_register ?></h2>
										<h1 class=""><i class="bi bi-box-seam text-black"></i></h1>
										<h4 class="mt-4 mb-0 text-black">Chưa xử lý</h4>
									</div>
								</div>
							</div>
							<div class="col-xl-4  col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-success">
										<h5 class="mb-2 text-white font-weight-normal">Đăng ký dịch vụ</h5>
										<h2 class="mb-4 text-white font-weight-bold"><?php echo $count_packages_online ?></h2>
										<h1 class=""><i class="bi bi-cloud-upload-fill text-white"></i></h1>
										<h4 class="mt-4 mb-0 text-white">Đang hoạt động</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="container">
							<h4 class=" text-center text-uppercase mb-3 font-weight-bold">Danh sách hết thời gian dịch vụ</h4>
							<div class="row">
								<table class="table table-bordered shadow-lg">
									<thead>
										<tr class="">
											<th scope="col">STT</th>
											<th scope="col">Tên tài khoản</th>
											<th scope="col">Gói dịch vụ</th>
											<th scope="col">Trạng thái</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										foreach ($select_expired_package as $key => $value) {
											$i++;
										?>
											<tr>
												<th scope="row"><?php echo $i ?></th>
												<td><?php echo $value->tenTK ?></td>
												<td><?php echo $value->tenGOI ?></td>
												<td>
													<?php
													if ($value->status == 3) {
														echo "<span class='text text-danger font-weight-bold'>Hết hạn</span>";
													}
													?>
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
					<!-- Thống kê Sản phẩm - Tin tức -->
					<div class="tab-pane fade show " id="business-product" role="tabpanel" aria-labelledby="business-tab">
						<div class="row">
							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-danger">
										<h5 class="mb-2 text-white font-weight-Bold ">Sản phẩm</h5>
										<h2 class="mb-4 text-white font-weight-bold"><?php echo $count_product ?></h2>
										<h1 class=""><i class="bi bi-car-front-fill text-white"></i></h1>
										<p class="mt-2 mb-0 text-white">Chưa xử lý</p>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-success">
										<h5 class="mb-2 text-white font-weight-normal">Tổng</h5>
										<h2 class="mb-4 text-white font-weight-bold"><?php echo $count_all_product ?></h2>
										<h1 class=""><i class="bi bi-car-front text-white"></i></h1>
										<p class="mt-4 mb-0 text-white">Sản phẩm</p>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-gradient-secondary">
										<h5 class="mb-2 text-dark font-weight-normal">Tổng</h5>
										<h2 class="mb-4 text-dark font-weight-bold"><?php echo $count_all_new ?></h2>
										<h1><i class="bi bi-newspaper text-dark"></i></h1>
										<p class="mt-4 mb-0 text-dark">Tin tức</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-6  col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-gradient-danger">
										<h5 class="mb-2 text-dark font-weight-normal">Tin mua xe</h5>
										<h2 class="mb-4 text-dark font-weight-bold"><?php echo $count_all_new_sale_none ?></h2>
										<h1><i class="bi bi-cart text-dark"></i></h1>
										<p class="mt-4 mb-0 text-dark">Chưa duyệt</p>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-gradient-info">
										<h5 class="mb-2 text-white font-weight-normal">Tin mua xe</h5>
										<h2 class="mb-4 text-white font-weight-bold"><?php echo $count_all_new_sale_checked ?></h2>
										<h1><i class="bi bi-newspaper text-white"></i></h1>
										<p class="mt-4 mb-0 text-white">Đã duyệt</p>
									</div>
								</div>
							</div>


						</div>

					</div>
					<!-- Liên hệ  -->
					<div class="tab-pane fade show " id="business-contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-danger">
										<h5 class="mb-2 text-white font-weight-Bold ">Liên hệ</h5>
										<h2 class="mb-4 text-white font-weight-bold"><?php echo $count_contact_status ?></h2>
										<h1 class=""><i class="bi bi-person-vcard-fill text-white"></i></h1>
										<p class="mt-2 mb-0 text-white">Chưa xử lý</p>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-success">
										<h5 class="mb-2 text-white font-weight-normal">Liên hệ</h5>
										<h2 class="mb-4 text-white font-weight-bold"><?php echo $count_contact_checked ?></h2>
										<h1 class=""><i class="bi bi-person-fill-check text-white"></i></h1>
										<p class="mt-4 mb-0 text-white">Đã xử lý</p>
									</div>
								</div>
							</div>
							<div class="">
								<table class="table table-bordered" id="contact-table">
									<thead>
										<tr>
											<th scope="col">STT</th>
											<th scope="col">Họ và Tên</th>
											<th scope="col">ngày gửi</th>
											<th scope="col">Trạng thái</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										foreach ($select_contact as $key => $value) {
											$i++;
										?>
											<tr>
												<th scope="row"><?php echo $i ?></th>
												<td><?php echo $value->tenTK ?></td>
												<td><?php echo date('d-m-Y', strtotime($value->created_at)) ?></td>
												<td>
													<?php
													if ($value->status == 0) {
														echo "<span class='text text-danger'>Chưa duyệt</span>";
													}else if($value->status == 1){
														echo "<span class='text text-success'>Đã xử lý</span>";
													}
													?>
												</td>
												<td>
													<a href="<?php echo base_url('chi-tiet-lien-he-admin/' . $value->id) ?>" class="btn btn-warning text-dark">Chi tiết</a>
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
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
	<!-- partial:partials/_footer.html -->