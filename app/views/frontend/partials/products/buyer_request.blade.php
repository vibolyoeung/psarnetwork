<br />
<div class="category-tab feature-ad lastest-post">
	<!--recommended_items-->
	<ul class="nav nav-tabs">
		<li><strong>Buyer Requested Products</strong> &nbsp;&nbsp;&nbsp;
			&frasl;</li>
		<li>Products : <span class="number-display">25</span></li>
		<li>Stores :<span class="number-display">25</span></li>
		<li>Market :<span class="number-display">25</span></li>
		<li>Companies :<span class="number-display">25</span></li>
		<li>Home Shop :<span class="number-display">25</span></li>
		<li>Individual : <span class="number-display">25</span></li>
		<li>View :<span class="number-display">25</span></li>
	</ul>
	<div id="monthly-pay-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner">
			<?php
			$buyerProducts = Product::findBuyerProducts ();
			?>
			<?php
			$buyPro = 1;
			?>
			<div class="item active">
				@foreach($buyerProducts as $buyerProduct)
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#" data-toggle="modal" data-target="#myModal"
									onclick="popupDetails.add_popup_detail({{$buyerProduct->id}});">
									<img
									src="{{Config::get('app.url')}}/upload/product/thumb/{{$buyerProduct->thumbnail}}"
									alt="" />
								</a>
								<h2>$ {{$buyerProduct->price}}</h2>
								<p><?php echo substr($buyerProduct->title,0,20)?></p>
								<a data-toggle="modal" data-target="#myModal"
									onclick="popupDetails.add_popup_detail({{$buyerProduct->id}});">View
									Details</a>
							</div>
							<img
								src="{{Config::get('app.url')}}/frontend/images/home/sale.png"
								class="new" alt="" />
						</div>
					</div>
				</div>
				<?php
				if ($buyPro >= 4 && $buyPro % 4 == 0) {
					echo '</div><div class="item"> ';
				}
				$buyPro ++;
				?>
			@endforeach
			</div>
		</div>
		<a class="left recommended-item-control"
			href="#monthly-pay-item-carousel" data-slide="prev"> <i
			class="fa fa-angle-left"></i>
		</a> <a class="right recommended-item-control"
			href="#monthly-pay-item-carousel" data-slide="next"> <i
			class="fa fa-angle-right"></i>
		</a>
	</div>
</div>