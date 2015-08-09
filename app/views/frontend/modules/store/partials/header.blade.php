<?php
$userOption = json_decode($dataStore->sto_value);
$userLayout = @$userOption->layout;
if($userLayout) {
    $userLayout = $userLayout;
} else {
    $userLayout = @Config::get('constants.LAYOUT')[0]['stylesheet'];
}
 ?>
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
        {{HTML::style('frontend/css/price-range.css')}}
        {{HTML::style('frontend/css/animate.css')}}
        {{HTML::style('frontend/css/bootstrap.min.css')}}
        {{HTML::style('frontend/css/responsive.css')}}
        {{HTML::style('frontend/css/main-layout-user.css')}}
        {{HTML::style('frontend/css/member/member.css')}}
        {{HTML::style('frontend/css/layout.css')}}
        {{HTML::script('frontend/js/jquery.js')}}
        {{HTML::style('frontend/css/member/ddmenu.css')}}
        {{HTML::script('frontend/js/member/ddmenu.js')}}
        <link media="all" type="text/css" rel="stylesheet" href="{{URL::to('frontend/css')}}/{{$userLayout}}"/>
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
        <div class="container" style="padding-left: 0;padding-right: 0;">
            <div class="container-fluid top-menu">
                	<div class="col-lg-3 col-md-4 col-sm-12">
    						<a class="store-logo" href="{{$userHome}}">
                            @if($dataStore->image)
                                <img src="{{Config::get('app.url')}}{{'upload/store/'.$dataStore->image}}" class="storeLogo"/>
                            @else
                                <h1 class="header-right"><a href="{{$userHome}}">{{($dataStore->title_en ? $dataStore->{'title_'.Session::get('lang')} : 'Welcome to my page')}}</a></h1>
                            @endif
                            <a>
    				</div>
    				
    				<div class="col-lg-9 col-md-8 col-sm-12">
    				    @if($dataStore->sto_banner)
                            <img src="{{Config::get('app.url')}}{{'upload/store/'.$dataStore->sto_banner}}" class="storeBanner"/>
                        @endif
                    </div>
                </div>
			</div>