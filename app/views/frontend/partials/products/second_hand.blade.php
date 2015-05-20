<?php
	$secondHandProducts = Product::findSecondHandProducts ();
	if(count($secondHandProducts) > 0){
?>
<div class="category-tab feature-ad lastest-post">
	<!--recommended_items-->
	<ul class="nav nav-tabs">
		<li><strong>Second Hand Products</strong> &nbsp;&nbsp;&nbsp; &frasl;</li>
		<li>Products : <span class="number-display">25</span></li>
		<li>Stores :<span class="number-display">25</span></li>
		<li>Market :<span class="number-display">25</span></li>
		<li>Companies :<span class="number-display">25</span></li>
		<li>Home Shop :<span class="number-display">25</span></li>
		<li>Individual : <span class="number-display">25</span></li>
		<li>View :<span class="number-display">25</span></li>
	</ul>
	<div id="second-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div id="detail_product"
				data-get-detail-product-url="{{Config::get('app.url')}}"></div>
			<div class="item active">
				
			<?php
			$secondPro = 1;
			?>
			@foreach($secondHandProducts as $secondHandProduct)
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#"
									onclick="popupDetails.add_popup_detail(<?php echo $secondHandProduct->id; ?>)"
									data-toggle="modal" data-target="#myModal"> <img
									src="{{Config::get('app.url')}}/upload/product/thumb/{{$secondHandProduct->thumbnail}}"
									alt="" />
								</a>
								<h2>$ {{$secondHandProduct->price}}</h2>
								<p><?php echo substr($secondHandProduct->title,0,20)?></p>
								<a data-toggle="modal" data-target="#myModal"
									onclick="popupDetails.add_popup_detail(<?php echo $secondHandProduct -> id;?>)">View
									Details</a>
							</div>
							<img
								src="{{Config::get('app.url')}}/frontend/images/home/sale.png"
								class="new" alt="" />
						</div>
					</div>
				</div>
				<?php
				if ($secondPro >= 4 && $secondPro % 4 == 0) {
					echo '</div><div class="item"> ';
				}
				$secondPro ++;
				?>
			@endforeach
			</div>
		</div>
		<a class="left recommended-item-control" href="#second-carousel"
			data-slide="prev"> <i class="fa fa-angle-left"></i>
		</a> <a class="right recommended-item-control" href="#second-carousel"
			data-slide="next"> <i class="fa fa-angle-right"></i>
		</a>
	</div>
<?php 
	}
?>