<?php
date_default_timezone_set ( 'Asia/Phnom_Penh' );
$currentDate = date ( 'Y-m-d' );

$userClass = new User ();
$userData = $userClass->getUser($dataStore->user_id);
$currentUserType =$userData->result->account_type;
if(!empty($dataStore->sto_url)) {
	$userHome = @Config::get('app.url').$dataStore->sto_url;
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
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li>Product Found : <span class="number-display"><?php echo count($dataProduct);?></span></li>
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
     		         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class=" text-center page-product-list">
                                    <a href="{{$userHome}}/my/detail/{{$product->id}}">
                                        <?php
                                        if($product->thumbnail){
                                            echo '<img src="/image/phpthumb/'.$product->thumbnail.'?p=product&amp;h=120&amp;w=160" />';
                                        }else{
                                            echo '<img src="/image/phpthumb/No_image_available.jpg?p=product&amp;h=120&amp;w=160" />';
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
            @else
            <div class="col-sm-12">
                <h2>{{trans('product.user_product_not_found')}}</h2>
            </div>
            @endif
		</div>
	</div>
    {{$dataProduct->links()}}
@endsection

@section('left')
<?php
	if (!empty($toolView )){
		foreach ($toolView as $tool ){
			if($tool->type == 'tool_memeber_status' && $tool->status == 1){
				include('frontend.modules.store.partials.slidebar.memeber_status');
			}
		}
	}
?>
	@if(!empty($banner)) 
		@foreach($banner as $ban) 
			@if($ban->ban_position == 'ls') 
				@if($ban->ban_enddate >= $currentDate)
    				<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
        				src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
        				style="width: 100%;" />
        			</a>
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