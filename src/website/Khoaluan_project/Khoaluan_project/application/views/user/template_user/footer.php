	<!-- Footer Start -->
	<div class="container-fluid text-white mt-5 pt-5" style="background-color: black;">
		<div class="row px-xl-5 pt-5">
			<div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
				<a href="" class="text-decoration-none">
					<h1 class="mb-4 display-5 font-weight-semi-bold text-white"><span class="text-white font-weight-bold border border-white px-3 mr-1">K&T</span>Thế giới xe hơi</h1>
				</a>
				<p>Thế giới xe hơi, nơi mua bán xe, uy tín, chất lượng, đáng tin cậy danh cho bạn</p>

			</div>
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<div class="col-md-7 mb-5">
						<p class="mb-2" style="font-size: 1.3rem;"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Đại học Trà Vinh(TVU), phường 5, Trà Vinh</p>
						<p class="mb-2" style="font-size: 1.3rem;"><i class="fa fa-envelope text-primary mr-3"></i>Kim884740@gmail.com</p>
						<p class="mb-0" style="font-size: 1.3rem;"><i class="fa fa-phone-alt text-primary mr-3"></i>+84 911 096 648</p>
					</div>

					<div class="col-md-5 mb-5">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.1565831052303!2d106.34558897569708!3d9.920914174389235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a01961974caf2d%3A0xebdb3d68c84af361!2zVsaw4budbiDGsMahbSBkb2FuaCBuZ2hp4buHcCB04buJbmggVHLDoCBWaW5o!5e0!3m2!1svi!2s!4v1719046160951!5m2!1svi!2s" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="row border-top border-light mx-xl-5 py-4">
			<div class="col-md-6 px-xl-0">
				<p class="mb-md-0 text-center text-md-left text-white">
					&copy; <a class="text-white font-weight-semi-bold" href="#">K&T - Thế giới xe hơi</a>. được xây dựng, thiết kế bởi
					<a class="text-white font-weight-semi-bold" href="#">Kim Dương Tuấn</a><br>

				</p>
			</div>
			<div class="col-md-6 px-xl-0 text-center text-md-right">
				<img class="" src="assets_user/img/payments.png" alt="">
			</div>
		</div>
	</div>
	<!-- Footer End -->


	<!-- Back to Top -->
	<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url('assets_user/lib/easing/easing.min.js') ?>"></script>
	<script src="<?php echo base_url('assets_user/lib/owlcarousel/owl.carousel.min.js') ?>"></script>

	<!-- Contact Javascript File -->
	<script src="<?php echo base_url('assets_user/mail/jqBootstrapValidation.min.js') ?>"></script>
	<script src="<?php echo base_url('assets_user/mail/contact.js') ?>"></script>

	<!-- Template Javascript -->
	<script src="<?php echo base_url('assets_user/js/main.js') ?>"></script>
	<!-- data-table-JS -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

	<script>
		new DataTable('#user-product-table');
		new DataTable('#profile-contact-table');
	</script>

	<!-- CKeditor -->
	<script src="<?php echo base_url('assets_admin/ckeditor/ckeditor.js') ?>"></script>
	<script>
		CKEDITOR.replace('detail-form-sell-car');
	</script>


	<!-- slick slider  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- section brand -->
	<script type="text/javascript">
		$('.Slider-brand-product').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 2,
			slidesToScroll: 2,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
	</script>
	<!-- section main product -->
	<script type="text/javascript">
		$('.Slider-main-product').slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
	</script>



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

	<!-- Lọc sản phẩm  của hãng xe-->
	<script>
		// lấy class từ select lọc của danh mục hãng xe
		$('.select-filter-company').change(function() {
			var value = $(this).find(':selected').val();

			if (value != 0) {
				var url = value;
				window.location.replace(url)
			} else {
				alert('Hãy chọn danh mục cần lọc')
			}
		})
	</script>

	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
	<script>
		$('.price_from').val(<?php echo $min_price ?>);
		$('.price_to').val(<?php echo $max_price / 2 ?>);

		$(function() {
			$("#slider-range").slider({
				range: true,
				min: <?php echo $min_price ?>,
				max: <?php echo $max_price ?>,
				values: [<?php echo $min_price ?>, <?php echo $max_price / 2 ?>],
				slide: function(event, ui) {
					$("#amount").val(addPlus(ui.values[0]) + "VNĐ - " + addPlus(ui.values[1]) + " VNĐ");

					$('.price_from').val(ui.values[0]);
					$('.price_to').val(ui.values[1]);
				}
			});
			$("#amount").val($("#slider-range").slider("values", 0) + "VNĐ - " +
				$("#slider-range").slider("values", 1) + "VNĐ");
		});
	</script>
	<script>
		function addPlus(nStr) {
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
			return x1 + x2;
		}
	</script>


	<!-- Lọc sản phẩm của dòng xe -->
	<script>
		// lấy class từ select lọc của danh mục hãng xe
		$('.select-filter-vehicles').change(function() {
			var value = $(this).find(':selected').val();

			if (value != 0) {
				var url = value;
				window.location.replace(url)
			} else {
				alert('Hãy chọn danh mục cần lọc')
			}
		})
	</script>

	<!-- Lọc sản phẩm của thành phố -->
	<script>
		// lấy class từ select lọc của danh mục hãng xe
		$('.select-filter-city').change(function() {
			var value = $(this).find(':selected').val();

			if (value != 0) {
				var url = value;
				window.location.replace(url)
			} else {
				alert('Hãy chọn danh mục cần lọc')
			}
		})
	</script>


	<!-- Lọc sản phẩm của tất cả sản phẩm -->
	<script>
		// lấy class từ select lọc của tất cả sản phẩm 
		$('.select-filter-product-all').change(function() {
			var value = $(this).find(':selected').val();

			if (value != 0) {
				var url = value;
				window.location.replace(url)
			} else {
				alert('Hãy chọn danh mục cần lọc')
			}
		})
	</script>


	<!-- Lọc sản phẩm của từng doanh nghiệp -->
	<script>
		// lấy class từ select lọc của từng doanh nghiệp
		$('.select-filter-product-business').change(function() {
			var value = $(this).find(':selected').val();

			if (value != 0) {
				var url = value;
				window.location.replace(url)
			} else {
				alert('Hãy chọn danh mục cần lọc')
			}
		})
	</script>




	<!-- xử lý phần bình luận -->
	<script>
		$('.write-comment').click(function() {
			var name_comment = $('.name_comment').val();
			var email_comment = $('.email_comment').val();
			var message_comment = $('.message_comment').val();
			var product_id = $('.product_id').val();
			var rate_value = $('.rate_value').val();

			if (name_comment == '' || email_comment == '' || message_comment == '') {
				alert('Vui lòng để lại nhận xét của sản phẩm');
			} else {
				$.ajax({
					method: 'POST',
					url: '/comment/send',
					data: {
						name_comment: name_comment,
						email_comment: email_comment,
						message_comment: message_comment,
						product_id: product_id,
						rate_value: rate_value,
					},
					success: function() {
						$('#comment-alert').html('<span class=" text text-success">Cảm ơn bạn đã đánh giá</span>')

						setTimeout(function() {
							location.reload();
						}, 1000);
					}
				})
			}
		})
	</script>



	<!-- đánh giá sao -->
	<script>
		function ratingStar(star) {
			star.click(function() {
				var stars = $('.ratingW').find('li')
				stars.removeClass('on');
				var thisIndex = $(this).parents('li').index();
				for (var i = 0; i <= thisIndex; i++) {
					stars.eq(i).addClass('on');
				}
				putScoreNow(thisIndex + 1);
				$('.rate_value').val(i);
			});
		}

		function putScoreNow(i) {
			$('.Rate').html(i);
		}


		$(function() {
			if ($('.ratingW').length > 0) {
				ratingStar($('.ratingW li a'));
				$('.rate_value').val('3');

			}
		});
	</script>


	<!-- hàm tự động reload trang -->
	</body>

	</html>