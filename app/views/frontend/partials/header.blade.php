<!doctype html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
{{HTML::style('frontend/css/font-awesome.min.css')}}
{{HTML::style('frontend/css/prettyPhoto.css')}}
{{HTML::style('frontend/css/price-range.css')}}
{{HTML::style('frontend/css/animate.css')}}
{{HTML::style('frontend/css/bootstrap.min.css')}}
{{HTML::style('frontend/css/responsive.css')}}
{{HTML::style('frontend/css/main.css')}}
{{HTML::style('frontend/css/layout.css')}}
{{HTML::script('frontend/js/jquery.js')}}
{{HTML::script('frontend/js/popupdetails.js')}}
<!--[if lt IE 9]>
                {{HTML::script('frontend/js/html5shiv.js')}}
                {{HTML::script('frontend/js/respond.min.js')}}
            <![endif]-->
<link rel="shortcut icon"
	href="{{Config::get('app.url')}}/frontend/images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="{{Config::get('app.url')}}/frontend/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="{{Config::get('app.url')}}/frontend/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="{{Config::get('app.url')}}/frontend/images/ico/apple-touch-icon-72-precomposed.png">
</head>
<body>
	<header id="header">
		<!--=====Start Header]==============-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li class="user-home"><a href="{{Config::get('app.url')}}"
									taget="_blank">www.psarkhmer.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="social-icons pull-right ">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa">Contact us</i></a></li>
								<li><a href="#"><i class="fa">About us</i></a></li>
								<li><a href="#"><i class="fa">User Agreement</i></a></li>
								<li><a href="#"><i class="fa">Policy</i></a></li>
								<li><a href="#"><i class="fa">Usage</i></a></li>
								<li><a href="{{Config::get('app.url')}}/member/login"><i
										class="fa">Sign in /</i></a></li>
								<li><a href="{{Config::get('app.url')}}/member/register"><i
										class="fa">Free Register</i></a></li>
							</ul>
							<div class="language-bar">
								<a href="{{Config::get('app.url')}}?lang=en"> <img
									src="{{Config::get('app.url')}}/frontend/images/en.png" alt=""
									title="" /> English
								</a> <a href="{{Config::get('app.url')}}?lang=km"> <img
									src="{{Config::get('app.url')}}/frontend/images/km.png" alt=""
									title="" /> Khmer
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid top-menu">
			<div class="col-lg-6 top_promotion">
				<div class="col-lg-2">
					<a href="{{Config::get('app.url')}}"><img
						src="{{Config::get('app.url')}}frontend/images/classifieds_logo.png"
						width="200" /><a>
				
				</div>
				<div class="col-lg-10">
					<ul class="promotion_top_menu pull-right">
						<li><a
							href="{{Config::get('app.url')}}products/productbycategories/45">Hot
								Promotion</a></li>
						<li><a
							href="{{Config::get('app.url')}}products/productbycategories/43">New
								Arrival</a></li>
						<li><a
							href="{{Config::get('app.url')}}products/productbycategories/32">Second
								Hand</a></li>
						<li><a
							href="{{Config::get('app.url')}}products/productbycategories/12">Buy</a></li>
						<li><a
							href="{{Config::get('app.url')}}products/productbycategories/23">Sell</a></li>
						<li><a
							href="{{Config::get('app.url')}}products/productbycategories/12">Monthly
								Pay</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 navbar navbar-default topmenu-container"
				role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse promotion-list">
					<ul class="nav navbar-nav top_menu_list">
						<li><a href="#">All</a></li>
						<li><a href="{{Config::get('app.url')}}product/list">Super Market</a></li>
						<li><a href="{{Config::get('app.url')}}product/list">Traditional
								Market</a></li>
						<li><a href="{{Config::get('app.url')}}product/list">Private
								Company</a></li>
						<li><a href="{{Config::get('app.url')}}product/list">Home Shop</a></li>
						<li><a href="{{Config::get('app.url')}}product/list">Individual</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	
	
	</header>
	
	
	<br />
	<hr>
		<!--for mesage alert -->
		<div class="message-alert alert alert-warning" data-time="3000"
			style="display: none;">
			<strong>Warning!</strong> Better check yourself, you're not looking
			too good.
		</div>
		<div class="message-alert alert alert-warning message-loading"
			data-time="5000" style="display: none;">
			<img
				src="{{Config::get('app.url')}}frontend/images/upload_progress.gif"
				alt="loading...." /> Loading...
		</div>
		<div class="message-alert alert alert-success" data-time="3000"
			style="display: none;">
			<strong>Well done!</strong> You successfully read this important
			alert message.
		</div>
		<div class="message-alert alert alert-success message-success"
			data-time="3000" style="display: none;">
			<strong>Updated...</strong>
		</div>
		<div class="message-alert alert alert-info" data-time="3000"
			style="display: none;">
			<strong>Heads up!</strong> This alert needs your attention, but it's
			not super important.
		</div>
		<div class="message-alert alert alert-danger" data-time="3000"
			style="display: none;">
			<strong>Oh snap!</strong> Change a few things up and try submitting
			again.
		</div>