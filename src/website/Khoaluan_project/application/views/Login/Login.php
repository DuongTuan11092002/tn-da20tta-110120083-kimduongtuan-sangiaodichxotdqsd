<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="content-wrapper d-flex align-items-center auth">
			<div class="row flex-grow">
				<div class="col-lg-4 mx-auto">
					<div class="auth-form-light text-left p-5">
						<div class="brand-logo">
							<img src="assets_admin/images/logo-dark.svg">
						</div>
						<h4 class="text-black">Xin chào! hãy đăng nhập</h4>
						<h6 class="font-weight-light">Đăng nhập để tiếp tục</h6>
						<?php
						if ($this->session->flashdata('success')) {
						?>
							<div class=" alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
						<?php
						} else if($this->session->flashdata('error')) {
						?>
							<div class=" alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
						<?php
						}
						?>
						<form class="pt-3" action="<?php echo base_url('xu-ly-dang-nhap') ?>" method="POST">
							<div class="form-group">
								<label for="exampleInputAccount1" class="text-black font-weight-bold font-italic">Tên tài khoản:</label>
								<input type="email" name="email" class="form-control form-control-lg" id="exampleInputAccount1" placeholder="example@2021">
								<?php echo  '<span class="text-danger font-weight-bold"> ' . form_error('email') . '</span>' ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1" class="text-black font-weight-bold font-italic">Mật khẩu:</label>
								<input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="*****">
								<?php echo  '<span class="text-danger font-weight-bold"> ' . form_error('password') . '</span>' ?>
							</div>
							<div class="mt-3">
								<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn text-uppercase" type="submit">đăng nhập</button>
							</div>
							<div class="my-2 d-flex justify-content-between align-items-center">
								<div class="form-check">
									<label class="form-check-label text-muted">
								</div>
								<a href="#" class="auth-link text-black">Quên mật khẩu?</a>
							</div>
							<div class="mb-2">
								<button type="button" class="btn btn-block btn-facebook auth-form-btn">
									<i class="mdi mdi-facebook mr-2"></i>Kết nối với facebook </button>
							</div>
							<div class="text-center mt-4 font-weight-light"> Tôi chưa có tài khoản? <a href="<?php echo base_url('dang-ky')?>" class="text-primary">đăng ký ngay</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->