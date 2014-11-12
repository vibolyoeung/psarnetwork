<!doctype html>
<html lang="en">
<head>
		<title>@yield('title')</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		{{HTML::style('frontend/css/bootstrap.min.css')}}
		{{HTML::style('frontend/css/font-awesome.min.css')}}
		{{HTML::style('frontend/css/prettyPhoto.css')}}
		{{HTML::style('frontend/css/price-range.css')}}
		{{HTML::style('frontend/css/animate.css')}}
		{{HTML::style('frontend/css/main.css')}}
		{{HTML::style('frontend/css/responsive.css')}}
                {{HTML::script('frontend/js/jquery.js')}}
		<!--[if lt IE 9]>
			{{HTML::script('frontend/js/html5shiv.js')}}
			{{HTML::script('frontend/js/respond.min.js')}}
		    <![endif]-->
		<link rel="shortcut icon" href="{{Config::get('app.url')}}/frontend/images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144"
			href="{{Config::get('app.url')}}/frontend/images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114"
			href="{{Config::get('app.url')}}/frontend/images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72"
			href="{{Config::get('app.url')}}/frontend/images/ico/apple-touch-icon-72-precomposed.png">
</head>
<body>
	<header id="header"><!--=====Start Header]==============-->
	<div class="header_top">
		<!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="www.psarkhmer.com" taget="_blank">www.psarkhmer.com</a></li>
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
							<li><a href="#"><i class="fa">Sign in /</i></a></li>
							<li><a href="#"><i class="fa">Free Register</i></a></li>
						</ul>
						<div class="language-bar">
							<strong class="current-language" id="show">Language&nbsp;<img
								src="{{Config::get('app.url')}}/frontend/images/en.png" alt="" title="" /></strong> <strong
								class="current-language" id="hide">Language&nbsp;<img
								src="{{Config::get('app.url')}}/frontend/images/en.png" alt="" title="" /></strong>
                                                    <ul style="display: none">
								<li><a href="#">Englsih <img src="{{Config::get('app.url')}}/frontend/images/en.png" alt="" title="" /></a></li>
								<li><a href="#">Chinese <img src="{{Config::get('app.url')}}/frontend/images/cn.png" alt="" title="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- ============End header top here============== -->