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
		@if($SlideshowConfig)
		<!-- slideshow -->
		<div id="carousel-home" class="carousel slide" data-ride="carousel"
			style="margin-top: 2px;">
			<!-- Indicators -->
			<ol class="carousel-indicators">
          
          @if(!empty($banner))
                <?php $i=0;?>
                @foreach($banner as $ban)
                    @if($ban->ban_position == 'top-c')
                        @if($ban->ban_enddate >= $currentDate)
                        <li data-target="#carousel-home"
					data-slide-to="{{$i}}" class="{{$i==0 ? 'active':''}}"></li>
                        <?php $i++;?>
                     @endif
                    @endif
                @endforeach
            @endif
            @if(empty(@$banner[0]->ban_position == 'top-c'))
            	<li data-target="#carousel-home" data-slide-to="0"
					class="active"></li>
				<li data-target="#carousel-home" data-slide-to="1" class=""></li>
				<li data-target="#carousel-home" data-slide-to="1" class=""></li>
				@endif
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
          @if(!empty($banner))
                <?php $i=0;?>
                @foreach($banner as $ban)
                    @if($ban->ban_position == 'top-c')
                        @if($ban->ban_enddate >= $currentDate)
                        <div class="item {{$i==0 ? 'active':''}}">
					<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
						src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
                        <?php $i++;?>
                        @endif
                    @endif
                @endforeach
            @endif
            
            @if(empty(@$banner[0]->ban_position == 'top-c'))
            <div class="item active">
					<a class="banner-link" href="#"><img
						src="https://placeholdit.imgix.net/~text?txtsize=60&txt=[1]+750+x+200&w=750&h=200"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
				<div class="item">
					<a class="banner-link" href="#"><img
						src="https://placeholdit.imgix.net/~text?txtsize=60&txt=[2]+750+x+200&w=750&h=200"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
				<div class="item">
					<a class="banner-link" href="#"><img
						src="https://placeholdit.imgix.net/~text?txtsize=60&txt=[3]+750+x+200&w=750&h=200"
						style="width: 100%; max-height: 250px;" /></a>
					<div class="carousel-caption">...</div>
				</div>
				@endif
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-home" role="button"
				data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
				aria-hidden="true"></span> <span class="sr-only">Previous</span>
			</a> <a class="right carousel-control" href="#carousel-home"
				role="button" data-slide="next"> <span
				class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		@endif
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
@endsection @section('left')
@include('frontend.modules.store.partials.slidebar.visitor_counter')

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
<?php
$memberTool = array ();
if (! empty ( $toolView )) :
	foreach ( $toolView as $tool ) :
		if ($tool->type == 'tool_memeber_status' && $tool->status == 1) :
			?>
            @include('frontend.modules.store.partials.slidebar.left_product_link')
        
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
