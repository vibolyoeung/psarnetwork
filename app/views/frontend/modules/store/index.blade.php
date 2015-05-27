@extends('frontend.modules.store.layout.layout')
@section('title')
	Home
@endsection
@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
@endsection
@section('content')
<div class="col-sm-10">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><strong>The latest products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
						<li>Companies :<span class="number-display">25</span></li>
						<li>Home Shop :<span class="number-display">25</span></li>
						<li>Individual : <span class="number-display">25</span></li>
						<li>View :<span class="number-display">25</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="padding:0;">
            @if(!empty($dataProduct))
                @foreach($dataProduct as $product)
     			<div class="col-sm-2">
    				<div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="productinfo text-center">
    							<a href="#" data-toggle="modal" data-target="#myModal">
                                    @if($product->thumbnail)
    								    <img src="{{Config::get('app.url')}}upload/product/thumb/{{$product->thumbnail}}" alt="{{$product->title}}" />
                                    @else
                                        <img src="{{Config::get('app.url')}}upload/product/thumb/{{$product->thumbnail}}" alt="{{$product->title}}" />
                                    @endif
    							</a>
    							<h2>{{$product->title}}</h2>
    							<p>{{$product->price}} $</p>
    							<a href="{{Config::get('app.url')}}page/{{$product->store_id}}/my/detail/{{$product->id}}">View Details</a>
    						</div>
    						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
    					</div>
    				</div>
    			</div>               
                @endforeach
            @endif
		</div>
	</div>
    {{$dataProduct->links()}}
</div>
@endsection
@section('left')
	@include('frontend.modules.store.partials.slidebar.left_product_link')
@endsection
@section('right')
	@include('frontend.modules.store.partials.slidebar.visitor_counter')
@endsection
