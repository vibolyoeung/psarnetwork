<?php
$thisProduct = new Product();
$wherePayMonthly = array(
    'user_id'=> $dataStore->user_id,
    'pro_transfer_type_id'=> 4
);
$PayMonthly = $thisProduct->listAllProductsByOwnStore($wherePayMonthly);
$count = $thisProduct->listAllProductsByOwnStoreCounter($wherePayMonthly);
?>
<div class="category-tab Hot-Promotion">
	<div class="features_items">
		<ul class="nav nav-tabs">
			<li><strong>{{trans('product.monthly_pay_product')}}</strong>&nbsp;&frasl;</li>
			<li>Products : <span class="number-display">{{@$count}}</span></li>
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

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center page-product-list">
                                <a href="{{$userHome}}/my/detail/{{$productMonthly->id}}">
                                    <?php
                                    if($productMonthly->thumbnail){
                                        echo '<img src="image/phpthumb/'.$productMonthly->thumbnail.'?p=product&amp;h=100&amp;w=135" />';
                                    }else{
                                        echo '<img src="image/phpthumb/No_image_available.jpg?p=product&amp;h=100&amp;w=135" />';
                                    }
                                    ?>
                                </a>
                                <center>
                                    <h5>
                                        <a href="{{$userHome}}/my/detail/{{$productMonthly->id}}"><?php echo str_limit($productMonthly->title,$limit = 10, $end = '...')?></a>
                                    </h5>
                                    <strong class="price" style='color:red;'>$ {{$productMonthly->price}}</strong>
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