<?php
$newProducts = Product::findNewProducts ();
if(count($newProducts) > 0){
?>
<div class="category-tab feature-ad lastest-post">
	<!--recommended_items-->
	<ul class="nav nav-tabs new_product">
		<li><strong>New Products</strong> &nbsp;&nbsp;&nbsp; &frasl;</li>
		<li>Products : <span class="number-display">25</span></li>
		<li>Stores :<span class="number-display">25</span></li>
		<li>Market :<span class="number-display">25</span></li>
		<li>Companies :<span class="number-display">25</span></li>
		<li>Home Shop :<span class="number-display">25</span></li>
		<li>Individual : <span class="number-display">25</span></li>
		<li>View :<span class="number-display">25</span></li>
	</ul>
	<div id="hotpromotion-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner">
			<?php
			$newPro = 1;
			?>
			<div class="item active">
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
				@foreach($newProducts as $newProduct)
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#" data-toggle="modal" data-target="#myModal"
									onclick="popupDetails.add_popup_detail(<?php echo $newProduct->id; ?>)">
									<img
									src="{{Config::get('app.url')}}/upload/product/thumb/{{$newProduct->thumbnail}}"
									alt="" />
								</a>
								<h2>$ {{$newProduct->price}}</h2>
								<p><?php echo substr($newProduct->title,0,20)?></p>
								<a href="{{Config::get('app.url')}}/product/details/{{$newProduct->id}}">View
									Details</a>
							</div>
							<img
								src="{{Config::get('app.url')}}/frontend/images/home/sale.png"
								class="new" alt="" />
						</div>
					</div>
				</div>
				<?php
				
				if ($newPro >= 3 && $newPro % 3 == 0) {
					echo '</div><div class="item"> ';
				}
				
				$newPro ++;
				?>
				@endforeach
			</div>
		</div>
		<a class="left recommended-item-control"
			href="#hotpromotion-item-carousel" data-slide="prev"> <i
			class="fa fa-angle-left"></i>
		</a> <a class="right recommended-item-control"
			href="#hotpromotion-item-carousel" data-slide="next"> <i
			class="fa fa-angle-right"></i>
		</a>
	</div>
</div>
<?php 
}
?>