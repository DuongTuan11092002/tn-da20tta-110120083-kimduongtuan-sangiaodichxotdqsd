<!-- Topbar Start -->
<div class="container-fluid">
	<div class="row bg-secondary py-2 px-xl-5">
		<div class="col-lg-6 d-none d-lg-block">
			<div class="d-inline-flex align-items-center">
				<a class="text-dark" href="">FAQs</a>
				<span class="text-muted px-2">|</span>
				<a class="text-dark" href="">Trợ giúp</a>
				<span class="text-muted px-2">|</span>
				<a class="text-dark" href="">Hỗ trợ</a>
			</div>
		</div>
		<div class="col-lg-6 text-center text-lg-right">
			<div class="d-inline-flex align-items-center">
				<a class="text-dark px-2" href="">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a class="text-dark px-2" href="">
					<i class="fab fa-twitter"></i>
				</a>
				<a class="text-dark px-2" href="">
					<i class="fab fa-linkedin-in"></i>
				</a>
				<a class="text-dark px-2" href="">
					<i class="fab fa-instagram"></i>
				</a>
				<a class="text-dark pl-2" href="">
					<i class="fab fa-youtube"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center py-3 px-xl-5">
		<div class="col-lg-3 d-none d-lg-block">
			<a href="<?php echo base_url('/') ?>" class="text-decoration-none">
				<h3 class="m-0 display-5 font-weight-semi-bold"><span class="text-danger font-weight-bold border px-3 mr-1">K&T</span>thế giới xe hơi</h3>
			</a>
		</div>
		<div class="col-lg-6 col-6 text-left">
			<form action="<?php echo base_url('tim-kiem-thong-tin') ?>" method="get">
				<div class="input-group">
					<input type="search" class="form-control" name="keyword" placeholder="Tìm kiếm thông tin">
					<div class="input-group-append">
						<span class="input-group-text bg-transparent text-primary">
							<i class="fa fa-search"></i>
						</span>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-3 col-6 text-right">


			<?php
			if ($this->session->userdata('account')) {
			?>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $this->session->userdata('account')['fullname'] ?>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<?php
						if ($this->session->userdata('account')['role'] == 1) {
						?>
							<a class="dropdown-item" href="<?php echo base_url('quan-tri-doanh-nghiep') ?>">Quản lý</a>
						<?php
						}
						?>
						<a class="dropdown-item" href="<?php echo base_url('ho-so-cua-toi/' . $this->session->userdata('account')['id']) ?>">Hồ sơ của tôi</a>
						<a class="dropdown-item" href="<?php echo base_url('dang-xuat') ?>">Đăng xuất</a>
					</div>
				</div>
			<?php
			} else {
			?>
				<a href="<?php echo base_url('dang-nhap') ?>" class="btn btn-warning rounded ml-3">Đăng nhập</a>
			<?php
			}
			?>
			<!-- đăng tin mua bán xe hơi -->

		</div>


	</div>
</div>
<!-- Topbar End -->