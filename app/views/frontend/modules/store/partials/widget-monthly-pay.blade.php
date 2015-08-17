<?php
$thisProduct = new Product();
$wherePayMonthly = array(
    'user_id'=> $dataStore->user_id,
    'pro_transfer_type_id'=> 4
);
$PayMonthly = $thisProduct->listAllProductsByOwnStore($wherePayMonthly);
?>
<div class="category-tab Hot-Promotion">
	<div class="features_items">
		<ul class="nav nav-tabs">
			<li><strong>Monthly Pay  Products</strong>&nbsp;&frasl;</li>
			<li>Products : <span class="number-display">25</span></li>
		</ul>
		<div class="col-lg-12" style="padding:0;">
		@if(count($PayMonthly)>0)
                <?php
                //var_dump($dataProduct);
                 $i=1;?>
                @foreach($PayMonthly as $productMonthly)
                @if ($i % 4 == 1)
                    <div class="row">
                @endif
     			<div class="col-sm-3">
    				<div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="productinfo text-center">
    							<a href="{{Config::get('app.url')}}page/{{$productMonthly->store_id}}/my/detail/{{$productMonthly->id}}">
                                    @if($productMonthly->thumbnail)
    								    <img src="{{Config::get('app.url')}}upload/product/thumb/{{$productMonthly->thumbnail}}" alt="{{$productMonthly->title}}" />
                                    @else
                                        <img src="{{Config::get('app.url')}}upload/product/thumb/{{$productMonthly->thumbnail}}" alt="{{$productMonthly->title}}" />
                                    @endif
    							</a>
    							<h2>{{$productMonthly->title}}</h2>
    							<p>{{$productMonthly->price}} $</p>
    							<a href="{{Config::get('app.url')}}page/{{$productMonthly->store_id}}/my/detail/{{$productMonthly->id}}">View Details</a>
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
            <div class="col-lg-12" style="padding:0;">
            <h3>{{trans('store.no_product')}}</h3>
            </div>
            @endif
		</div>
	</div>
</div>