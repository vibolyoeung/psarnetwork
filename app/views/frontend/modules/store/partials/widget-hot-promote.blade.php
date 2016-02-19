<?php
$thisProduct = new Product();
$whereHotPromote = array(
    'user_id'=> $dataStore->user_id,
    'pro_transfer_type_id'=> 5
);
$PayMonthly = $thisProduct->listAllProductsByOwnStore($whereHotPromote);
$count = $thisProduct->listAllProductsByOwnStoreCounter($whereHotPromote);
?>
<div class="category-tab Hot-Promotion">
	<div class="features_items">
		<ul class="nav nav-tabs">
			<li><strong>{{trans('product.hot_promotion')}}</strong>&nbsp;&frasl;</li>
			<li>Products : <span class="number-display">{{@$count}}</span></li>
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
     		         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center page-product-list">
                                    <a href="{{$userHome}}/my/detail/{{$productSecondHand->id}}">
                                        <?php
                                        if($productSecondHand->thumbnail){
                                            echo '<img src="image/phpthumb/'.$productSecondHand->thumbnail.'?p=product&amp;h=100&amp;w=135" />';
                                        }else{
                                            echo '<img src="image/phpthumb/No_image_available.jpg?p=product&amp;h=100&amp;w=135" />';
                                        }
                                        ?>
                                    </a>
                                    <center>
                                        <h5>
                                            <a href="{{$userHome}}/my/detail/{{$productSecondHand->id}}"><?php echo str_limit($product->title,$limit = 10, $end = '...')?></a>
                                        </h5>
                                        <strong class="price" style='color:red;'>$ {{$productSecondHand->price}}</strong>
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
            <div class="col-lg-12" style="padding:0;">
            <h3>{{trans('store.no_product')}}</h3>
            </div>
            @endif
		</div>
	</div>
</div>      