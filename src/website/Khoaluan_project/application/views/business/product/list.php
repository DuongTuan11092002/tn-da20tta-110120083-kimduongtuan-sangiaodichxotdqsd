<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Quản lý sản phẩm doanh nghiệp</h2>
		<div class="row">
			<div class="col-lg-3">
				<a href="<?php echo base_url('them-san-pham-doanh-nghiep') ?>" class="btn btn-block btn-success  w-75 m-3" style="letter-spacing: 3px;">Tạo sản phẩm mới</a>
			</div>
			<div class="col-lg-4"></div>
			<div class="col-lg-4"></div>
		</div>

		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-6">
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<span class=" alert alert-danger font-weight-bold"><?php echo $this->session->flashdata('success') ?></span>
				<?php
				}
				?>
			</div>
			<div class="col-lg-4"></div>
		</div>

		<div class=" table table-responsive-lg">
			<table class="table shadow" id="business-product-table">
				<thead>
					<tr>
						<th scope="col">stt</th>
						<th scope="col">Mã sản phẩm</th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Giá</th>
						<th scope="col">Ngày tạo</th>
						<th scope="col">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list_product_business as $key => $product_business) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $product_business->code ?></td>
							<td>
								<img src="/uploads/product/<?php echo $product_business->product_thumbnail ?>" alt="" srcset="">
							</td>
							<td><?php echo $product_business->product_name ?></td>
							<td><?php echo number_format($product_business->product_price) . 'đ' ?></td>
							<td><?php echo $product_business->created_at ?></td>
							<td>
								<a href="<?php echo base_url('sua-san-pham-doanh-nghiep/' . $product_business->product_id) ?>" class="btn btn-warning text-black mr-2">Sửa</a>
								<a href="#" class="btn btn-danger text-white mr-2" onclick="return confirmAndRedirect()">Xóa</a>

								<script>
									function confirmAndRedirect() {
										if (confirm('Bạn có chắc chắn muốn xóa không?')) {
											// Thay đổi URL cơ sở dưới đây
											var baseUrl = '<?php echo base_url('xoa-san-pham-doanh-nghiep/' . $product_business->product_id) ?>'; // Thay thế bằng URL cơ sở của bạn
											window.location.href = baseUrl;
											return true;
										} else {
											return false;
										}
									}
								</script>

							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>

	</div>
</div>