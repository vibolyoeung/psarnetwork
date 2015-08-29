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
		<meta content='website' property='og:type'/>
		<meta content="@yield('title')" itemprop='name'/>
		
		@if(!empty($dataProductDetail->thumbnail))
		<meta name="title" content="@yield('title')">
		<meta content="@yield('title')" property='og:site_name'/>
		
		<meta property="og:site_name" content="@yield('title')">
      	<meta property="og:url" content="{{Config::get('app.url')}}{{Request::path ()}}">
	    <meta property="og:title" content="@yield('description')">
	    <meta property="og:image" content="{{Config::get('app.url')}}upload/product/{{$dataProductDetail->thumbnail}}">
	    <meta property="og:description" content="@yield('description')">
    
		<meta name="twitter:url" content="{{Config::get('app.url')}}{{Request::path ()}}">
	    <meta name="twitter:title" content="@yield('title')">
	    <meta name="twitter:description" content="@yield('description')">
	    <meta name="twitter:image" content="{{Config::get('app.url')}}upload/product/{{$dataProductDetail->thumbnail}}">
	    <meta content="{{Config::get('app.url')}}upload/product/{{$dataProductDetail->thumbnail}}" itemprop='image'/>
	    <link href="{{Config::get('app.url')}}upload/product/{{$dataProductDetail->thumbnail}}" rel='image_src'/>
	    @else
	    <meta property="og:url"           content="{{Config::get('app.url')}}" />
	    <meta property="og:title"         content="@yield('title')" />
	    <meta property="og:description"   content="@yield('description')" />
		    @if(!empty($dataStore->image))
		    <meta property="og:image"         content="{{Config::get('app.url')}}{{'upload/store/'.$dataStore->image}}" />
		    @endif
	    @endif
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
                		<div id="store-logo">
                            @if($dataStore->image)
                                <a class="store-logo" href="{{$userHome}}">
                                	<img src="{{Config::get('app.url')}}{{'upload/store/'.$dataStore->image}}" class="storeLogo"/>
                                </a>
                            @else
                                <a class="store-logo" href="{{$userHome}}">
                                	<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt={{($dataStore->title_en ? $dataStore->{'title_'.Session::get('lang')} : 'my page')}}&w=300&h=90" class="storeLogo"/>
                                </a>
                            @endif
                            @if(Session::get ( 'currentUserId' ))
                            <button type="button" class="btn btn-primary btn-lg edit-logo" data-toggle="modal" data-target="#editLogo">
							  <i class="icon-pencil"></i> update logo
							</button>
                            @endif
                    	</div>
    				</div>
    				<div class="col-lg-9 col-md-8 col-sm-12">
    					<div id="store-banner-header">
	    					<?php 
	    					$getBanner = new Store ();
	    					$getBannerImage = $getBanner->getStoreBanner(null,array('ban_store_id'=>$dataStore->id,'ban_position'=>'right_header','ban_status' => 1));
	    					$bannerLink = !empty($getBannerImage[0]->ban_link)? $getBannerImage[0]->ban_link : '';
	    					?>
	    				    @if(!empty($getBannerImage[0]))
	                            <a class="store-banner" href="{{$bannerLink}}" target="_blank">
	                            	<img src="{{Config::get('app.url')}}/upload/user-banner/{{$getBannerImage[0]->ban_image}}" class="storeBanner"/>
	                            </a>
	                        @else
	                        	<a class="store-banner" href="#">
	                        	<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=850+x+90&w=850&h=90" class="storeBanner"/>
	                        	</a>
	                        @endif
	                        @if(Session::get ( 'currentUserId' ))
                            <button type="button" class="btn btn-primary btn-lg edit-banner" data-toggle="modal" data-target="#editBanner">
							  <i class="icon-pencil"></i> update banner
							</button>
                            @endif
                        </div>
                    </div>
                </div>
			</div>
			
			@if(Session::get ( 'currentUserId' ))
			{{HTML::script('frontend/js/jquery-upload/jquery.form.js')}}
			<script type="text/javascript">
			var homePage = "{{Config::get('app.url')}}";
			$( document ).ready(function(){
				$('#bannerFile').change(function(){
			        $("#banner-preview").html('<img src="{{Config::get('app.url')}}frontend/images/upload_progress.gif" alt="Uploading...."/>');
			    	$("#imageBanner").ajaxForm({
			            success: function(data) {
			                //console.log(data);
			            var obj = JSON.parse(data);
			                if (!obj.error) {
			                    $('.message-success').show();
			                    $('a.store-banner').html('<img src="{{Config::get('app.url')}}upload/user-banner/' + obj.image + '" style="max-height:90px" class="storeBanner"/>');
			                    $('#editBanner').modal('hide');
			                }
			            }
			        }).submit();
			   	});

				/*logo upload*/
			    $('#logoFile').change(function(){
			        $("#logo-preview").html('<img src="{{Config::get('app.url')}}frontend/images/upload_progress.gif" alt="Uploading...."/>');
			    	$("#imageLogo").ajaxForm({
			            success: function(data) {
			                //console.log(data);
			            var obj = JSON.parse(data);
			                if (!obj.error) {
			                    $('.message-success').show();
			                    $('a.store-logo').html('<img src="{{Config::get('app.url')}}upload/store/' + obj.image + '" style="max-height:90px" class="storeLogo"/>');
			                    $('#editLogo').modal('hide');
			                }
			            }
			        }).submit();
			   	});

				$('#fb_likes').click(function(){
					var bFb = $('#fblikeValue').val();
			        if(bFb) {
			        	$.ajax({
			        		url: homePage + "member/getsubmenu?type=fblike&id=" + bFb,
			        		type: "get",
			        		error: function (request, error) {
			        	        
			        	    },
			        		success: function(data) {
			            	$('.message-success').show();
			            		window.location = "{{$bannerLink}}";
			        		}
			            });
			        }
				});
			   	
			});
			</script>

<!-- Modal -->
<div class="container">
	<div class="modal fade" id="editLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{trans('register.agree_head_Logo')}}</h4>
	      </div>
	      <div class="modal-body">
	        <!-- body -->
	        <form id="imageLogo" method="post" enctype="multipart/form-data" action='{{Config::get('app.url')}}/member/ajaxupload'>
				<div class="form-group">
					<input type="hidden" value="logoupload" name="page" /> <input
						type="file" id="logoFile" name="file" accept="image/*" />
					<p class="help-block">
						{{trans('register.TAB_Your_your_logo_here')}}</p>
				</div>
			</form>
	        <!-- end body -->
	      </div>
	    </div>
	  </div>
	</div>
</div>

<div class="container">
	<div class="modal fade" id="editBanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{trans('register.TAB_Your_banner_header')}}</h4>
	      </div>
	      <div class="modal-body">
	        <!-- body -->
	        <form id="imageBanner" method="post" enctype="multipart/form-data" action='{{Config::get('app.url')}}/member/ajaxupload'>
				<div class="form-group">
					<input type="text" id="addBannerLink"
					class="form-control"
					value="{{@$bannerLink}}"
					placeholder="{{trans('register.banner_link')}}"
					name="link"
					style="display: inline-block;margin-bottom:10px" required />
					<input type="hidden" value="bannerupload" name="page" />
					<input type="file" id="bannerFile" name="file"
						accept="image/*" />
					<p class="help-block">
						{{trans('register.TAB_Your_banner_upload')}}</p>
					
					<button id="btnSaveLink" type="button"
					class="btn btn-default btn-xs pull-right "
					style="margin-top: 5px; margin-bottom: 5px;display:none">Save</button>
				</div>
			</form>
	        <!-- end body -->
	      </div>
	    </div>
	  </div>
	</div>
</div>

			@endif