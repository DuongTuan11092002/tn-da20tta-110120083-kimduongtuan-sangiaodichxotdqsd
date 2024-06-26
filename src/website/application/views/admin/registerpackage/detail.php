<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Chi tiết đăng ký của khách hàng <?php echo "<span class=' text-danger font-weight-bold'>" . $ID->fullname . "</span>" ?></h2>
		<div class="container">
			<form action="<?php echo base_url('Handle-detail/' . $ID->id . '/' . $ID->idKH) ?>" method="post">
				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Tên khách hàng:</label>
							<input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo $ID->fullname ?>" readonly>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Tên gói dịch vụ:</label>
							<input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo $ID->tengoi ?>" readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">SĐT khách hàng:</label>
							<input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo $ID->phone ?>" readonly>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Giá gói dịch vụ:</label>
							<input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo number_format($ID->giagoi) . ' VNĐ' ?>" readonly>
						</div>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Địa chỉ khách hàng:</label>
							<input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo $ID->address ?>" readonly>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Thời gian:</label>
							<input type="text" name="" id="" class="form-control form-control-lg" value="<?php echo $ID->TGgoi . ' Tháng' ?>" readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="mb-3 d-flex align-content-center ">
							<div class=" mr-4">
								<label for="" class=" text-black font-weight-bold font-italic">Kích hoạt trạng thái gói:</label>
								<select name="status_premium" id="" class=" form-control form-control-lg rounded-pill " required>
									<?php
									if ($ID->status_premium == 0) {
									?>
										<option value="0" selected>Tắt</option>
										<option value="2">Bật</option>
									<?php
									}
									if ($ID->status_premium == 2) {
									?>
										<option value="0">Tắt</option>
										<option value="2" selected>Bật</option>
									<?php
									}
									?>

								</select>
							</div>

							<div class="">
								<label for="" class=" text-black font-weight-bold font-italic">Vai trò:</label>
								<select name="role" id="" class=" form-control form-control-lg rounded-pill " required>
									<?php
									if ($ID->role == 0) {
									?>
										<option value="0" selected>Khách hàng</option>
										<option value="1">Doanh nghiệp</option>
									<?php
									}
									if ($ID->role == 1) {
									?>
										<option value="0">Khách hàng</option>
										<option value="1" selected>Doanh nghiệp</option>
									<?php
									}
									?>

								</select>
							</div>
						</div>


						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Trạng thái gói đăng ký:</label>
							<select name="status" id="" class=" form-control form-control-lg rounded-pill w-50" required>
								<?php
								if ($ID->status == 1) {
								?>
									<option value="1" selected>Chưa xử lý</option>
									<option value="2">Đã xử lý</option>
									<option value="3">Đã hết hạn</option>
								<?php
								} else if ($ID->status == 2) {
								?>
									<option value="1">Chưa xử lý</option>
									<option value="2" selected>Đã xử lý</option>
									<option value="3">Đã hết hạn</option>
								<?php
								} else if ($ID->status == 3) {
								?>
									<option value="1">Chưa xử lý</option>
									<option value="2">Đã xử lý</option>
									<option value="3" selected>Đã hết hạn</option>
								<?php
								}
								?>

							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Thời hạn bắt đầu:</label>
							<input type="date" name="start_time" id="" class="form-control form-control-lg w-50 rounded-pill" value="<?php echo $ID->start_time ?>">
							<?php echo '<span>' . form_error('start_time') . '</span>' ?>
						</div>
						<div class="mb-3">
							<label for="" class=" text-black font-weight-bold font-italic">Thời hạn hết hạn:</label>
							<input type="date" name="start_end" id="" class="form-control form-control-lg w-50 rounded-pill" value="<?php echo $ID->end_time ?>">
							<?php echo '<span>' . form_error('end_time') . '</span>' ?>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<input type="submit" value="Cập nhật" class="btn btn-success w-50">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>