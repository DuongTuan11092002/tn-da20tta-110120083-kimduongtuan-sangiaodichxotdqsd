<div class="container-scroller">
	<div class="container-fluid page-body-wrapper full-page-wrapper">
		<div class="content-wrapper d-flex align-items-center auth">
			<div class="row flex-grow">
				<div class="col-lg-4 mx-auto">
					<div class="auth-form-light text-left p-5">
						<div class="brand-logo">
							<img src="<?php echo base_url('assets_admin/images/logo-dark.svg') ?>">
						</div>
						<h4 class=" text-black font-weight-bold">Đăng ký tài khoản?</h4>
						<h6 class="font-weight-light">Đăng ký tài khoản dễ dàng, chỉ cần vài bước!</h6>
						<form class="pt-3" action="<?php echo base_url('xu-ly-dang-ky') ?>" method="POST">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3 form-group">
										<label for="" class="text-black font-italic font-weight-bold">Họ và Tên:</label>
										<input type="text" name="fullname" id="" class=" form-control form-control-lg">
										<?php echo "<span class=' text-danger font-italic font-weight-bold'>". form_error('fullname') ."</span>" ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3 form-group">
										<label for="" class="text-black font-italic font-weight-bold">Số điện thoại:</label>
										<input type="text" name="phone" id="" class=" form-control form-control-lg">
										<?php echo "<span class=' text-danger font-italic font-weight-bold'>". form_error('phone') ."</span>" ?>
									</div>
								</div>
							</div>

							<div class="mb-3 form-group">
								<label for="" class="text-black font-italic font-weight-bold">địa chỉ:</label>
								<textarea name="address" id="" cols="30" rows="3" class=" form-control form-control-lg"></textarea>
								<?php echo "<span class=' text-danger font-italic font-weight-bold'>". form_error('address') ."</span>" ?>
							</div>

							<div class="mb-3 form-group">
								<label for="" class="text-black font-italic font-weight-bold">Email:</label>
								<input type="email" name="email" id="" class=" form-control form-control-lg">
								<?php echo "<span class=' text-danger font-italic font-weight-bold'>". form_error('email') ."</span>" ?>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3 form-group">
										<label for="" class="text-black font-italic font-weight-bold">Mật khẩu:</label>
										<input type="password" name="password" id="password" class=" form-control form-control-lg">
										<?php echo "<span class=' text-danger font-italic font-weight-bold'>". form_error('password') ."</span>" ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3 form-group">
										<label for="" class="text-black font-italic font-weight-bold">Nhập lại mật khẩu:</label>
										<input type="password" name="confirmPassword" id="confirmPassword" class=" form-control form-control-lg">
										<?php echo "<span class=' text-danger font-italic font-weight-bold'>". form_error('confirmPassword') ."</span>" ?>
									</div>
								</div>
							</div>
							<div class="mb-3 form-group">
								<input type="submit" value="Đăng ký" class="btn btn-block btn-success text-uppercase font-weight-bold">
							</div>


						</form>
						<div class="text-center mt-4 font-weight-light"> Tôi đã có tài khoản? <a href="<?php echo base_url('dang-nhap') ?>" class="text-primary">Đăng nhập</a>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>