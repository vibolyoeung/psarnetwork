<?php
$latestProducts = Product::findPreminumLatest();
if(count($latestProducts) > 0){
?>
<div class="features_items">
	<div class="features_items">
		<div class="category-tab lastest-post">
			<div class="col-sm-12" style="padding: 0;">
				<ul class="nav nav-tabs lastest_product">
					<li>{{trans('product.latest_product')}}&nbsp;&frasl;</li>
					<li>Products : <span class="number-display"><?php echo count($latestProducts)?></span></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
		@foreach($latestProducts as $latestProduct)
		<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<a href="#" data-toggle="modal" data-target="#myModal" onclick="popupDetails.add_popup_detail(<?php echo $latestProduct->id; ?>)">
							<?php
							if($latestProduct->thumbnail){
								echo '<img src="image/phpthumb/'.$latestProduct->thumbnail.'?p=product&amp;h=100&amp;w=135" />';
							}else{
								echo '<img src="image/phpthumb/No_image_available.jpg?p=product&amp;h=100&amp;w=135" />';
							}
							?>
						</a>
						<center>
							<h5>
								<a href="{{Config::get('app.url')}}product/details/{{$latestProduct->id}}"><?php echo str_limit($latestProduct->title,$limit = 10, $end = '...')?></a>
							</h5>
							<strong class="price">$ {{$latestProduct->price}}</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="col-lg-12 center-advertise hidden-xs">
		<!-- type:homepage, position: up on enterprice product, limit -->
		{{ App::make('FePageController')->getHorizontalAds(1, 8, 3) }}
	</div>
</div>
<?php } ?>
{{HTML::script('frontend/js/jquery.js')}}
