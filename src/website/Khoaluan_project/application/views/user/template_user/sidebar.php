<!-- Shop Sidebar Start -->
<div class="col-lg-3 col-md-12">
	<!-- Search Start -->
	<div class="border-bottom mb-4 pb-4">
		<form action="<?php echo base_url('tim-kiem-thong-tin') ?>" method="get">
			<div class="input-group border border-dark rounded">
				<input type="search" class="form-control" name="keyword" placeholder="Tìm kiếm sản phẩm">
				<div class="input-group-append">
					<span class="input-group-text bg-transparent text-black">
						<i class="fa fa-search"></i>
					</span>
				</div>
			</div>
		</form>
	</div>
	<!-- Search End -->

	<!-- Car Brands Start -->
	<div class="border-bottom mb-4 pb-4">
		<div class="d-flex align-items-center  bg-warning rounded p-3">
			<i class="fa fa-car mr-2 text-black"></i>
			<span class="font-weight-bold">Hãng xe</span>
		</div>
		<div style="max-height: 150px; overflow-y: scroll; border:1px solid rgba(0, 0, 0, 0.125);" class="rounded">
			<ul class="list-group list-unstyled pl-3">
				<?php
				foreach ($list_companies as $key => $value) {
				?>
					<li class="p-2"><a href="<?php echo base_url('danh-muc-hang-xe/' . $value->id . '/' . $value->slug) ?>" class="text-dark text-uppercase "><?php echo $value->name ?></a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
	<!-- Car Brands End -->

	<!-- Car Models Start -->
	<div class="border-bottom mb-4 pb-4">
		<div class="d-flex align-items-center  bg-warning rounded p-3">
			<i class="fa fa-list-ul mr-2 text-black"></i>
			<span class="font-weight-bold">Dòng xe</span>
		</div>
		<ul class="list-group-item list-unstyled pl-3">
			<?php
			foreach ($list_vehicles as $key => $value) {
			?>
				<li class="p-2"><a href="<?php echo base_url('danh-muc-dong-xe/' . $value->id . '/' . $value->slug) ?>" class="text-dark text-uppercase"><?php echo $value->name ?></a></li>
			<?php
			}
			?>
		</ul>
	</div>
	<!-- Car Models End -->

	<!-- Cities Start -->
	<div class="border-bottom mb-4 pb-4">
		<div class="d-flex align-items-center  bg-warning rounded p-3">
			<i class="fa fa-map-marker-alt mr-2 text-black"></i>
			<span class="font-weight-bold">Thành phố</span>
		</div>
		<div style="max-height: 150px; overflow-y: scroll; border:1px solid rgba(0, 0, 0, 0.125);" class="rounded">
			<ul class="list-group list-unstyled pl-3">
				<?php
				foreach ($list_cityes as $key => $value) {
				?>
					<li class="p-2"><a href="<?php echo base_url('danh-muc-thanh-pho/' . $value->id . '/' . $value->slug) ?>" class="text-dark text-uppercase"><?php echo $value->name ?></a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
	<!-- Cities End -->


	
	
</div>