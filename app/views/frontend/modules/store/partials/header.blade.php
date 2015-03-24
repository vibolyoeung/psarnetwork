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
        {{HTML::style('frontend/css/member/member.css')}}
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
		<header id="header">
        <!--=====Start Header]==============-->
        @include('frontend.modules.store.partials.top-menu')
        <!-- ============End header top here============== -->
            <div class="container-fluid top-menu">
            	<div class="col-lg-4 top_promotion">
            		<div class="col-lg-2">
						<a class="store-logo" href="{{$userHome}}"><img src="{{Config::get('app.url')}}{{($dataStore->image ? 'upload/store/'.$dataStore->image : 'frontend/images/home/partner1.png')}}" class="storeLogo"/><a>
					</div>
				</div>
				
				<div class="col-lg-8">
				    <h1 class="header-right"><a href="{{$userHome}}">{{($dataStore->title_en ? $dataStore->{'title_'.Session::get('lang')} : 'Not set yet')}}</a></h1>
                    </div>
			</div>