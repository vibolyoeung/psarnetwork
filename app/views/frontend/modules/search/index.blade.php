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
	<div class="col-lg-10" style="padding-left:0;">
		<div class="features_items">
			<!-- ============Slider end here========= -->

			@include('frontend.partials.products.search')

			<div class="features_items">
				<div class="category-tab lastest-post">
					<div class="col-sm-12" style="padding:0;">
						<ul class="nav nav-tabs" style="background-color:#ddd;">
							<li><strong>View As : </strong></li>
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
			if(count($products) > 0){
			?>
				@foreach($products as $product)
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
</div>
@include('frontend.partials.categories.right')
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

