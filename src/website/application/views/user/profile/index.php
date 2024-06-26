<div class="container">
	<div class="row flex-lg-nowrap">
		<div class="col">
			<div class="row">
				<div class="col mb-3">
					<form class="form" action="<?php echo base_url('thong-tin-ho-so-chinh-sua/' . $getID->id) ?>" novalidate="" method="POST" enctype="multipart/form-data">
						<div class="card">
							<div class="card-body">
								<div class="e-profile">
									<div class="row">
										<div class="col-12 col-sm-auto mb-3">
											<div class="mx-auto" style="width: 140px;">
												<div class="d-flex justify-content-center align-items-center rounded-pill" style="height: 140px; background-color: rgb(233, 236, 239);">
													<img src="<?php echo base_url('uploads/profile/' . $getID->thumbnail) ?>" alt="" srcset="" width="100%" class="">
												</div>
											</div>
										</div>
										<div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
											<div class="text-center text-sm-left mb-2 mb-sm-0">
												<?php
												if ($getID->role == 1 || $getID->role == 2) {
												?>
													<h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $getID->name_business ?></h4>
												<?php
												} else {
												?>
													<h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $getID->fullname ?></h4>
												<?php
												}
												?>
												<div class="mt-2">
													<input type="file" name="thumbnail" id="file_upload" class="d-none">
													<label for="file_upload" class="btn btn-primary"><i class="fa fa-fw fa-camera"></i> Tải ảnh lên</label>
												</div>
											</div>
											<div class="text-center text-sm-right">
												<span class="badge badge-secondary">ngày đăng ký</span>
												<div class="text-muted"><small><?php echo $getID->created_at ?></small></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-2"></div>
										<div class="col-lg-8">
											<?php
											if ($this->session->userdata('success')) {
											?>
												<span class=" alert alert-success"><?php echo $this->session->userdata('success') ?></span>
											<?php
											}
											?>

										</div>
										<div class="col-lg-2"></div>
									</div>
									<ul class="nav nav-tabs">
										<li class="nav-item"><a href="" class="active nav-link">Chỉnh sửa</a></li>
									</ul>
									<div class="tab-content pt-3">
										<div class="tab-pane active">
											<div class="row">
												<div class="col">
													<div class="row">
														<div class="col">
															<div class="form-group">
																<label class=" font-italic font-weight-bold" style="color: black;">Họ và Tên</label>
																<input class="form-control" type="text" name="fullname" placeholder="" value="<?php echo $getID->fullname ?>">
															</div>
														</div>
														<div class="col">
															<div class="form-group">
																<label class=" font-italic font-weight-bold" style="color: black;">Số điện thoại</label>
																<input class="form-control" type="text" name="phone" placeholder="johnny.s" value="<?php echo $getID->phone ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col">
															<div class="form-group">
																<label class=" font-italic font-weight-bold" style="color: black;">Email</label>
																<input class="form-control" name="email" type="text" value="<?php echo $getID->email ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-4 mb-3">
															<div class="form-group">
																<label class=" font-italic font-weight-bold" style="color: black;">Địa chỉ</label>
																<input class="form-control" type="text" name="address" placeholder="johnny.s" value="<?php echo $getID->address ?>">
															</div>
														</div>
														<?php
														if ($this->session->userdata('account')['role'] == 1) {
														?>
															<div class="col-lg-4 mb-3">
																<div class="form-group">
																	<label class=" font-italic font-weight-bold" style="color: black;">Tên doanh nghiệp</label>
																	<input class="form-control" type="text" name="name_business" placeholder="johnny.s" value="<?php echo $getID->name_business ?>">
																</div>
															</div>
														<?php
														}
														?>
														<div class="col-lg-4 mb-3">
															<label for="" class=" font-italic font-weight-bold" style="color: black;">Trạng thái</label>
															<?php
															if ($getID->status_premium == 2) {
															?>
																<span class="btn btn-block btn-success rounded font-weight-bold">Doanh nghiệp</span>
															<?php
															} else if ($getID->status_premium == 0) {
															?>
															<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
											<!-- PHẦN HIỂN THỊ GÓI ĐĂNG KÝ DỊCH VỤ  -->
											<div class="row">
												<div class="col-lg-12">
													<table class="table shadow rounded">
														<thead class="bg-dark text-white">
															<tr>
																<th scope="col">Stt</th>
																<th scope="col">Tên gói đăng ký</th>
																<th scope="col">ngày bắt đầu</th>
																<th scope="col">ngày hết hạn</th>
																<th scope="col">Trạng thái</th>
															</tr>
														</thead>
														<tbody>
															<?Php
															$i = 0;
															foreach ($packages as $key => $value) {
																$i++;
															?>
																<tr>
																	<th scope="row"><?php echo $i ?></th>
																	<td><?php echo $value->tenPA ?></td>
																	<td>
																		<input type="date" name="" id="" readonly class="" value="<?php echo $value->start_time ?>">
																	</td>
																	<td>
																		<input type="date" name="" id="" readonly class="" value="<?php echo $value->end_time ?>">
																	</td>
																	<td>
																		<?php
																		if ($value->status == 1) {
																			echo "<div style='font-weight:700;' class=' btn btn-danger'>Chưa kích hoạt</div>";
																		} else if ($value->status == 2) {
																			echo "<div style='font-weight:700;' class=' btn btn-success'>Kích hoạt thành công</div>";
																		} else if ($value->status == 3) {
																			echo "<div style='font-weight:700;' class=' btn btn-danger'>Hết hạn</div>";
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


											<div class="row">
												<div class="col-lg-4"></div>
												<div class="col-lg-4"></div>
												<div class="col-lg-4">
													<button class="btn btn-success btn-block rounded-pill" type="submit">Thay đổi</button>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="col-12 col-md-3 mb-3">
					<div class="card mb-3">
						<div class="card-body">
							<div class="px-xl-3">
								<a href="<?php echo base_url('bai-dang-cua-toi') ?>" class="btn btn-block btn-warning">
									<i class="fa fa-sign-out"></i>
									<span>Đăng tin bán xe</span>
								</a>
								<a href="<?php echo base_url('bai-dang-tin-mua-xe') ?>" class="btn btn-block btn-primary">
									<i class="fa fa-sign-out"></i>
									<span>Đăng tin mua xe</span>
								</a>
								<a href="<?php echo base_url('danh-sach-lien-he') ?>" class="btn btn-block btn-secondary">
									<i class="fa fa-sign-out"></i>
									<span>Danh sách liên hệ</span>
								</a>
								<a href="<?php echo base_url('dang-xuat') ?>" class="btn btn-block btn-secondary">
									<i class="fa fa-sign-out"></i>
									<span>Đăng xuất</span>
								</a>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h6 class="card-title font-weight-bold">Support</h6>
							<p class="card-text">Hỗ trợ khách hàng 24/7</p>
							<button type="button" class="btn btn-primary">Liên hệ chúng tôi</button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>