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
@include('frontend.partials.left-supermarket')
	<div class="col-lg-10" style="">
		<div class="col-lg-2 pull-right" style="padding:0;">
			@include('frontend.partials.categories.right')
		</div>
		<div class="col-lg-10"  style="padding-left:0;">
			<div>
				<!-- ============Slider end here========= -->
				@include('frontend.partials.products.search')
				<div class="row">
					<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
					<?php 
					if(count($listProductSupermarket) > 0){
					?>
						@foreach($listProductSupermarket as $product)
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="#" data-toggle="modal" data-target="#myModal"
												onclick="popupDetails.add_popup_detail(<?php echo $product->id; ?>)">
												<?php 
												if($product->thumbnail){
													echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$product->thumbnail.'?p=product&amp;h=130&amp;w=160" />';
												}else{
													echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=120" />';
												}
												?>
											</a>
											<div class="price">$ {{$product->price}}</div>
											<center>
												<a href="{{Config::get('app.url')}}product/details/{{$product->id}}">
													<?php echo substr($product->title,0,20)?>
												</a>
											</center>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					<?php 
						}else{
							echo '<h4><center style="color:red;">Product not found!</center></h4>';
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('frontend.partials.products.popup_details')
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/jquery.js"></script>
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>


