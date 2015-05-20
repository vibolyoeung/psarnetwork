<?php
$hotPromotionProducts = Product::findHotPromotionProducts ();
?>
<?php 
if(count($hotPromotionProducts) > 0){
?>
<ul class="nav nav-tabs">
	<li><strong>Hot PromotionProducts</strong> &nbsp;&nbsp;&nbsp; &frasl;</li>
	<li>Products : <span class="number-display">25</span></li>
	<li>Stores :<span class="number-display">25</span></li>
	<li>Market :<span class="number-display">25</span></li>
	<li>Companies :<span class="number-display">25</span></li>
	<li>Home Shop :<span class="number-display">25</span></li>
	<li>Individual : <span class="number-display">25</span></li>
	<li>View :<span class="number-display">25</span></li>
</ul>
<div id="recommended-item-carousel" class="carousel slide"
	data-ride="carousel">
	<div class="carousel-inner">
	<?php
	$hotPro = 1;
	?>
		<div class="item active">	
		@foreach($hotPromotionProducts as $hotPromotionProduct)
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#"
								onclick="popupDetails.add_popup_detail(<?php echo $hotPromotionProduct->id; ?> )"
								data-toggle="modal" data-target="#myModal">
								<img
								src="{{Config::get('app.url')}}/upload/product/thumb/{{$hotPromotionProduct->thumbnail}}"
								alt="" />
							</a>
							<h2>$ {{$hotPromotionProduct->price}}</h2>
							<p><?php echo substr($hotPromotionProduct->title,0,20)?></p>
							<a data-toggle="modal" data-target="#myModal"
								onclick="popupDetails.add_popup_detail(<?php echo $hotPromotionProduct->id; ?>)">View
								Details</a>
						</div>
						<img
							src="{{Config::get('app.url')}}/frontend/images/home/sale.png"
							class="new" alt="" />
					</div>
				</div>
			</div>
			<?php
			if ($hotPro >= 4 && $hotPro % 4 == 0) {
				echo '</div><div class="item"> ';
			}
			$hotPro ++;
			?>
		@endforeach
		</div>

	</div>
	<a class="left recommended-item-control"
		href="#recommended-item-carousel" data-slide="prev"> <i
		class="fa fa-angle-left"></i>
	</a> <a class="right recommended-item-control"
		href="#recommended-item-carousel" data-slide="next"> <i
		class="fa fa-angle-right"></i>
	</a>
</div>
<?php 
}
?>
<br />