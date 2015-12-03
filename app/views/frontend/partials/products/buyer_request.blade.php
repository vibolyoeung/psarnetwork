<!-- type:homepage, position: up on buyer request, limit -->
{{ App::make('FePageController')->getHorizontalAds(1, 10, 3) }}
<?php
$buyerProducts = Product::findBuyerProducts ();
if(count($buyerProducts) > 0){
?>
			<br />
<div class="category-tab feature-ad lastest-post" style="padding: 0;">
	<!--recommended_items-->
	<ul class="nav nav-tabs buyer_request">
		<li>{{trans('product.buyer_request_product')}}&nbsp;&frasl;</li>
		<li>Products : <span class="number-display"><?php echo count($buyerProducts)?></span></li>
	</ul>
	<div id="monthly-pay-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner">
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
				@foreach($buyerProducts as $buyerProduct)
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#" data-toggle="modal" data-target="#myModal"
									onclick="popupDetails.add_popup_detail(<?php echo $buyerProduct->id; ?>)">
									<?php 
										if($buyerProduct->thumbnail){
											echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$buyerProduct->thumbnail.'?p=product&amp;h=90&amp;w=120" />';
										}else{
											echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=120" />';
										}
									?>
								</a>
								<a href="{{Config::get('app.url')}}product/details/{{$buyerProduct->id}}"><?php echo str_limit($buyerProduct->title,$limit = 15, $end = '...');?></a>
								<h2>$ {{$buyerProduct->price}}</h2>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
<?php 
}
?>