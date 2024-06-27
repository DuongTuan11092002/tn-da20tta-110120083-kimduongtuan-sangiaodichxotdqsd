<!-- Featured Start -->
<div class="container-fluid pt-5">
	<div class="row px-xl-5 pb-3">
		<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
			<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
				<h1 class="fa fa-check text-success m-0 mr-3"></h1>
				<h5 class="font-weight-semi-bold m-0">Chất lượng uy tín</h5>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
			<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
				<h1 class="fa fa-shipping-fast text-success m-0 mr-2"></h1>
				<h5 class="font-weight-semi-bold m-0">Chính sách & quyền lợi</h5>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
			<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
				<h1 class="fas fa-exchange-alt text-success m-0 mr-3"></h1>
				<h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
			<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
				<h1 class="fa fa-phone-volume text-success m-0 mr-3"></h1>
				<h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
			</div>
		</div>
	</div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
	<div class="row px-xl-5 pb-3 Slider-brand-product">
		<?php
		foreach ($list_business as $key => $business) {
		?>
			<div class="col-lg-12 col-md-6 m-1 shadow rounded">
				<div class="cat-item d-flex flex-column border">
					<a href="<?php echo base_url('danh-muc-san-pham-doanh-nghiep/' . $business->business_id ) ?>" class=" position-relative overflow-hidden" width="">
						<img class="" src="<?php echo base_url('uploads/profile/' . $business->thumbnail_business) ?>" alt="" width="30%" height="300px">
					</a>
					<h5 class="font-weight-semi-bold m-0"><?php echo $business->tendoanhnghiep ?></h5>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- Categories End -->


<!-- Offer Start -->
<div class="container-fluid  pt-5">
	<div class="row ">
		<?php
		foreach ($hot_banner as $key => $value) {
		?>
			<div class="col-lg-6">
					<img src="<?php echo base_url('uploads/banner/'. $value->image) ?>" alt="" width="100%" height="500px" class="rounded">
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
	<div class="text-center mb-4">
		<h2 class="section-title px-5 text-uppercase"><span class="px-2">Deal hấp dẫn</span></h2>
	</div>
	<div class="row px-xl-5 pb-3 Slider-main-product">
		<?php
		foreach ($main_product as $key => $mainProduct) {
		?>
			<div class="col-md-12 col-sm-12 pb-1">
				<div class="card product-item border-0 mb-4">
					<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
						<a href="<?php echo base_url('chi-tiet-san-pham/' . $mainProduct->product_id . '/' . $mainProduct->product_slug) ?>" class=" text-decoration-none">
							<img class="img-fluid w-100" src="<?php echo base_url('uploads/product/' . $mainProduct->product_thumbnail) ?>" alt="">
						</a>
					</div>
					<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
						<div class="row mb-3">
							<div class="col-lg-7">
								<span>Năm sản xuất: <?php echo '<span class=" font-weight-bold">' . $mainProduct->manufacture_year . '</span>' ?></span>
							</div>
							<div class="col-lg-4">
								<span>Mã: <?php echo '<span class="">' . $mainProduct->code . '</span>' ?></span>
							</div>
						</div>
						<a href="<?php echo base_url('chi-tiet-san-pham/' . $mainProduct->product_id . '/' . $mainProduct->product_slug) ?>" class=" text-decoration-none">
							<h4 class="text-truncate mb-3 text-uppercase font-weight-bold"><?php echo $mainProduct->product_name ?></h4>
						</a>
						<div class="d-flex justify-content-center">

							<h6><?php echo number_format($mainProduct->product_price) . ' vnđ' ?></h6>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between bg-light border">
						<div class="row m-3">
							<div class="col-lg-4">
								<a href="<?php echo base_url('chi-tiet-san-pham/' . $mainProduct->product_id . '/' . $mainProduct->product_slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
							</div>
							<div class="col-lg-5">
								<p class="">Khu vực: <?php echo $mainProduct->tenkhuvuc ?></p>
							</div>
							<div class="col-lg-3">
								<a href="tel:<?php echo $mainProduct->phone ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-phone text-primary mr-1"></i>Liên hệ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!-- Products End -->




<!-- Products Start -->
<div class="container-fluid pt-5">
	<div class="text-center mb-4">
		<h2 class="section-title px-5"><span class="px-2">Mua bán xe ô tô</span></h2>
	</div>
	<div class="row px-xl-5 pb-3">
		<?php
		foreach ($allproduct_pagination as $key => $product) {
		?>
			<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
				<div class="card product-item border-0 mb-4">
					<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
						<a href="<?php echo base_url('chi-tiet-san-pham/' . $product->product_id . '/' . $product->product_slug) ?>" class=" text-decoration-none">
							<img class="img-fluid w-100" src="<?php echo base_url('uploads/product/' . $product->product_thumbnail) ?>" alt="">
						</a>
					</div>
					<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
						<div class="row mb-3">
							<div class="col-lg-7">
								<span>Năm sản xuất: <?php echo '<span class=" font-weight-bold">' . $product->manufacture_year . '</span>' ?></span>
							</div>
							<div class="col-lg-4">
								<span>Mã: <?php echo '<span class="">' . $product->code . '</span>' ?></span>
							</div>
						</div>
						<a href="<?php echo base_url('chi-tiet-san-pham/' . $product->product_id . '/' . $product->product_slug) ?>" class=" text-decoration-none">
							<h4 class="text-truncate mb-3 text-uppercase font-weight-bold"><?php echo $product->product_name ?></h4>
						</a>
						<div class="d-flex justify-content-center">
							<h6><?php echo number_format($product->product_price) . ' vnđ' ?></h6>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between bg-light border">
						<div class="row m-3">
							<div class="col-lg-4">
								<a href="<?php echo base_url('chi-tiet-san-pham/' . $product->product_id . '/' . $product->product_slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
							</div>
							<div class="col-lg-5">
								<p class="">Khu vực: <?php echo $product->tenkhuvuc ?></p>
							</div>
							<div class="col-lg-3">
								<a href="tel:<?php echo $product->phone ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-phone text-primary mr-1"></i>Liên hệ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>


	</div>
	<div class="row">
		<div class="col-lg-6"></div>
		<div class="col-lg-2">
			<?php
			echo $links;
			?>
		</div>
		<div class="col-lg-4">
		</div>
	</div>
</div>
<!-- Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5 mt-5">
	<h3 class=" text-uppercase text-center font-weight-bold">Đối tác</h3>
	<div class="row px-xl-5">
		<div class="col">
			<div class="owl-carousel vendor-carousel">
				
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-2.jpg" alt="">
				</div>
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-3.jpg" alt="">
				</div>
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-4.jpg" alt="">
				</div>
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-5.jpg" alt="">
				</div>
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-6.jpg" alt="">
				</div>
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-7.jpg" alt="">
				</div>
				<div class="vendor-item border p-4">
					<img src="assets_user/img/vendor-8.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Vendor End -->
