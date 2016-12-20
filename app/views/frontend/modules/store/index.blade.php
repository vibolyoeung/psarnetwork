<?php
date_default_timezone_set ( 'Asia/Phnom_Penh' );
$currentDate = date ( 'Y-m-d' );

$userClass = new User ();
$userData = $userClass->getUser($dataStore->user_id);
$currentUserType =$userData->result->account_type;
if(!empty($dataStore->sto_url)) {
    $userHome = @Config::get('app.url').''.$dataStore->sto_url;
} else {
    $userHome = @Config::get('app.url').'store-'.$dataStore->id;
}
function rm($article, $char) {
    $article = preg_replace ( "/<img[^>]+\>/i", "(image) ", $article );
    if (strlen ( $article ) > $char) {
        return substr ( $article, 0, $char ) . '...';
    } else
        return $article;
}
?>
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
    <div class="category-tab lastest-post">
    @if($currentUserType == 2)
        <!-- ============Slider end here========= -->
        @include('frontend.modules.store.partials.slideshow')
        <!-- end slideshow -->
    @endif
        <div class="features_items">
            <ul class="nav nav-tabs">
                <li><strong>{{trans('product.latest_product')}}</strong> &nbsp;&nbsp;&nbsp; &frasl;</li>
                <li>Products : <span class="number-display">{{($dataProduct)?count($dataProduct):''}}</span></li>
            </ul>
        </div>

        <div class="col-lg-12" style="padding: 0;">
                <?php
                if(count($dataProduct)){
                //echo count($dataProduct);
                $i = 1;
            	?>
                @foreach($dataProduct as $product)
                @if ($i % 4 == 1)
                    <div class="row">
                @endif

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center page-product-list">
                                <a href="{{$userHome}}/my/detail/{{$product->id}}">
                                    <?php
                                    if($product->thumbnail){
                                        echo '<img src="image/phpthumb/'.$product->thumbnail.'?p=product&amp;h=100&amp;w=135" />';
                                    }else{
                                        echo '<img src="image/phpthumb/No_image_available.jpg?p=product&amp;h=100&amp;w=135" />';
                                    }
                                    ?>
                                </a>
                                <center>
                                    <h5>
                                        <a href="{{$userHome}}/my/detail/{{$product->id}}"><?php echo str_limit($product->title,$limit = 10, $end = '...')?></a>
                                    </h5>
                                    <strong class="price" style='color:red;'>$ {{$product->price}}</strong>
                                </center>
                            </div>
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
       <?php 
		}else{
			echo 'No product found!';
		}
	   ?>
       @if(!empty($banner))
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
@if($currentUserType == 2)
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
@endif
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
    <!-- In case interprice user -->
    @if($currentUserType == 2)
        {{ App::make('FePageController')->getFeAds(6, 6, 3) }}
    @else
        {{ App::make('FePageController')->getFeAds(7, 6, 3) }}
    @endif
@endsection

@section('right')
    @include('frontend.modules.store.partials.slidebar.fb_like')
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
                @endif
            @endif
        @endforeach
    @endif
    <!-- In case interprice user -->
    @if($currentUserType == 2)
        {{ App::make('FePageController')->getFeAds(6, 7, 3) }}
    @else
        {{ App::make('FePageController')->getFeAds(7, 7, 3) }}
    @endif
@endsection
