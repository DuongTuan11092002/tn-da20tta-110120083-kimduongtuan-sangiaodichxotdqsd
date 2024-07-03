<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Quản lý bản tin tức</h2>
		<div class="row">
			<div class="col-lg-3">
				<a href="<?php echo base_url('add-new-management') ?>" class="btn btn-block btn-success  w-50 m-3" style="letter-spacing: 3px;">Tạo bài viết </a>
			</div>
			<div class="col-lg-4"></div>
			<div class="col-lg-4"></div>
		</div>

		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<span class=" alert alert-success"><?php echo $this->session->flashdata('success') ?></span>
				<?php
				} else if ($this->session->flashdata('error')) {
				?>
					<span class=" alert alert-danger"><?php echo $this->session->flashdata('error') ?></span>
				<?php
				}
				?>
			</div>
			<div class="col-lg-4"></div>
		</div>

		<div class=" table table-responsive-lg">
			<table class="table table-bordered" id="new-news-table">
				<thead>
					<tr class=" text-uppercase">
						<th scope="col">Stt</th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">tên bài viết</th>
						<th scope="col">trạng thái</th>
						<th scope="col">danh mục</th>
						<th scope="col">tài khoản</th>
						<th scope="col">quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list_news as $key => $new) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td>
								<img src="/uploads/new/<?php echo $new->thumbnail ?>" alt="" class=" img-fluid">
							</td>
							<td><?php echo $new->name ?></td>
							<td>
								<?php
								if ($new->status == 1) {
									echo '<span class=" text-primary font-italic font-weight-bold">Hiển thị</span>';
								}else if ($new->status == 0) {
									echo '<span class=" text-danger font-italic font-weight-bold">Không hiển thị</span>';
								}
								?>
							</td>
							<td><?php echo $new->tendanhmuc ?></td>
							<td><?php echo $new->tentaikhoan ?></td>
							<td>
								<a href="<?php echo base_url('edit-new-management/' . $new->id . '/' . $new->slug) ?>" class="btn  btn-warning text-black mr-3">Sửa</a>
								<a href="<?php echo base_url('delete-new-management/'. $new->id . '/' . $new->slug) ?>" class="btn  btn-danger ">Xóa</a>
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