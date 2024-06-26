  <!-- Shop Start -->
  <div class="container-fluid pt-5">
  	<div class="row px-xl-5">
  		<?php
			$this->load->view('user/template_user/sidebar');
			?>


  		<!-- Shop Product Start -->
  		<div class="col-lg-9 col-md-12">
  			<div class="row pb-3">
  				<div class="col-12 pb-1">
  					<div class="row">
  						<div class="col-lg-4">
  							<div class="form-group d-flex">
  								<label for="" style=" font-size: 1.2rem; font-weight:600;" class="mt-1">Lọc theo:</label>
  								<select name="" id="select-filter-company" class="form-control shadow rounded w-50 ml-2 select-filter-company" style="border: 1px solid #000;">
  									<option value="0">--chọn--</option>
  									<option value="?kytu=asc">Ký tự từ A-Z</option>
  									<option value="?kytu=desc">Ký tự từ Z-A</option>
  									<option value="?gia=asc">Giá tăng dần</option>
  									<option value="?gia=desc">Giá giảm dần</option>
  								</select>
  							</div>
  						</div>
  						<div class="col-lg-6">
  							<form method="get">

  								<p>
  									<label for="amount">Khoảng lọc giá:</label>
  									<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
  								</p>

  								<div id="slider-range"></div>
  								<input type="hidden" name="from" class="price_from">
  								<input type="hidden" name="to" class="price_to">
  								<div class="row">
  									<div class="col-lg-4"></div>
  									<div class="col-lg-4"></div>
  									<div class="col-lg-4">
  										<input type="submit" value="lọc giá" class="btn btn-warning mt-2 w-75 rounded-pill">
  									</div>
  								</div>

  							</form>
  						</div>
  					</div>
  				</div>
  				<div class="col-lg-12">

  					<h2 class=" mb-5 mt-4 text-center font-weight-bold">Hãng xe: <?php echo $title ?></h2>
  				</div>
  				<?php
					foreach ($allCate_pagination as $key => $company_product) {
					?>
  					<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
  						<div class="card product-item border-0 mb-4">
  							<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
  								<a href="<?php echo base_url('chi-tiet-san-pham/' . $company_product->product_id . '/' . $company_product->product_slug) ?>" class=" text-decoration-none">
  									<img class="img-fluid w-100" src="<?php echo base_url('uploads/product/' . $company_product->product_thumbnail) ?>" alt="">
  								</a>
  							</div>
  							<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
  								<div class="row mb-3">
  									<div class="col-lg-7">
  										<span>Năm sản xuất: <?php echo '<span class=" font-weight-bold">' . $company_product->manufacture_year . '</span>' ?></span>
  									</div>
  									<div class="col-lg-4">
  										<span>Mã: <?php echo '<span class="">' . $company_product->code . '</span>' ?></span>
  									</div>
  								</div>
  								<a href="<?php echo base_url('chi-tiet-san-pham/' . $company_product->product_id . '/' . $company_product->product_slug) ?>" class=" text-decoration-none">
  									<h4 class="text-truncate mb-3 text-uppercase font-weight-bold"><?php echo $company_product->product_name ?></h4>
  								</a>
  								<div class="d-flex justify-content-center">
  									<h6><?php echo number_format($company_product->product_price) . ' vnđ' ?></h6>
  								</div>
  							</div>
  							<div class="card-footer d-flex justify-content-between bg-light border">
  								<div class="row m-2">
  									<div class="col-lg-3">
  										<a href="<?php echo base_url('chi-tiet-san-pham/' . $company_product->product_id . '/' . $company_product->product_slug) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
  									</div>
  									<div class="col-lg-6">
  										<p class="">Khu vực: <?php echo $company_product->tenkhuvuc ?></p>
  									</div>
  									<div class="col-lg-3">
  										<a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-phone text-primary mr-1"></i>Liên hệ</a>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				<?php
					}
					?>

  				<div class="col-12 pb-1">
  					<nav aria-label="Page navigation">
  						<div class="row">
  							<div class="col-lg-5"></div>
  							<div class="col-lg-2">
  								<?php
									echo $links;
									?>
  							</div>
  							<div class="col-lg-5">

  							</div>
  						</div>

  					</nav>
  				</div>
  			</div>
  		</div>
  		<!-- Shop Product End -->
  	</div>
  </div>
  <!-- Shop End -->