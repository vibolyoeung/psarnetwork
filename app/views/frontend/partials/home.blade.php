@extends('frontend.layout') @section('title') Home @endsection
@section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{Config::get('app.url')}}">Home</a></li>
	<li><a href="#">Library</a></li>
	<li class="active">Data</li>
</ol>
@endsection
@section('content')
{{ App::make('FePageController')->mainCategory() }}
<div class="col-lg-10">@include('frontend.partials.slider')</div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 pull-right">
	
	<!--/category-tab-->
	<div class="category-tab feature-ad lastest-post  product_wrapper">
		<!--recommended_items-->
			<div class="col-lg-12" style="padding: 0;">
				@include('frontend.partials.products.homepage_adv')
				@include('frontend.partials.products.latest')
				@include('frontend.partials.products.popular')
				@include('frontend.partials.products.hot_promotion')
				@include('frontend.partials.products.new_arrival')
				@include('frontend.partials.products.monthly_pay')
				@include('frontend.partials.products.second_hand')
				@include('frontend.partials.products.buyer_request')
			</div>
	</div>
	@include('frontend.partials.products.popup_details')
</div>
</div>
@endsection
@section('client_location')
@include('frontend.partials.client_location')
@endsection
{{HTML::script('frontend/js/jquery.js')}}
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
	jQuery(document).ready(function(){
		jQuery("#menu_toogle").css('cursor','pointer');
		jQuery("#menu_toogle").click(function(){
			jQuery(".categories_menu").toggle("slow");
		});
	});
</script>

