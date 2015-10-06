<?php
$hotPromotionProducts = Product::findHotPromotionProducts ();
?>
<?php 
if(count($hotPromotionProducts) > 0){
?>
<ul class="nav nav-tabs" style="padding: 0;">
	<li><strong>Hot Promotion</strong>&nbsp;&frasl;</li>
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
		<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
		@foreach($hotPromotionProducts as $hotPromotionProduct)
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#"
								onclick="popupDetails.add_popup_detail(<?php echo $hotPromotionProduct->id; ?> )"
								data-toggle="modal" data-target="#myModal">
								<?php 
									if($hotPromotionProduct->thumbnail){
										echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$hotPromotionProduct->thumbnail.'?p=product&amp;h=90&amp;w=120" />';
									}else{
										echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=120" />';
									}
								?>
							</a>
							<center>
								<h5>
									<a href="{{Config::get('app.url')}}product/details/{{$hotPromotionProduct->id}}">
										<?php echo substr($hotPromotionProduct->title,0,20)?>
									</a>
								</h5>
								<strong class="price">$ {{$hotPromotionProduct->price}}</strong>
							</center>
						</div>
					</div>
				</div>
			</div>
			<?php
			if ($hotPro >= 6 && $hotPro % 6 == 0) {
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