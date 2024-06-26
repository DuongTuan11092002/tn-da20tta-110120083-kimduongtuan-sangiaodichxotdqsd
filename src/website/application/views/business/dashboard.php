<div class="main-panel">
	<div class="content-wrapper">

		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-6">
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<span class=" alert alert-danger font-weight-bold"><?php echo $this->session->flashdata('success') ?></span>
				<?php
				}
				?>
			</div>
			<div class="col-lg-4"></div>
		</div>



		<div class="d-xl-flex justify-content-between align-items-start">
			<h2 class="text-dark font-weight-bold mb-2 text-uppercase"> tổng quan doanh nghiệp </h2>

		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
					<ul class="nav nav-tabs tab-transparent" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#business-contact" role="tab" aria-selected="true">Thông tin</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link " id="product-tab" data-toggle="tab" href="#business-product" role="tab" aria-selected="false">Business</a>
						</li> -->
						<!-- <li class="nav-item">
							<a class="nav-link" id="performance-tab" data-toggle="tab" href="#" role="tab" aria-selected="false">Performance</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="conversion-tab" data-toggle="tab" href="#" role="tab" aria-selected="false">Conversion</a>
						</li> -->
					</ul>
					<div class="d-md-block d-none">
						<a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
						<a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
					</div>
				</div>
				<div class="tab-content tab-transparent-content">
					<div class="tab-pane fade show active" id="business-contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row">
							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-danger text-white">
										<h5 class="mb-2  font-weight-bold text-uppercase " style="letter-spacing: 5px;">Danh sách</h5>
										<h2 class="mb-4  font-weight-bold  text-uppercase">Liên hệ</h2>
										<div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center "></i></div>
										<p class="mt-4 mb-0">Chưa xử lý</p>
										<h3 class="mb-0 font-weight-bold mt-2 "><?php echo $countToContactCheck ?></h3>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-warning">
										<h5 class="mb-2 font-weight-bold text-uppercase " style="letter-spacing: 5px;">Danh sách</h5>
										<h2 class="mb-4 font-weight-bold  text-uppercase">Liên hệ</h2>
										<div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center"></i></div>
										<p class="mt-4 mb-0">Đã xử lý</p>
										<h3 class="mb-0 font-weight-bold mt-2"><?php echo $countToContactChecked ?></h3>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body text-center bg-success text-white">
										<h5 class="mb-2 font-weight-bold text-uppercase " style="letter-spacing: 5px;">Tổng</h5>
										<h2 class="mb-4 font-weight-bold  text-uppercase">sản phẩm</h2>
										<div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-car icon-md absolute-center"></i></div>
										<p class="mt-4 mb-0">Hiện tại</p>
										<h3 class="mb-0 font-weight-bold mt-2"><?php echo $countToProduct ?></h3>
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="container p-5">
								<table class="table table-bordered shadow-lg" id="business-contact-table">
									<thead class=" table-dark" >
										<tr>
											<th scope="col">Stt</th>
											<th scope="col">Họ và Tên</th>
											<th scope="col">Số điện thoại</th>
											<th scope="col">Sản phẩm</th>
											<th scope="col">Ngày gửi</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										foreach ($contacts as $key => $value) {
											$i++;
										?>
											<tr>
												<th scope="row"><?php echo $i ?></th>
												<td><?php echo $value->fullname ?></td>
												<td><?php echo $value->phone ?></td>
												<td><?php echo $value->tenSP?></td>
												<td><?php echo $value->created_at?></td>
												<td><a href="<?php echo base_url('chi-tiet-lien-he-san-pham/' . $value->id) ?>" class="btn btn-warning text-black font-weight-bold">Chi tiết</a></td>
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

	<!-- partial -->
</div>