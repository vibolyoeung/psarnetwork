<!doctype html>
<html lang="en">
<head>
<title>@yield('title')</title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('description')">
        <meta name="author" content="">
        <meta content='article' property='og:type'/>
		<meta content='summary' name='twitter:card'/>
		<meta content='Global' name='distribution'/>
		<meta content='General' name='rating'/>
		<meta content='index, follow' name='robots'/>
		<meta content='3 days' name='revisit-after'/>
		<meta content='en-us' name='language'/>
		<meta content='4.5' property='og:rating'/>
		<meta content='5' property='og:rating_scale'/>
		<meta content='120' property='og:rating_count'/>
		<meta content='unisex' property='product:gender'/>
		<meta content='index, follow' name='robots'/>
		<meta content='global' name='distribution'/>
		<meta content='3 days' name='revisit-after'/>
		<meta content='document' name='resource-type'/>
		<meta content='all' name='audience'/>
		<meta content='all' name='robots'/>
		<meta content='true' name='MSSmartTagsPreventParsing'/>
		<meta content='all' name='audience'/>
		<meta content='index,follow,snipet' name='googlebot'/>
		<meta content='follow, all' name='msnbot'/>
		<meta content='nopreview' name='msnbot'/>
		<meta content='follow, all' name='alexabot'/>
		<meta content='100' name='alexa'/>
		<meta content='10' name='pagerank'/>
		<meta content='1, 2, 3, 10, 11, 12, 13, ATF' name='serps'/>
		<meta content='follow, all' name='Slurp'/>
		<meta content='follow, all' name='ZyBorg'/>
		<meta content='follow, all' name='Scooter'/>
		<meta content='follow, all' name='Googlebot-Image'/>
		<meta content='noodp' name='robots'/>
		<meta content='ALL' name='SPIDERS'/>
		<meta content='ALL' name='WEBCRAWLERS'/>
		<meta content='no-cache' http-equiv='cache-control'/>
		<meta content='no-cache' http-equiv='pragma'/>
		<meta content='global' name='target'/>
{{HTML::style('frontend/css/font-awesome.min.css')}}
{{HTML::style('frontend/css/prettyPhoto.css')}}
{{HTML::style('frontend/css/colorbox.css')}}
{{HTML::style('frontend/css/animate.css')}}
{{HTML::style('frontend/css/bootstrap.min.css')}}
{{HTML::style('frontend/css/responsive.css')}}
{{HTML::style('backend/css/jquery-ui.css')}}
{{HTML::style('frontend/css/main.css')}}
{{HTML::style('frontend/css/layout.css')}}
{{HTML::script('frontend/js/jquery.js')}}
{{HTML::script('frontend/js/jquery.colorbox-min.js')}}
{{HTML::script('backend/js/jquery-ui.js')}}
{{HTML::script('frontend/js/popupdetails.js')}}
<!--[if lt IE 9]>
                {{HTML::script('frontend/js/html5shiv.js')}}
                {{HTML::script('frontend/js/respond.min.js')}}
            <![endif]-->
<link rel="shortcut icon"
	href="{{Config::get('app.url')}}frontend/images/icons/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="{{Config::get('app.url')}}frontend/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="{{Config::get('app.url')}}frontend/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="{{Config::get('app.url')}}frontend/images/icons/apple-touch-icon-72-precomposed.png">
</head>
<body>
	<!-- Call facebook script -->
	<div id="fb-root"></div>
	<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  //js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- End facebook calling -->
	<header id="header" class="mainHeader">
		<!--=====Start Header==============-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li class="facebook-like">
									<div class="fb-like" data-href="https://www.facebook.com/khmerabba?ref=hl" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
								 </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="social-icons pull-right ">
							<ul class="nav navbar-nav">
								<?php $mPages = MPage::getPagesToPutOnTop();?>
								@foreach($mPages as $mPage)
									<li>
										<a href="{{URL::to('page.html')}}/{{$mPage->id}}">
											<i class="fa">
												<?php 
                                                   echo $mPage->{'title_'.Session::get('lang')}
												?>
											</i>
										</a>
									</li>
								@endforeach
							</ul>
							<div class="language-bar">
								<a href="{{URL::current()}}?lang=en"> <img
									src="{{Config::get('app.url')}}/frontend/images/en.png" alt=""
									title="" /> English
								</a> <a href="{{URL::current()}}?lang=km"> <img
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
			<div class="col-lg-12 top_promotion">
				<div class="col-lg-4 member_ship_home pull-right" style="background-color:#ddd;margin:12px 0 0;padding:3px;">
					@if(!Session::get('currentUserId'))
						<img src="{{Config::get('app.url')}}frontend/images/icons/login_user.png" title="" alt="" height="20" />
						<a href ="{{Config::get('app.url')}}member/login">{{trans('login.Login')}}</a>
						&nbsp;/&nbsp;
						<img src="{{Config::get('app.url')}}frontend/images/icons/register_user.png" title="" alt=""/>
						&nbsp;
						<a href="{{Config::get('app.url')}}member/register">
							{{trans('login.Register')}}
						</a>
					@else
						<ul class="nav navbar-nav front-loggedin">
							<li>
								<a>
								Hi &nbsp;{{Session::get('currentUserName')}}
								</a>
							</li>
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
								My Account <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{URL::to('member/userinfo/infomation')}}">View Profile info</a>
									</li>
									<li>
										<a href="{{URL::to('member/userinfo/summary')}}">Your Status</a>
									</li>
		                            <li>
										<a href="{{URL::to('member/userinfo/infomation?pw=1#password')}}">Chage Password</i></a>
									</li>
		                            <li>
										<a href="{{URL::to('member/logout')}}"><i class="glyphicon glyphicon-off"> Log out</i></a>
									</li>
								</ul>
							</li>
						</ul>
						 @endif
						<ul class="nav navbar-nav front-loggedin <?php echo !Session::get('currentUserId')?'pull-right':'';?>">
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
									{{trans('product.notification')}}&nbsp;<span class="label label-danger"><?php $productNotification = Product::productPosttoday();echo count($productNotification);?></span>
								</a>
								<?php 
								if(count($productNotification)){
								?>
								<ul class="dropdown-menu notification-product" role="menu">
									@foreach($productNotification as $noticproduct)
										<li>
											<a href="{{Config::get('app.url')}}product/details/{{$noticproduct->id}}">
												<img src="{{Config::get('app.url')}}upload/product/thumb/{{$noticproduct->thumbnail}}" title="" alt=""/>
												&nbsp;<span class="price">$&nbsp;{{$noticproduct->price}}</span>&nbsp;{{substr($noticproduct->title,0,15)}}
											</a>
										</li>
									@endforeach
								</ul>
								<?php
								}
								?>
							</li>
						</ul>
				</div>
				<div class="col-lg-2">
					<a href="{{Config::get('app.url')}}"><img
						src="{{Config::get('app.url')}}frontend/images/khmerabba_logo.png"
						height="56"/>
					</a>
				</div>
				<div class="col-lg-6">
						<div class="col-lg-12" id="form-search">
					{{
						Form::open(
							array(
								'url'=>'search',
								'method'=>'get'
							)
						)
					}}
					<div class="col-lg-12 search-bar">
						<div class="col-lg-8 pull-right" style="padding: 0; margin: 0;">
							<div class="col-lg-3 pull-right" style="padding: 0; margin: 0;">
								<button type="submit"
									class="btn btn-warning pull-right col-lg-12"
									style="border-radius: 0;">
									<span class="glyphicon glyphicon-search"></span>&nbsp;{{trans('product.search')}}
								</button>
							</div>
							<div class="col-lg-9" style="padding: 0; margin: 0;">
								<input type="text" name="q" class="form-control" placeholder="<?php echo trans('product.search_here');?>"
									style="border-radius: 0; border: none; border-left: 1px solid #ddd;" />
							</div>
						</div>
						<div class="col-lg-4" style="margin: 0; padding: 0;">
							<div class="col-lg-6 pull-right" style="margin: 0; padding: 0;">
								<div class="btn-group col-lg-12" style="padding: 0; margin: 0;">
									<select name="location">
										<option value="0">{{trans('product.location')}}</option>
										@foreach($locations as $location)
											<option value="{{$location->province_id}}">
												<?php echo $location->{'province_name_'.Session::get('lang')}; ?>
											</option>
										@endforeach;
									</select>
								</div>
							</div>
	
							<div class="col-lg-6" style="margin: 0; padding: 0;">
								<div class="btn-group col-lg-12 " style="margin: 0; padding: 0;">
									<select name="type">
										<option value="1">Products</option>
										<option value="2">Buyers</option>
										<option value="3">Suppliers</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
	</header>