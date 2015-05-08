@extends('frontend.layout') @section('title') Home @endsection
@section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{Config::get('app.url')}}">Home</a></li>
	<li><a href="#">Library</a></li>
	<li class="active">Data</li>
</ol>
@endsection
@section('content')
@include('frontend.partials.left')
<div class="col-lg-11">@include('frontend.partials.slider')</div>
<div class="col-sm-10">
	@include('frontend.partials.products.latest')
	@include('frontend.partials.products.popular') <br />
	<!--/category-tab-->
	<div class="category-tab feature-ad lastest-post">
		<!--recommended_items-->
		<div class="col-lg-12">
			<div class="col-lg-1 pull-right"
				style="border: 0px solid #ddd; padding: 0;">
				<!-- type:homepage, position: right small, limit -->
				{{ App::make('FePageController')->getFeAds(1, 7, 3) }}
			</div>

			<div class="col-lg-1 pull-left"
				style="border: 0px solid #ddd; padding: 0;">
				<!-- type:homepage, position: left small, limit -->
				{{ App::make('FePageController')->getFeAds(1, 6, 3) }}

			</div>

			<div class="col-lg-10">
				@include('frontend.partials.products.hot_promotion')
				@include('frontend.partials.products.new_arrival')
				@include('frontend.partials.products.monthly_pay')
				@include('frontend.partials.products.buyer_request')
				@include('frontend.partials.products.second_hand')
			</div>

		</div>
	</div>
	@include('frontend.partials.products.popup_details')
</div>
</div>
@include('frontend.partials.right')
@endsection
@section('client_location')
@include('frontend.partials.client_location')
@endsection
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

