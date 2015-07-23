@extends('frontend.layout') 
@section('title') 
Categories 
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li class="active">Data</li>
</ol>
@endsection
@section('content')
@include('frontend.partials.categories.left')
<div class="col-sm-10">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-lg-12">
					<div class="col-lg-2 pull-right" style="padding: 0; margin: 0;">
						<div class="col-lg-3 pull-right" style="padding: 0; margin: 0;">
							<button type="submit"
								class="btn btn-warning pull-right col-lg-12"
								style="border-radius: 0;">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>
					<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
						<select name="location">
							<option value="0">Location</option>
							@foreach($Provinces as $location)
								<option value="{{$location->province_id}}">{{$location->province_name}}</option>
							@endforeach;
						</select>
					</div>
					<div class="btn-group col-lg-2 " style="margin: 0; padding: 0;">
						<select name="type">
							<option value="0">Type</option>
							<option value="1">Products</option>
							<option value="2">Buyers</option>
							<option value="3">Suppliers</option>
						</select>
					</div>
					<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
						<select name="location">
							<option value="0">Transfer Type</option>
							@foreach($transferTypes as $transferType)
								<option value="{{$transferType->ptt_id}}">{{$transferType->name}}</option>
							@endforeach;
						</select>
					</div>
					<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
						<select name="location">
							<option value="0">Condition</option>
							@foreach($conditions as $condition)
								<option value="{{$condition->id}}">{{$condition->name}}</option>
							@endforeach;
						</select>
					</div>
				</div>

				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li>
							<span id="grid_view">Grid View</span> |
							<span id="list_view">List View</span> |
							<span id="social_view">Social View</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
		<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
		<?php 
		if(count($productByCategory) > 0){
		?>
			@foreach($productByCategory as $product)
				<div class="product_list_container">
					<div class="media commnets">
						<a href="{{Config::get('app.url')}}product/details/{{$product->id}}" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}upload/product/thumb/{{$product->thumbnail}}" class="media-object">
						</a>
						
						<div class="media-body">
							<h4 class="media-heading">
								<a href="{{Config::get('app.url')}}product/details/{{$product->id}}">
								{{substr($product->title,0,14)}}
								</a>
								
							</h4>
							<p>
								{{substr($product->description,0,40)}}
							</p>
							<div class="blog-socials">
								<a href="{{Config::get('app.url')}}product/details/{{$product->id}}" class="btn btn-primary">$ {{$product->price}}</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		<?php 
			}else{
				echo '<h3><center style="color:red;">Product not found!</center></h3>';
			}
		?>
		</div>
	</div>
</div>
@include('frontend.partials.categories.right')
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

