<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center  font-weight-bold">Danh sách gói đã đăng ký</h2>
		<div class=" table table-responsive-lg">

			<table class="table shadow-lg table-bordered" id="business-package-table">
				<thead>
					<tr>
						<th scope="col">stt</th>
						<th scope="col">Tên gói đăng ký </th>
						<th scope="col">tháng</th>
						<th scope="col">Ngày bắt đầu</th>
						<th scope="col">Ngày kết thúc</th>
						<th scope="col">Trang thái</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($packages as $key => $value) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $value->tenPA ?></td>
							<td><?php echo $value->thang ?></td>
							<td>
								<input type="date" name="" id="" readonly value="<?php echo $value->start_time ?>" class=" form-control w-50">
							</td>
							<td>
								<input type="date" name="" id="" readonly value="<?php echo $value->end_time ?>" class=" form-control w-50">
							</td>
							<td><?php
									if ($value->status == 1) {
										echo "<span style='font-weight: 700;' class='btn btn-danger'>Chưa kích hoạt</span>";
									} else 		if ($value->status == 2) {
										echo "<span style='font-weight: 700;' class='btn btn-success'>kích hoạt thành công</span>";
									}else if($value->status == 3) {
										echo "<span style='font-weight: 700;' class='btn btn-warning'>Hết hạn</span>";
									}
									?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>