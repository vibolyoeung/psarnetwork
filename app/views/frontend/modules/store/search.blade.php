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
<div class="col-sm-8">
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
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="padding:0;">
            @if(count($dataProduct)>0)
                <?php $i=1;?>
                @foreach($dataProduct as $product)
                @if ($i % 4 == 1)
                    <div class="row">
                @endif
     			<div class="col-sm-3">
    				<div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="productinfo text-center">
    							<a href="{{Config::get('app.url')}}page/{{$product->store_id}}/my/detail/{{$product->id}}">
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
                @if ($i % 4 == 0)
                    </div>
                @endif
                <?php $i++;?>             
                @endforeach
                @if ($i % 4 != 1)
                    </div>
                @endif
            @else
            <div class="col-sm-12">
                <h2>{{trans('product.user_product_not_found')}}</h2>
            </div>
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
<?php
$memberTool = array ();
if (! empty ( $toolView )) :
	foreach ( $toolView as $tool ) :
		if ($tool->type == 'tool_memeber_status' && $tool->status == 1) :
			?>
            @include('frontend.modules.store.partials.slidebar.visitor_counter')
        
		<?php 
        endif;
	endforeach
	;

endif;
?>
@if(!empty($banner))
    @foreach($banner as $ban)
        @if($ban->ban_position == 'rs')
            @if($ban->ban_enddate >= $currentDate)
<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
	src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
	style="width: 100%;" /></a>
@endif @endif @endforeach @endif @endsection