<?php
$buyerProducts = Product::findBuyerProducts ();
if(count($buyerProducts) > 0){
?>
			<br />
<div class="category-tab feature-ad lastest-post" style="padding: 0;">
	<!--recommended_items-->
	<ul class="nav nav-tabs">
		<li><strong>Buyer Requested Products</strong> &nbsp;&nbsp;&nbsp;
			&frasl;</li>
		<li>Products : <span class="number-display">25</span></li>
	</ul>
	<div id="monthly-pay-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
					@foreach($buyerProducts as $buyerProduct)
						<div class="col-sm-2">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="#" data-toggle="modal" data-target="#myModal"
											onclick="popupDetails.add_popup_detail(<?php echo $buyerProduct->id; ?>)">
											<img
											src="{{Config::get('app.url')}}/upload/product/thumb/{{$buyerProduct->thumbnail}}"
											alt="" />
										</a>
										<center>
											<h5>
												<a href="{{Config::get('app.url')}}product/details/{{$buyerProduct->id}}"><?php echo substr($buyerProduct->title,0,20)?></a>
											</h5>
											<strong class="price">$ {{$buyerProduct->price}}</strong>
										</center>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>