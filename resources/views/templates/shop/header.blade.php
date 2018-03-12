<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Aboutme</title>		
	<link rel="shortcut icon" type="image/x-icon" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/img/cv-icon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/css/jquery.fancybox.css">
	<link rel="stylesheet" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/css/animate.css">
	<link rel="stylesheet" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/css/main.css">
	<link rel="stylesheet" href="{{getenv('ABOUTME_TEMPLATE_URL')}}/css/media-queries.css">
	<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/modernizr-2.6.2.min.js"></script>

</head>
<body id="body">
	<!-- hình preloader -->
	<div id="preloader">
		<img src="{{getenv('ABOUTME_TEMPLATE_URL')}}/img/preloader.gif" alt="Preloader">
	</div>
	<!-- kết thúc preloader -->
	<!-- ===============================Fixed Navigation==================================== -->
	<header id="navigation" class="navbar-fixed-top navbar">
		<div class="container">
			<div class="navbar-header">
				<!-- responsive nav button -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-bars fa-2x"></i>
				</button>
				<!-- /responsive nav button -->
				<!-- logo -->
				<a class="navbar-brand" href="#body">
					<h1 id="logo">
						<!-- <img src="{{getenv('ABOUTME_TEMPLATE_URL')}}/img/logo.png" alt=""> -->
						About Me
					</h1>

				</a>
				<!-- /logo 				<!-- main nav -->
				<nav class="collapse navbar-collapse navbar-right" role="navigation">
					<ul id="nav" class="nav navbar-nav">
						<li class="current"><a href="#body">TRANG CHỦ</a></li>
						<li><a href="#features">GIỚI THIỆU</a></li>
						<li><a href="#skills">KỸ NĂNG</a></li>
						<li><a href="#works">DỰ ÁN</a></li>
						<li><a href="#contact">LIÊN HỆ</a></li>
						{{-- <li><a href="#team">CẢM NHẬN KHÁCH HÀNG</a></li> --}}
					</ul>
				</nav>
				<!-- /main nav -->

			</div>
		</header>
		<!--================================End Fixed Navigation==================================== -->