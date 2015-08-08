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
	<div class="col-lg-10" style="padding-right:%;">
		<div class="col-lg-2 pull-right" style="padding:0;">
			@include('frontend.partials.categories.right')
		</div>
		<div class="col-lg-10"  style="padding-left:0;">
			<div>
				<!-- ============Slider end here========= -->
				@include('frontend.partials.products.search')
				<div class="features_items">
					<div class="category-tab lastest-post">
						<div style="padding:0;">
							<ul class="nav nav-tabs" style="background-color:#ddd;">
								<li class="col-lg-2 pull-right">
									<select id="disply-number" name="displayNumber" class="form-control form-select-khmerabba">
										<option value="0" selected="selected">-Select-</option>
										<option value="20">20</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="150">150</option>
										<option value="200">200</option>
									</select>
								</li>
								<li>
									<strong>View As : </strong>
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
											<strong class="media-heading">
												<a href="{{Config::get('app.url')}}product/details/{{$product->id}}">
												{{substr($product->title,0,14)}}
												</a>
												
											</strong>
											<p>
												{{substr($product->description,0,30)}}
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
				<div class="col-lg-12">
								<div id="pagination">
									{{$products->links()}}
								</div>
							</div>
			</div>
		</div>
	</div>

@endsection
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>