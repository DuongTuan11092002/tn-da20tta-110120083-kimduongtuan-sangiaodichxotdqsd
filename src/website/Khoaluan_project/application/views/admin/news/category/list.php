<div class="main-panel">
	<div class="content-wrapper">
		<h2 class=" text-black text-center text-uppercase" style="letter-spacing: 4px;">Quản lý danh mục tin</h2>
		<div class="row">
			<div class="col-lg-3">
				<a href="<?php echo base_url('add-category-management') ?>" class="btn btn-block btn-success  w-50 m-3" style="letter-spacing: 3px;">Tạo danh mục </a>
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
			<table class="table shadow shadow-lg table-bordered" id="category-news-table">
				<thead>
					<tr class=" text-uppercase">
						<th scope="col">Stt</th>
						<th scope="col">Tên danh mục</th>
						<th scope="col">Trạng thái</th>
						<th scope="col">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($list_category as $key => $category) {
						$i++;
					?>
						<tr>
							<th scope="row"><?php echo $i ?></th>
							<td><?php echo $category->name ?></td>
							<td>
								<?php
								if ($category->status == 1) {
									echo "<span class=' text-primary font-weight-bold'>Hiển thị</span>";
								}else if ($category->status == 0) {
									echo "<span class=' text-danger font-weight-bold'>Không hiển thị</span>";
								} 
								?>
							</td>
							<td>
								<a href="<?php echo base_url('edit-category-management/' . $category->id . '/' . $category->slug) ?>" class="btn btn-warning text-black mr-3">Sửa</a>
								<a href="<?php echo base_url('delete-category-management/' . $category->id . '/' . $category->slug) ?>" class="btn btn-danger text-white">Xóa</a>
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