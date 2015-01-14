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
        <!-- Fixed navbar  navbar-fixed-top menu-fixed-->
        <div class="navbar navbar-default navbar-fixed-top menu-fixed" style="display: none">
           <div class="container">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand logo-fixed" href="{{Config::get('app.url')}}"><img src="{{Config::get('app.url')}}/frontend/images/home/logo.png" alt="" /></a> 
                 </div>
                <div class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                         <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
                             <ul class="dropdown-menu">
                                <li><a href="#tshirt" data-toggle="tab">Phone</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Tablet</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Laptop</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Moto</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Car</a></li>
                                 <li><a href="#blazers" data-toggle="tab">House</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Land</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Instrument</a></li>
                                <li><a href="#blazers" data-toggle="tab">Clothes</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Jewellery</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Cosmetic Wakeup</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Food</a></li>
                                <li><a href="#blazers" data-toggle="tab">Furniture</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Entertainment</a></li>
                                 <li><a href="#blazers" data-toggle="tab">Fussiness Service</a></li>
                             </ul>
                         </li>
                     </ul>
                     <ul class="nav navbar-nav navbar-right"> 
                         <li><a href="#"><i class="fa">Contact us</i></a></li>
                        <li><a href="#"><i class="fa">About us</i></a></li>
                        <li><a href="#"><i class="fa">User Agreement</i></a></li>
                         <li><a href="#"><i class="fa">Policy</i></a></li>
                         <li><a href="#"><i class="fa">Usage</i></a></li>
                        <li><a href="{{Config::get('app.url')}}/member/login"><i class="fa">Sign in /</i></a></li>
                         <li><a href="{{Config::get('app.url')}}/member/register"><i class="fa">Free Register</i></a></li>
                         <li class="search">
                            <!-- search form -->
                             <form method="get" action="#" class="input-group pull-right">
                                 <input type="text" class="form-control" name="k" id="k" value="" placeholder="Search">
                                 <span class="input-group-btn">
                                    <button class="btn btn-primary notransition" style="margin-top: 8px;"><i class="fa fa-search"></i></button>
                                 </span>
                             </form>
                         <!-- /search form -->
                         </li> 
                     </ul>
                </div><!--/.nav-collapse-->
			</div>
		</div>

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
<!--                                 <div class="language-bar"> -->
<!--                                     <a href="{{Config::get('app.url')}}en" > -->
<!--                                         <img src="{{Config::get('app.url')}}/frontend/images/en.png" alt="" title="" /> -->
<!--                                         English -->
<!--                                     </a> -->
<!--                                     <a href="{{Config::get('app.url')}}zh"> -->
<!--                                         <img src="{{Config::get('app.url')}}/frontend/images/cn.png" alt="" title="" /> -->
<!--                                         Chinese -->
<!--                                     </a>	 -->
<!--                                 </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ============End header top here============== -->
            <div class="container-fluid top-menu">
            	<div class="col-lg-5 top_promotion">
					<ul class="col-lg-12 promotion_top_menu pull-left">
						<li><a href="#"><img src="{{Config::get('app.url')}}frontend/images/classifieds_logo.png" /><a></li>
		                <li><a href="#">Hot Promotion</a></li>
		                <li><a href="#">New Arrival</a></li>
		                <li><a href="#">Second Hand</a></li>
		                <li><a href="#">Buy</a></li>
		                <li><a href="#">Sell</a></li>
		                <li><a href="#">Monthly Pay</a></li>
				    </ul>
				</div>
				<div class="col-lg-5 navbar navbar-default topmenu-container" role="navigation">
				    <div class="container-fluid">
				        <div class="navbar-header">
				            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
				        </div>
				        <div class="collapse navbar-collapse promotion-list">
				            <ul class="nav navbar-nav">
								<li><a href="#">All</a></li>
								<li><a href="#">Super Market</a></li>
								<li><a href="#">Traditional Market</a></li>
								<li><a href="#">Private Company</a></li>
								<li><a href="#">Home Shop</a></li>
								<li><a href="#">Individual</a></li>
				            </ul>
				        </div><!--/.nav-collapse -->
				    </div>
				</div>&nbsp;
				<div class="col-lg-2 top-mg">
	            	<a href="" class="btn btn-default"><span style="color:red;">10</span> Top Posts</a>
	            	<a href="" class="btn btn-default"><span style="color:red;">5</span> Notifications</a>
	            </div>
			</div>