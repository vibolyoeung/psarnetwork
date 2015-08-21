<?php
$thisProduct = new Product();
$whereNewArr = array(
    'user_id'=> $dataStore->user_id,
	'pro_condition_id'=> 1
);
$PayMonthly = $thisProduct->listAllProductsByOwnStore($whereNewArr);
?>
<div class="category-tab Hot-Promotion">
	<div class="features_items">
		<ul class="nav nav-tabs">
			<li><strong>New Arrival Products</strong>&nbsp;&frasl;</li>
			<li>Products : <span class="number-display">25</span></li>
		</ul>
		<div class="col-lg-12" style="padding:0;">
		@if(count($PayMonthly)>1)
                <?php
                //var_dump($dataProduct);
                 $i=1;?>
                @foreach($PayMonthly as $productNewArr)
                @if ($i % 4 == 1)
                    <div class="row">
                @endif
     			<div class="col-sm-3">
    				<div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="productinfo text-center">
    							<a href="{{$userHome}}/my/detail/{{$productNewArr->id}}">
                                    @if($productNewArr->thumbnail)
    								    <img src="{{Config::get('app.url')}}upload/product/thumb/{{$productNewArr->thumbnail}}" alt="{{$productNewArr->title}}" />
                                    @else
                                        <img src="{{Config::get('app.url')}}upload/product/thumb/{{$productNewArr->thumbnail}}" alt="{{$productNewArr->title}}" />
                                    @endif
    							</a>
    							<h2>{{$productNewArr->title}}</h2>
    							<p>{{$productNewArr->price}} $</p>
    							<a href="{{$userHome}}/my/detail/{{$productNewArr->id}}">View Details</a>
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