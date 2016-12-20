<!doctype html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="@yield('description')">
	<meta name="author" content="Khmer abba">
	<meta content='no-cache' http-equiv='cache-control'/>
	<meta content='no-cache' http-equiv='pragma'/>
    @if ($productdetails !== null)
        <?php
            $currentUrl = trim("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            $images = json_decode($productdetails->pictures,true);
            $image = trim(Config::get('app.url') . 'image/phpthumb/' . $images[0]['pic'] . '?p=product&amp;h=250&amp;w=450"');
        ?>
        <meta property="og:url" content="{{$currentUrl}}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{$productdetails->title}}" />
        <meta property="og:description" content="{{strip_tags($productdetails->description)}}" />
        <meta property="og:image" content="{{$image}}" />
    @endif
    {{HTML::style('/frontend/js/carouselengine/initcarousel-1.css')}}
	{{HTML::style('/frontend/autocomplete/css/styles.css')}}
	{{HTML::style('/frontend/css/font-awesome.min.css')}}
	{{HTML::style('/frontend/css/bootstrap-datepicker.min.css')}}
	{{HTML::style('/frontend/css/prettyPhoto.css')}}
	{{HTML::style('/frontend/css/colorbox.css')}}
	{{HTML::style('/frontend/css/animate.css')}}
	{{HTML::style('/frontend/css/bootstrap.min.css')}}
	{{HTML::style('/backend/css/jquery-ui.css')}}
	{{HTML::style('/frontend/css/responsive.css')}}
	{{HTML::style('/frontend/css/layout.css')}}
	{{HTML::style('/frontend/css/main.css')}}
	
<!--[if lt IE 9]>
                {{HTML::script('frontend/js/html5shiv.js')}}
                {{HTML::script('frontend/js/respond.min.js')}}
                <![endif]-->
                <link type="image/x-icon" rel="icon"
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
            		js = d.createElement(s); js.id = id;
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
            					<div class="col-xs-6 col-sm-3">
                                                <div class="hidden-lg hidden-md hidden-sm">
                                                      <a href="{{Config::get('app.url')}}">
                                                            <img
                                                            src="{{Config::get('app.url')}}frontend/images/Responsive-logo.png"
                                                            class="img-responsive" />
                                                      </a>
                                                </div>
            						<div class="contactinfo hidden-xs">
            							<ul class="nav nav-pills">
            								<li class="facebook-like hidden-xs">
            									<div class="fb-like" data-href="https://www.facebook.com/khmerabba?ref=hl" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
            								</li>
            							</ul>
            						</div>
            					</div>
                                          <div class="language-bar col-xs-6 col-sm-3 hidden-lg hidden-md hidden-sm">
                                                <a href="{{URL::current()}}?lang=en"> <img
                                                      src="{{Config::get('app.url')}}/frontend/images/en.png" alt=""
                                                      title="" />&nbsp;{{trans('product.english')}}
                                                </a>
                                                <a href="{{URL::current()}}?lang=km"> <img
                                                      src="{{Config::get('app.url')}}/frontend/images/km.png" alt=""
                                                      title="" />&nbsp;{{trans('product.khmer')}}
                                                </a>
                                          </div>
            					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 hidden-xs">
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
            							&nbsp;&nbsp;
            							<div class="language-bar">
            								<a href="{{URL::current()}}?lang=en"> <img
            									src="{{Config::get('app.url')}}/frontend/images/en.png" alt=""
            									title="" />&nbsp;{{trans('product.english')}}
            								</a>
            								<a href="{{URL::current()}}?lang=km"> <img
            									src="{{Config::get('app.url')}}/frontend/images/km.png" alt=""
            									title="" />&nbsp;{{trans('product.khmer')}}
            								</a>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>

            		<div class="container-fluid top-menu">
            			<div class="col-lg-12 top_promotion">
            				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 hidden-sm hidden-xs">
            					<a href="{{Config::get('app.url')}}">
            						<img
            						src="{{Config::get('app.url')}}frontend/images/khmerabba_logo.png"
            						class="img-responsive" />
            					</a>
            				</div>
            				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
            					<div class="col-lg-12" id="form-search" style="padding:0;">
            						{{
            						Form::open(
            						array(
            						'url'=>'fe/search',
            						'method'=>'get'
            						)
            						)
            					}}
            					<div class="col-lg-12 search-bar">
            						<div class="col-lg-4 col-md-3 col-sm-3 col-xs-3" style="margin: 0; padding: 0;">
            							<div class="btn-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0; margin: 0;">
            								<select name="location">
            									<option value="0">{{trans('product.location')}}</option>
            									@foreach($locations as $location)
            									<?php $searched_province_id = Request::get('location');?>
            									<option value="{{$location->province_id}}"
            										<?php echo ($searched_province_id == $location->province_id)?'selected':''?>
            										>
            										<?php echo $location->{'province_name_'.Session::get('lang')}; ?>
            									</option>
            									@endforeach;
            								</select>
            							</div>
            						</div>
            						<div class="col-lg-8 col-md-9 col-sm-9 col-xs-9" style="padding: 0; margin: 0;">
            							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8" style="padding: 0; margin: 0;">
            								<input type="text" name="q" class="form-control" id="autocomplete-dynamic" placeholder="<?php echo trans('product.search_here');?>"
            								style="border-radius: 0; border: none; border-left: 1px solid #ddd;color:#000;"
            								value="<?php $searched_word = Request::get('q');echo $searched_word;?>"
            								/>
            							</div>
            							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4" style="padding: 0; margin: 0;">
            								<button type="submit"
            								class="btn btn-warning col-lg-12 col-md-12 col-sm-12 col-xs-12"
            								style="border-radius: 0;">
            								<span class="glyphicon glyphicon-search"></span>&nbsp;{{trans('product.search')}}
            							</button>
            						</div>
            					</div>
            				</div>
            				{{Form::close()}}
            			</div>
            		</div>
            		<!--=========Member login and register here! ===========-->
            		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 member_ship_home">
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
            			<ul class="hidden-sm hidden-xs nav navbar-nav front-loggedin">
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
            			<ul class="hidden-sm hidden-xs nav navbar-nav front-loggedin <?php echo !Session::get('currentUserId')?'pull-right':'';?>">
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
            									{{HTML::image("image/phpthumb/$noticproduct->thumbnail?p=product&amp;h=80&amp;w=110",$noticproduct->title)}}
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
            	</div>
            </header>
