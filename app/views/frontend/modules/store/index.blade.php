@extends('frontend.modules.store.layout.layout') @section('title')
{{($dataStore->title_en ? $dataStore->{'title_'.Session::get('lang')} :
'Welcome to my page')}} @endsection @section('description')Buy, Sell
@endsection @section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{Config::get('app.url')}}">Home</a></li>
	<li><a href="#">Library</a></li>
	<li class="active">Data</li>
</ol>
@endsection
@section('content')
<?php
date_default_timezone_set ( 'Asia/Phnom_Penh' );
$currentDate = date ( 'Y-m-d' );

if(!empty($dataStore->sto_url)) {
	$userHome = @Config::get('app.url').'page/'.$dataStore->sto_url;
} else {
	$userHome = @Config::get('app.url').'page/store-'.$dataStore->id;
}
?>
<div class="col-sm-8">
	<div class="category-tab lastest-post">

		<!-- ============Slider end here========= -->
		@include('frontend.modules.store.partials.slideshow')
		<!-- end slideshow -->

		<div class="features_items">
			<ul class="nav nav-tabs">
				<li><strong>The latest products</strong> &nbsp;&nbsp;&nbsp; &frasl;</li>
				<li>Products : <span class="number-display">{{($dataProduct)?count($dataProduct):''}}</span></li>
			</ul>
		</div>

		<div class="col-lg-12" style="padding: 0;">
            @if(!empty($dataProduct))
                <?php
																// var_dump($dataProduct);
																$i = 1;
																?>
                @foreach($dataProduct as $product)
                @if ($i % 4 == 1)
                    <div class="row">
				@endif
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a
									href="{{$userHome}}/my/detail/{{$product->id}}">
									@if($product->thumbnail) <img
									src="{{Config::get('app.url')}}upload/product/thumb/{{$product->thumbnail}}"
									alt="{{$product->title}}" /> @else <img
									src="{{Config::get('app.url')}}upload/product/thumb/{{$product->thumbnail}}"
									alt="{{$product->title}}" /> @endif
								</a>
								<h2>{{$product->title}}</h2>
								<p>{{$product->price}} $</p>
								<a
									href="{{$userHome}}/my/detail/{{$product->id}}">View
									Details</a>
							</div>
							<img
								src="{{Config::get('app.url')}}/frontend/images/home/sale.png"
								class="new" alt="" />
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
		@endif @endif @if(!empty($banner))
		<div class="col-lg-12" style="padding: 0;">
			@foreach($banner as $ban) @if($ban->ban_position == 'footer')
			@if($ban->ban_enddate >= $currentDate) <a class="banner-link"
				href="{{@$ban->ban_link}}" target="_blank"><img
				src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
				style="width: 100%; max-height: 90px;" /></a> @endif @endif
			@endforeach
		</div>
		@endif
	</div>
</div>
{{$dataProduct->links()}} @if(!empty($widtget)) @foreach($widtget as
$showWidtget) @if($showWidtget->status) @if($showWidtget->title == 'New Arrival Products')
@include('frontend.modules.store.partials.widget-new-arrival')
@elseif($showWidtget->title == 'Hot Promotion Products')
@include('frontend.modules.store.partials.widget-hot-promote')
@elseif($showWidtget->title == 'Secondhand Products')
@include('frontend.modules.store.partials.widget-secondhand')
@elseif($showWidtget->title == 'Monthly Pay  Products')
@include('frontend.modules.store.partials.widget-monthly-pay')
@elseif($showWidtget->title == 'Urgent Sale') @endif @endif @endforeach
@endif
</div>
@endsection 
@section('left')
@if (! empty ( $toolView ))
	@foreach ( $toolView as $tool )
		@if($tool->type == 'tool_memeber_status' && $tool->status == 1)
			@include('frontend.modules.store.partials.slidebar.memeber_status')
		@endif
	@endforeach
@endif


@if(!empty($banner)) @foreach($banner as $ban) @if($ban->ban_position ==
'ls') @if($ban->ban_enddate >= $currentDate)
<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
	src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
	style="width: 100%;" /></a>
@endif
            @endif
        @endforeach
    @endif
@endsection

@section('right')
<?php $memberTool = array ();?>
@if (! empty ( $toolView ))
	@foreach ( $toolView as $tool )
		@if($tool->type == 'tool_visitor_info' && $tool->status == 1)
		@include('frontend.modules.store.partials.slidebar.tool_visitor')
		@endif
	@endforeach
@endif

@if(!empty($banner))
    @foreach($banner as $ban)
        @if($ban->ban_position == 'rs')
            @if($ban->ban_enddate >= $currentDate)
<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
	src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
	style="width: 100%;" /></a>
@endif @endif @endforeach @endif @endsection
