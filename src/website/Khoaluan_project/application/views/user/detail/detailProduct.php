<!-- Page Header Start -->
<!-- <div class="container-fluid bg-secondary mb-5">
	<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
		<h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>

	</div>
</div> -->
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6" >
			<?php
			if ($this->session->flashdata('success')) {
			?>
				<span class=" alert alert-success" style="z-index: 999;"><?php echo $this->session->flashdata('success') ?></span>
			<?php
			} else if ($this->session->flashdata('error')) {
			?>
				<span class=" alert alert-danger" style="z-index: 999;"><?php echo $this->session->flashdata('error') ?></span>
			<?php
			} 
			?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row px-xl-5">
		<?php
		foreach ($detail_product as $key => $detail_product) {
		?>
			<div class="col-lg-5 pb-5">
				<div id="product-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner border">
						<?php
						foreach ($library_img as $key => $images) {
						?>
							<div class="carousel-item <?php if ($key == 0) {
															echo 'active';
														} ?>">
								<img class="" height="600px" width="100%" src="<?php echo base_url('uploads/product/' . $images->img_car) ?>" alt="Image">
							</div>
						<?php
						}
						?>
					</div>
					<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
						<i class="fa fa-2x fa-angle-left text-success"></i>
					</a>
					<a class="carousel-control-next" href="#product-carousel" data-slide="next">
						<i class="fa fa-2x fa-angle-right text-success"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-7 pb-5">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="font-weight-semi-bold mb-4"><?php echo $detail_product->product_name ?></h3>

					</div>
					<div class="col-lg-6 d-flex">
						<h6 class="m-2">Bản tin đăng:</h6>
						<span class="m-2 font-weight-bold"><?php echo $detail_product->created_at ?></span>
					</div>
				</div>
				<!-- feedback star -->
				<!-- <div class="d-flex mb-3">
				<div class="text-primary mr-2">
					<small class="fas fa-star"></small>
					<small class="fas fa-star"></small>
					<small class="fas fa-star"></small>
					<small class="fas fa-star-half-alt"></small>
					<small class="far fa-star"></small>
				</div>
				<small class="pt-1">(50 Reviews)</small>
			</div> -->
				<!-- feedback end -->
				<h3 class="font-weight-semi-bold mb-4"><?php echo number_format($detail_product->product_price) . ' VNĐ' ?></h3>
				<div class="row">
					<div class="col-lg-6">
						<div class="d-flex mb-3">
							<p class="text-dark font-weight-medium mb-0 mr-3">Hãng xe:</p>
							<span class=" font-weight-bold text-uppercase"><?php echo $detail_product->tenhangxe ?></span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="d-flex mb-4">
							<p class="text-dark font-weight-medium mb-0 mr-3">Năm sản xuất:</p>
							<span class=" font-weight-bold text-uppercase"><?php echo $detail_product->manufacture_year ?></span>
						</div>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="d-flex mb-4">
							<p class="text-dark font-weight-medium mb-0 mr-3">Loại dòng xe:</p>
							<span class=" font-weight-bold text-uppercase"><?php echo $detail_product->tendongxe ?></span>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="d-flex mb-4">
							<p class="text-dark font-weight-medium mb-0 mr-3">Loại hợp số:</p>
							<span class=" font-weight-bold text-uppercase">
								<?php
								if ($detail_product->type_gearbox == 1) {
									echo "<span class=' font-weight-bold'>Hợp số tự động</span>";
								} else 	if ($detail_product->type_gearbox == 2) {
									echo "<span class=' font-weight-bold'>Hợp số sàn</span>";
								} else 	if ($detail_product->type_gearbox == 3) {
									echo "<span class=' font-weight-bold'>Hợp số CVT</span>";
								} else 	if ($detail_product->type_gearbox == 4) {
									echo "<span class=' font-weight-bold'>Hợp số DCT</span>";
								}
								?>
							</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 d-flex">
						<i class=" fa fa-user mr-2"></i>
						<?php
						if ($detail_product->status_premium == 2) {
						?>
							<h6>Người đăng bán: <?php echo "<span class=' font-weight-bold'>" . $detail_product->name_business . "</span>" ?></h6>
						<?php
						} else {
						?>
							<h6>Người đăng bán: <?php echo "<span class=' font-weight-bold'>" . $detail_product->fullname . "</span>" ?></h6>
						<?php
						}
						?>
					</div>
					<div class="col-lg-6">
						<h6>Địa chỉ: <?php echo "<span class=' font-weight-bold'>" . $detail_product->address . "</span>" ?></h6>

					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 contact-section text-left mt-3">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-dark btn-lg mr-2" data-toggle="modal" data-target="#contactModel">
							Liên hệ
						</button>

						<!-- Modal -->
						<div class="modal fade" id="contactModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?php echo base_url('thong-tin-lien-he-san-pham') ?>" method="post">
										<div class="modal-header">
											<h5 class="modal-title text-uppercase font-weight-bold" style="letter-spacing: 5px;" id="exampleModalLabel">Thông tin liên hệ</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="mb-3 form-group">
												<label for="">Họ và Tên:</label>
												<input type="text" name="fullname" id="" class=" form-control shadow-lg" required>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3 form-group">
														<label for="">Số điện thoại:</label>
														<input type="text" name="phone" id="" class=" form-control shadow-lg" required>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3 form-group">
														<label for="">Email:</label>
														<input type="email" name="email" id="" class=" form-control shadow-lg" required>
													</div>
												</div>
											</div>
											<div class="mb-3 form-group">
												<label for="">Nội dung:</label>
												<textarea name="content" id="" cols="30" rows="4" class=" form-control shadow-lg" required></textarea>
											</div>

											<input type="hidden" name="product_id" value="<?php echo $detail_product->product_id ?>">
											<input type="hidden" name="account_id" value="<?php echo $detail_product->account_id ?>">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Rời khỏi</button>
											<input type="submit" class="btn btn-success" value="Gửi">
										</div>
									</form>
								</div>
							</div>
						</div>

						<a href="mailto:<?php echo $detail_product->email ?>" class="btn btn-info btn-lg mr-2"><i class="fas fa-envelope mr-1"></i> Email</a>
						<a href="tel:<?php echo $detail_product->phone ?>" class="btn btn-success btn-lg mr-2"><i class="fas fa-phone mr-1"></i> Điện thoại</a>

					</div>


				</div>
			</div>
	</div>
	<div class="row px-xl-5">
		<div class="col">
			<div class="nav nav-tabs justify-content-left border-secondary mb-4">
				<a class="nav-item nav-link active font-weight-bold text-uppercase" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
				<a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Đánh giá</a>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="tab-pane-1">
					<h4 class="mb-3">Thông tin mô tả</h4>
					<p><?php echo $detail_product->product_content ?></p>
				</div>

				<div class="tab-pane fade" id="tab-pane-2">
					<div class="row">
						<div class="col-md-6">
							<h4 class="mb-4">Đánh giá về sản phẩm </h4>
							<div class="overflow-auto" style="max-height: 400px;">
								<?php
								foreach ($comment as $key => $value) {
								?>
									<div class="media mb-4">
										<img src="<?php echo base_url('assets_user/img/private-user.png') ?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px; height:55px;">
										<div class="media-body">
											<h6><?php echo $value->fullname ?><small> - <i><?php echo $value->date ?></i></small></h6>
											<div class="text-primary mb-2">
												<?php
												$star = $value->star; // Assuming the 'star' field is available in the $value object
												for ($i = 1; $i <= 5; $i++) {
													if ($i <= $star) {
														echo '<i class="fas fa-star" style="color:yellow; text-shadow: 0 0 5px black;"></i>';
													} elseif ($i == ceil($star) && $star - floor($star) > 0) {
														echo '<i class="fas fa-star-half-alt"></i>';
													} else {
														echo '<i class="far fa-star"></i>';
													}
												}
												?>
											</div>
											<p><?php echo $value->message ?></p>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
						<?php
						if ($this->session->userdata('account')) {
						?>
							<div class="col-md-6">
								<h4 class="mb-4">Đánh giá của bạn</h4>
								<div id="comment-alert"></div>
								<div class="d-flex my-3">
									<input type="hidden" class="rate_value">
									<p class="counterW">Đánh giá sao: <span class="Rate">3</span>/<span>5</span></p>
									<ul class="ratingW">
										<li class="on"><a href="javascript:void(0);">
												<div class="star"></div>
											</a></li>
										<li class="on"><a href="javascript:void(0);">
												<div class="star"></div>
											</a></li>
										<li class="on"><a href="javascript:void(0);">
												<div class="star"></div>
											</a></li>
										<li><a href="javascript:void(0);">
												<div class="star"></div>
											</a></li>
										<li><a href="javascript:void(0);">
												<div class="star"></div>
											</a></li>
									</ul>

								</div>
								<form>
									<div class="form-group">
										<label for="message">nhận xét: *</label>
										<textarea id="message" cols="30" rows="5" class="form-control shadow-lg message_comment" style="border:1px solid #888; border-radius:10px;"></textarea>
									</div>
									<div class="form-group">
										<label for="name">Họ và Tên: *</label>
										<input type="text" class="form-control shadow-lg name_comment" style="border:1px solid #888; border-radius:10px;" id="name" value="<?php echo $this->session->userdata('account')['fullname'] ?>" readonly>
									</div>
									<div class="form-group">
										<label for="email">Email: *</label>
										<input type="email" class="form-control shadow-lg email_comment" style="border:1px solid #888; border-radius:10px;" id="email" value="<?php echo $this->session->userdata('account')['email'] ?>" readonly>
									</div>
									<input type="hidden" class="product_id" value="<?php echo $detail_product->product_id ?>">
									<div class="form-group mb-0">
										<input type="button" value="Gửi đánh giá" class="btn btn-primary px-3 write-comment">
									</div>
								</form>
							</div>
						<?php
						} else {
						?>
							<a class=" text-center" href="<?php echo base_url('dang-nhap') ?>">Vui lòng đăng nhập để nhận xét</a>
						<?php
						}
						?>
					</div>
				</div>


			</div>
		</div>
	</div>
<?php
		}
?>
</div>
<!-- Shop Detail End -->



<!-- Products Start -->
<div class="container-fluid py-5">
	<!-- <div class="text-center mb-4">
		<h2 class="section-title px-5"><span class="px-2">Sản phẩm cùng hãng</span></h2>
	</div> -->

	<div class="row px-xl-5">
		<div class="col">
			<div class="nav nav-tabs justify-content-center border-secondary mb-4">
				<a class="nav-item nav-link font-weight-bold " data-toggle="tab" href="#tab-pane-relate-2">Sản phẩm từ <?php echo $detail_product->name_business ?></a>
				<a class="nav-item nav-link  font-weight-bold active" data-toggle="tab" href="#tab-pane-relate-1">Sản phẩm cùng hãng xe</a>
			</div>
			<div class="tab-content">
				<!-- RELATE COMPANY START -->
				<div class="tab-pane fade show active" id="tab-pane-relate-1">
					<div class="owl-carousel related-carousel">
						<?php
						foreach ($product_relate_company as $key => $product_relate_company) {
						?>
							<div class="card product-item border-0">
								<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
									<a href="<?php echo base_url('chi-tiet-san-pham/' . $product_relate_company->product_id . '/' . $product_relate_company->product_slug) ?>" class=" text-decoration-none">
										<img class="img-fluid w-100" src="<?php echo base_url('uploads/product/' . $product_relate_company->product_thumbnail) ?>" alt="">
									</a>
								</div>
								<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
									<a href="<?php echo base_url('chi-tiet-san-pham/' . $product_relate_company->product_id . '/' . $product_relate_company->product_slug) ?>" class=" text-decoration-none">
										<h6 class="text-truncate mb-3"><?php echo $product_relate_company->product_name ?></h6>
									</a>
									<div class="d-flex justify-content-center">
										<h6><?php echo number_format($product_relate_company->product_price) . ' vnđ' ?></h6>
									</div>
								</div>
								<div class="card-footer d-flex justify-content-between bg-light border">
									<div class="row m-3">
										<div class="col-lg-4">
											<a href="<?php echo base_url('chi-tiet-san-pham/' . $product_relate_company->product_id . '/' . $product_relate_company->product_slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
										</div>
										<div class="col-lg-5">
											<p class="">Khu vực: <?php echo $product_relate_company->tenkhuvuc ?></p>
										</div>
										<div class="col-lg-3">
											<a href="tel:<?php echo $product_relate_company->phone ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-phone text-primary mr-1"></i>Liên hệ</a>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<!-- RELATE COMPANY END -->

				<!-- RELATE BUSINESS START -->
				<div class="tab-pane fade" id="tab-pane-relate-2">
					<div class="owl-carousel related-carousel">
						<?php
						foreach ($product_relate_business as $key => $product_relate_business) {
						?>
							<div class="card product-item border-0">
								<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
									<a href="<?php echo base_url('chi-tiet-san-pham/' . $product_relate_business->product_id . '/' . $product_relate_business->product_slug) ?>" class=" text-decoration-none">
										<img class="img-fluid w-100" src="<?php echo base_url('uploads/product/' . $product_relate_business->product_thumbnail) ?>" alt="">
									</a>
								</div>
								<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
									<a href="<?php echo base_url('chi-tiet-san-pham/' . $product_relate_business->product_id . '/' . $product_relate_business->product_slug) ?>" class=" text-decoration-none">
										<h6 class="text-truncate mb-3"><?php echo $product_relate_business->product_name ?></h6>
									</a>
									<div class="d-flex justify-content-center">
										<h6><?php echo number_format($product_relate_business->product_price) . ' vnđ' ?></h6>
									</div>
								</div>
								<div class="card-footer d-flex justify-content-between bg-light border">
									<div class="row m-3">
										<div class="col-lg-4">
											<a href="<?php echo base_url('chi-tiet-san-pham/' . $product_relate_business->product_id . '/' . $product_relate_business->product_slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
										</div>
										<div class="col-lg-5">
											<p class="">Khu vực: <?php echo $product_relate_business->tenkhuvuc ?></p>
										</div>
										<div class="col-lg-3">
											<a href="tel:<?php echo $product_relate_business->phone ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-phone text-primary mr-1"></i>Liên hệ</a>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<!-- RELATE BUSINESS END -->
			</div>
		</div>
	</div>


	<div class="row px-xl-5">
		<div class="col-lg-12">

		</div>
	</div>
</div>
<!-- Products End -->