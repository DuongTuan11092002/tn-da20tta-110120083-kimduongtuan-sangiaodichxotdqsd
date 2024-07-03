</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?php echo base_url('assets_admin/vendors/js/vendor.bundle.base.js'); ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url('assets_admin/vendors/chart.js/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('assets_admin/vendors/jquery-circle-progress/js/circle-progress.min.js'); ?>"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url('assets_admin/js/off-canvas.js'); ?>"></script>
<script src="<?php echo base_url('assets_admin/js/hoverable-collapse.js'); ?>"></script>
<script src="<?php echo base_url('assets_admin/js/misc.js'); ?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url('assets_admin/js/dashboard.js'); ?>"></script>
<!-- End custom js for this page -->
<!-- data-table-JS -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<!-- setting data-table - START -->
<script>
	// company
	new DataTable('#company-table');
	// Segment
	new DataTable('#segment-table');
	//package
	new DataTable('#package-table');
	// regitert table
	new DataTable('#register-package-table');
	// product of section admin
	new DataTable('#product-table-admin');



	//new-management
	//==category-table
	new DataTable('#category-news-table');
	//==new-table
	new DataTable('#new-news-table');
	// new-sale
	new DataTable('#new-sale-table');

	/* -------------------------------------------------------------------------- */
	/*                                  DASHBOARD                                 */
	new DataTable('#contact-table');
	/* -------------------------------------------------------------------------- */
</script>


<!-- setting data-table - END -->

<!-- CKeditor -->
<script src="<?php echo base_url('assets_admin/ckeditor/ckeditor.js') ?>"></script>
<script>
	CKEDITOR.replace('description-package');

	//new-table => news
	CKEDITOR.replace('content-new-table')
</script>

<!-- CKeditor -->



<!-- SECTION FORM START -->
<!-- change -slug -->
<script type="text/javascript">
	function ChangeToSlug() {
		var slug;

		//Lấy text từ thẻ input title 
		slug = document.getElementById("slug").value;
		slug = slug.toLowerCase();
		//Đổi ký tự có dấu thành không dấu
		slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
		slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
		slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
		slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
		slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
		slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
		slug = slug.replace(/đ/gi, 'd');
		//Xóa các ký tự đặt biệt
		slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
		//Đổi khoảng trắng thành ký tự gạch ngang
		slug = slug.replace(/ /gi, "-");
		//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
		//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
		slug = slug.replace(/\-\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-\-/gi, '-');
		slug = slug.replace(/\-\-\-/gi, '-');
		slug = slug.replace(/\-\-/gi, '-');
		//Xóa các ký tự gạch ngang ở đầu và cuối
		slug = '@' + slug + '@';
		slug = slug.replace(/\@\-|\-\@|\@/gi, '');
		//In slug ra textbox có id “slug”
		document.getElementById('convert_slug').value = slug;
	}
</script>


<!-- SECTION FORM END -->
</body>

</html>