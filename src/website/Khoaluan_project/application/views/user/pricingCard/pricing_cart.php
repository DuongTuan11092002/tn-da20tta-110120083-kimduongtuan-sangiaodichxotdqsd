<section class="section" id="pricing">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<div class="title-box text-center">
					<h3 class="title-heading mt-4 text-uppercase font-weight-bold">Các gói dịch vụ mới </h3>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-6">
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<span class=" alert alert-success"><?php echo $this->session->flashdata('success') ?></span>
				<?php
				}
				?>
			</div>
			<div class="col-lg-2"></div>
		</div>

		<div class="row mt-5 pt-4">
			<?php
			foreach ($packages as $key => $package) {
			?>
				<div class="col-lg-4">
					<div class="pricing-box mt-4">
						<h4 class="f-20 font-weight-bold"><?php echo $package->name ?></h4>

						<div class="mt-4 pt-2">
							<h6 class="mb-2 f-18 font-weight-bold">Lợi ích</h6>
								<?php echo "<p style='max-height: 100px; overflow-y: scroll;'>" . $package->description . "</p>"?>
						</div>

						<div class="pricing-plan mt-4 pt-2">
							<h6 class=""><span class=" font-weight-bold text-uppercase mr-1">Giá: </span><?php echo number_format($package->price) . ' vnđ' . '/Tháng' ?></h6>
						</div>


						<div class="mt-4 pt-3">
							<!-- Button trigger modal -->
							<a href="<?php echo base_url('xac-nhan-thanh-toan-goi/' . $package->id . '/' . $package->slug) ?>" class="btn btn-success w-100 rounded-pill">
								Đăng ký
							</a>
						</div>
					</div>
				</div>
			<?php
			}
			?>

			<!-- <div class="col-lg-4">
				<div class="pricing-box mt-4">
					<div class="pricing-badge">
						<span class="badge">Featured</span>
					</div>

					<i class="mdi mdi-account-multiple h1 text-primary"></i>
					<h4 class="f-20 text-primary">Personal</h4>


					<div class="mt-4 pt-2">
						<p class="mb-2 f-18">Features</p>

						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b>
							Target Audience</p>
						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b>
							User Account</p>
						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>100+</b>
							Video Tuts</p>
						<p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Public</b>
							Displays
						</p>
					</div>

					<p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea dictumst.
					</p>

					<div class="pricing-plan mt-4 pt-2">
						<h4 class="text-muted"><s> $19.99</s> <span class="plan pl-3 text-dark">$18.99 </span></h4>
						<p class="text-muted mb-0">Per Month</p>
					</div>

					<div class="mt-4 pt-3">
						<a href="" class="btn btn-primary btn-rounded">Purchase Now</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="pricing-box mt-4">
					<i class="mdi mdi-account-multiple-plus h1"></i>
					<h4 class="f-20">Ultimate</h4>


					<div class="mt-4 pt-2">
						<p class="mb-2 f-18">Features</p>

						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b>
							Target Audience</p>
						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b>
							User Account</p>
						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>100+</b>
							Video Tuts</p>
						<p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Public</b>
							Displays
						</p>
					</div>

					<p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea dictumst.
					</p>

					<div class="pricing-plan mt-4 pt-2">
						<h4 class="text-muted"><s> $29.99</s> <span class="plan pl-3 text-dark">$28.99 </span></h4>
						<p class="text-muted mb-0">Per Month</p>
					</div>

					<div class="mt-4 pt-3">
						<a href="" class="btn btn-primary btn-rounded">Purchase Now</a>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>