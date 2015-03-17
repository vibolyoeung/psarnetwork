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
                                    <li><a href="{{Config::get('app.url')}}" taget="_blank">www.psarkhmer.com</a></li>
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
                                    <li><a href="{{Config::get('app.url')}}/member/login"><i class="fa">Sign in /</i></a></li>
                                    <li><a href="{{Config::get('app.url')}}/member/register"><i class="fa">Free Register</i></a></li>
                                </ul>
                                <div class="language-bar">
                                    <a href="{{Config::get('app.url')}}?lang=en" >
                                        <img src="{{Config::get('app.url')}}/frontend/images/en.png" alt="" title="" />
                                        English
                                    </a>
                                    <a href="{{Config::get('app.url')}}?lang=km">
                                        <img src="{{Config::get('app.url')}}/frontend/images/km.png" alt="" title="" />
                                        Khmer
                                    </a>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ============End header top here============== -->
            <div class="container-fluid top-menu">
            	<div class="col-lg-5 top_promotion">
            		<div class="col-lg-2">
						<a href="{{Config::get('app.url')}}"><img src="{{Config::get('app.url')}}frontend/images/classifieds_logo.png" width="200"/><a>
					</div>
					<ul class="promotion_top_menu pull-right">
						<li><a href="#">Hot Promotion</a></li>
		                <li><a href="#">New Arrival</a></li>
		                <li><a href="#">Second Hand</a></li>
		                <li><a href="#">Buy</a></li>
		                <li><a href="#">Sell</a></li>
		                <li><a href="#">Monthly Pay</a></li>
				    </ul>
				</div>
				<div class="col-lg-2 top-mg pull-right" style="padding:0;">
					<div class="btn-group col-lg-6">
						  <button type="button" style="font-size: 10px;" class="btn btn-default dropdown-toggle top-post" data-toggle="dropdown" aria-expanded="false">
						    <span style="color:red;">10</span>&nbsp;&nbsp;Notificatioin <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="#">Action</a></li>
						    <li><a href="#">Another action</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
					</div>
					<div class="btn-group col-lg-6">
						  <button style="font-size: 10px;" type="button" class="btn btn-default dropdown-toggle top-post" data-toggle="dropdown" aria-expanded="false">
						    <span style="color:red;">10</span>&nbsp;&nbsp;Type <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="#">Action</a></li>
						    <li><a href="#">Another action</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
					</div>
	            </div>
				<div class="col-lg-5 navbar navbar-default topmenu-container" role="navigation">
				    <div class="navbar-header">
				            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
				        </div>
				        <div class="collapse navbar-collapse promotion-list">
				            <ul class="nav navbar-nav top_menu_list">
								<li class="active"><a href="#">All</a></li>
								<li><a href="{{Config::get('app.url')}}supermarket/list">Super Market</a></li>
								<li><a href="#">Traditional Market</a></li>
								<li><a href="#">Private Company</a></li>
								<li><a href="#">Home Shop</a></li>
								<li><a href="#">Individual</a></li>
				            </ul>
				        </div><!--/.nav-collapse -->
				</div>
			</div>