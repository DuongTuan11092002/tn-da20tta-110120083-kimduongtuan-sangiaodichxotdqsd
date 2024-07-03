<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-center text-black text-uppercase font-weight-bold">Thông tin đăng bán sản phẩm</h2>
		<div class="container mt-5">
			<table class="table shadow table-bordered" id="product-table-admin">
				<thead>
					<tr class=" text-uppercase">
						<th scope="col">Mã</th>
						<th scope="col">người đăng bài</th>
						<th scope="col">tên sản phẩm</th>
						<th scope="col">ngày đăng bài</th>
						<th scope="col">ngày hết hạn</th>
						<th scope="col">trạng thái</th>
						<th scope="col">quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($lists as $key => $value) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $value->tenTK ?></td>
							<td><?php echo $value->product_name ?></td>
							<td><?php echo date('d-m-Y', strtotime($value->created_at)) ?></td>
							<td><?php echo date('d-m-Y', strtotime($value->created_end)) ?></td>
							<td>
								<?php
								if ($value->product_status == 0) {
									echo "<span style='color: blue; font-weight:600;'>Chưa duyệt</span>";
								} else if ($value->product_status == 1) {
									echo "<span style='color: green; font-weight:600;' >Đã duyệt</span>";
								} else if ($value->product_status == 2) {
									echo "<span style='color: red; font-weight:600;'>Tin nổi bật</span>";
								} else if ($value->product_status == 3) {
									echo "<span style='color: red; font-weight:600;'>Hết hạn</span>";
								}
								?>
							</td>
							<td>
								<a href="<?php echo base_url('edit-product-management/' . $value->product_id) ?>" class="btn btn-warning">Cập nhật</a>
								<a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDeletion('<?php echo base_url('delete-product-management/' . $value->product_id) ?>')">Xoá</a>

								<script>
									function confirmDeletion(url) {
										if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
											window.location.href = url;
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