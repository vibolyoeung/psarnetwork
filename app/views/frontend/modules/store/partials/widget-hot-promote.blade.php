<?php
$thisProduct = new Product();
$whereHotPromote = array(
    'user_id'=> $dataStore->user_id,
    'pro_transfer_type_id'=> 5
);
$PayMonthly = $thisProduct->listAllProductsByOwnStore($whereHotPromote);
?>
<div class="category-tab Hot-Promotion">
	<div class="features_items">
		<ul class="nav nav-tabs">
			<li><strong>Hot Promotion Products</strong>&nbsp;&frasl;</li>
			<li>Products : <span class="number-display">25</span></li>
		</ul>
		<div class="col-lg-12" style="padding:0;">
		@if(count($PayMonthly)>1)
                <?php
                //var_dump($dataProduct);
                 $i=1;?>
                @foreach($PayMonthly as $productHotPromote)
                @if ($i % 4 == 1)
                    <div class="row">
                @endif
     			<div class="col-sm-3">
    				<div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="productinfo text-center">
    							<a href="{{$userHome}}/my/detail/{{$productHotPromote->id}}">
                                    @if($product->thumbnail)
					{{HTML::image("image/phpthumb/$productHotPromote->thumbnail?p=product&amp;h=150&amp;w=150",$productHotPromote->title,array('class'
						=> 'img-rounded','width'=>'150'))}}
                                    @else
                                        {{HTML::image("image/phpthumb/No_image_available.jpg?p=1&amp;h=150&amp;w=150",$productHotPromote->title,array('class'
                                        => 'img-rounded','width'=>'150'))}}
                                    @endif
    							</a>
    							<h2>{{$productHotPromote->title}}</h2>
    							<p>{{$productHotPromote->price}} $</p>
    							<a href="{{$userHome}}/my/detail/{{$productHotPromote->id}}">View Details</a>
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