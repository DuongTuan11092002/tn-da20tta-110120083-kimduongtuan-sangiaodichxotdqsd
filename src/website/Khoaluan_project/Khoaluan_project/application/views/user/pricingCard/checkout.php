 <!-- Checkout Start -->
 <div class="container-fluid pt-5">
 	<form action="<?php echo base_url('xac-nhan-thanh-toan') ?>" method="post">
 		<div class="row px-xl-5">
 			<div class="col-lg-8">
 				<div class="mb-4">
 					<h4 class="font-weight-semi-bold mb-4">Thông tin mua gói dịch vụ</h4>
 					<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('account')['id'] ?>">
 					<div class="row">
 						<div class="col-md-6 form-group">
 							<label>Họ và Tên:</label>
 							<input class="form-control" type="text" value="<?php echo $this->session->userdata('account')['fullname'] ?>" readonly>
 						</div>

 						<div class="col-md-6 form-group">
 							<label>Số điện thoại:</label>
 							<input class="form-control" type="text" value="<?php echo $this->session->userdata('account')['phone'] ?>" readonly>
 						</div>

 					</div>

 					<div class="form-group">
 						<label>Email:</label>
 						<input class="form-control" type="text" value="<?php echo $this->session->userdata('account')['email'] ?>" readonly>
 					</div>

 					<div class="form-group">
 						<label>Địa chỉ:</label>
 						<input class="form-control" type="text" value="<?php echo $this->session->userdata('account')['address'] ?>" readonly>
 					</div>

 				</div>

 			</div>
 			<div class="col-lg-4">
 				<div class="card border-secondary mb-5">
 					<div class="card-header bg-secondary border-0">
 						<h4 class="font-weight-semi-bold m-0">Hóa đơn</h4>
 					</div>
 					<div class="card-body">
 						<h5 class="font-weight-medium mb-3">Gói dịch vụ</h5>
 						<?php
							foreach ($package_id as $key => $package) {
							?>
							<input type="hidden" name="package_id" value="<?php echo $package->id ?>">
 							<div class="d-flex justify-content-between">
 								<p><?php echo $package->name ?></p>
 								<p><?php echo number_format($package->price) . ' vnđ' ?></p>

 							</div>
 							<hr class="mt-0">
 							<div class="d-flex justify-content-between mb-3 pt-1">
 								<h6 class="font-weight-medium">Thời hạn:</h6>
 								<h6 class="font-weight-medium"><?php echo $package->date . ' Tháng' ?></h6>
 							</div>

 					</div>
 					<div class="card-footer border-secondary bg-transparent">
 						<div class="d-flex justify-content-between mt-2">
 							<h5 class="font-weight-bold">Tổng</h5>
 							<h5 class="font-weight-bold"><?php echo number_format($package->price) . ' vnđ' ?></h5>
 						</div>
 					</div>
 				<?php
							}
					?>
 				</div>
				<div class="">
					<input type="submit" class="btn btn-block btn-success" value="Xác nhận">
				</div>
 			</div>
 		</div>
 	</form>
 </div>
 <!-- Checkout End -->