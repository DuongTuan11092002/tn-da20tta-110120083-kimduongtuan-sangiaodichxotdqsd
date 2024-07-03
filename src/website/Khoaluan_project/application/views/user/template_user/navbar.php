
<!-- Navbar Start -->
<div class="container-fluid mb-5">
	<div class="row border-top px-xl-5">
		<div class="col-lg-3 d-none d-lg-block">
			<a class="btn shadow-none d-flex align-items-center justify-content-between bg-success text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
				<h6 class="m-0 text-white text-uppercase">Danh mục</h6>
				<i class="fa fa-angle-down text-dark"></i>
			</a>
			<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
				<div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
					<div class="nav-item dropdown">
						<a href="#" class="nav-link" data-toggle="dropdown">Hãng xe hơi <i class="fa fa-angle-down float-right mt-1"></i></a>
						<div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0" style="max-height: 300px; overflow-y:auto;">
							<?php
							foreach ($list_companies as $key => $company) {
							?>
								<a href="<?php echo  base_url('danh-muc-hang-xe/' . $company->id . '/' . $company->slug) ?>" class="dropdown-item  text-uppercase"><?php echo $company->name ?></a>
							<?php
							}
							?>
						</div>
					</div>

					<div class="nav-item dropdown">
						<a href="#" class="nav-link" data-toggle="dropdown">Dòng xe <i class="fa fa-angle-down float-right mt-1"></i></a>
						<div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0" style="max-height: 300px; overflow-y:auto;">
							<?php
							foreach ($list_vehicles as $key => $vehicle) {
							?>
								<a href="<?php echo base_url('danh-muc-dong-xe/' . $vehicle->id . '/' . $vehicle->slug) ?>" class="dropdown-item text-uppercase"><?php echo $vehicle->name ?></a>
							<?php
							}
							?>
						</div>
					</div>

					<div class="nav-item dropdown">
						<a href="#" class="nav-link" data-toggle="dropdown">Thành phố <i class="fa fa-angle-down float-right mt-1"></i></a>
						<div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0" style="max-height: 300px; overflow-y:auto;">
							<?php
							foreach ($list_cityes as $key => $city) {
							?>
								<a href="<?php echo base_url('danh-muc-thanh-pho/' . $city->id . '/' . $city->slug) ?>" class="dropdown-item text-uppercase"><?php echo $city->name ?></a>
							<?php
							}
							?>
						</div>
					</div>

				</div>
			</nav>
		</div>
		<div class="col-lg-9">
			<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
				<a href="" class="text-decoration-none d-block d-lg-none">
					<h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">K&T</span>Thế giới xe hơi</h1>
				</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<div class="navbar-nav mr-auto py-0">
						<a href="<?php echo base_url('/') ?>" class="nav-item nav-link active">Trang chủ</a>
						<a href="<?php echo base_url('danh-sach-tat-ca-xe-cu') ?>" class="nav-item nav-link">Mua xe cũ</a>
						<a href="<?php echo base_url('goi-dich-vu') ?>" class="nav-item nav-link">Gói dịch vụ</a>
						<!-- <div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="cart.html" class="dropdown-item">Shopping Cart</a>
								<a href="checkout.html" class="dropdown-item">Checkout</a>
							</div>
						</div> -->
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bản tin</a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="<?php echo base_url('tin-mua-xe') ?>" class="dropdown-item">Tin mua xe</a>
								<a href="<?php echo base_url('tin-tuc') ?>" class="dropdown-item">Tin tức</a>
							</div>
						</div>
						<a href="<?php echo base_url('lien-he') ?>" class="nav-item nav-link">Liên hệ</a>
					</div>
					<!-- secion đăng nhập -->

				</div>
				<div class=" text-right">

					<a href="<?php echo base_url('dang-tin-ban-xe') ?>" class="nav-item nav-link btn btn-success text-white rounded">Đăng tin bán xe</a>

				</div>
			</nav>


			<div id="header-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php
					foreach ($list_banner as $key => $value) {
					?>
						<div class="carousel-item <?php if ($key == 0) {
																				echo 'active';
																			} ?>">
							<img class="img-fluid" width="100%" height="100px" src="<?php echo base_url('uploads/banner/' . $value->image) ?>" alt="Image">

						</div>
					<?php
					}
					?>
				</div>
				<a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
					<div class="btn btn-dark" style="width: 45px; height: 45px;">
						<span class="carousel-control-prev-icon mb-n2"></span>
					</div>
				</a>
				<a class="carousel-control-next" href="#header-carousel" data-slide="next">
					<div class="btn btn-dark" style="width: 45px; height: 45px;">
						<span class="carousel-control-next-icon mb-n2"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<!-- Navbar End -->