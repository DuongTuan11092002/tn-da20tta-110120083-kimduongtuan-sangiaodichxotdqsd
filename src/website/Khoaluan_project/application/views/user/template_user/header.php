<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>K&T thế giới xe hơi cũ</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="Free HTML Templates" name="keywords">
	<meta content="Free HTML Templates" name="description">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="<?php echo base_url('assets_user/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?php echo base_url('assets_user/css/style.css') ?>" rel="stylesheet">

	<!-- boostrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


	<!-- slick slider -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

	<style>
		/* Phân trang */
		.pagination {
			margin: 0;
			padding: 0;
			list-style-type: none;
		}

		.pagination li {
			display: inline;
			margin-right: 5px;
		}

		.pagination li a,
		.pagination li span {
			padding: 5px 10px;
			border: 1px solid #ccc;
			text-decoration: none;
			color: #333;
		}

		.pagination li.active a {
			background-color: #337ab7;
			color: #fff;
			border-color: #337ab7;
		}

		.pagination li a:hover {
			background-color: #f5f5f5;
		}
	</style>

	<!-- pricing card -->
	<style>
		body {
			margin-top: 20px;
		}

		.pricing-box {
			-webkit-box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
			box-shadow: 0px 5px 30px 10px rgba(0, 0, 0, 0.1);
			padding: 35px 50px;
			border-radius: 20px;
			position: relative;
		}

		.pricing-box .plan {
			font-size: 34px;
		}

		.pricing-badge {
			position: absolute;
			top: 0;
			z-index: 999;
			right: 0;
			width: 100%;
			display: block;
			font-size: 15px;
			padding: 0;
			overflow: hidden;
			height: 100px;
		}

		.pricing-badge .badge {
			float: right;
			-webkit-transform: rotate(45deg);
			transform: rotate(45deg);
			right: -67px;
			top: 17px;
			position: relative;
			text-align: center;
			width: 200px;
			font-size: 13px;
			margin: 0;
			padding: 7px 10px;
			font-weight: 500;
			color: #ffffff;
			background: #fb7179;
		}

		.mb-2,
		.my-2 {
			margin-bottom: .5rem !important;
		}

		p {
			line-height: 1.7;
		}
	</style>

	<style>
		.counterW {
			margin: 0 0 0 60px;
		}

		.ratingW {
			position: relative;
			margin: 10px 0 0;
		}

		.ratingW li {
			display: inline-block;
			margin: 0px;
		}

		.ratingW li a {
			display: block;
			position: relative;
			/*margin:0 3px;  width:28px; height:27px;color:#ccc; background:url('../img/ico/icoStarOff.png') no-repeat; background-size:100%;*/
		}

		/*.ratingW li.on a {background:url('../img/ico/icoStarOn.png') no-repeat; background-size:100%;}*/

		.star {
			position: relative;
			display: inline-block;
			width: 0;
			height: 0;
			margin-left: .9em;
			margin-right: .9em;
			margin-bottom: 1.2em;
			border-right: .3em solid transparent;
			border-bottom: .7em solid #ddd;
			border-left: .3em solid transparent;
			/* Controlls the size of the stars. */
			font-size: 15px;
		}

		.star:before,
		.star:after {
			content: '';
			display: block;
			width: 0;
			height: 0;
			position: absolute;
			top: .6em;
			left: -1em;
			border-right: 1em solid transparent;
			border-bottom: .7em solid #ddd;
			border-left: 1em solid transparent;
			-webkit-transform: rotate(-35deg);
			transform: rotate(-35deg);
		}

		.star:after {
			-webkit-transform: rotate(35deg);
			transform: rotate(35deg);
		}


		.ratingW li.on .star {
			position: relative;
			display: inline-block;
			width: 0;
			height: 0;
			margin-left: .9em;
			margin-right: .9em;
			margin-bottom: 1.2em;
			border-right: .3em solid transparent;
			border-bottom: .7em solid #FC0;
			border-left: .3em solid transparent;
			/* Controlls the size of the stars. */
			font-size: 15px;
		}

		.ratingW li.on .star:before,
		.ratingW li.on .star:after {
			content: '';
			display: block;
			width: 0;
			height: 0;
			position: absolute;
			top: .6em;
			left: -1em;
			border-right: 1em solid transparent;
			border-bottom: .7em solid #FC0;
			border-left: 1em solid transparent;
			-webkit-transform: rotate(-35deg);
			transform: rotate(-35deg);
		}

		.ratingW li.on .star:after {
			-webkit-transform: rotate(35deg);
			transform: rotate(35deg);
		}
	</style>

</head>

<body>