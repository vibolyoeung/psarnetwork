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
{{HTML::script('frontend/js/product.js')}}
<!--[if lt IE 9]>
{{HTML::script('frontend/js/html5shiv.js')}}
{{HTML::script('frontend/js/respond.min.js')}}
<![endif]-->
{{HTML::style('frontend/css/product.css')}}
</head>
<body>
<header id="header">
<!--=====Start Header]==============-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li>
								<a href="{{Config::get('app.url')}}" taget="_blank">
									www.psarkhmer.com
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="social-icons pull-right ">
						<ul class="nav navbar-nav">
							<li>
								<a href="#">
									<i class="fa text-color-white">Add New Products</i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa text-color-white">
										Products Management
									</i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa text-color-white">
										Setting
									</i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa text-color-white">
										My Account
									</i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- ============End header top here============== -->