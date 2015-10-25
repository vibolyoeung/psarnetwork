<!-- =============End of Monthly -->
<?php
	$monthlyProducts = Product::findMonthlyProducts ();
	if(count($monthlyProducts) > 0){
?>
			<br />
<div class="category-tab feature-ad lastest-post" style="padding: 0;">
	<!--recommended_items-->
	<ul class="nav nav-tabs">
		<li>{{trans('product.monthly_pay_product')}}&nbsp;&frasl;</li>
		<li>Products : <span class="number-display"><?php echo count($monthlyProducts)?></span></li>
	</ul>
	<div id="second-hand-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner">
			
			<?php
			$monthlyPro = 1;
			?>
			<div class="item active">
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
				@foreach($monthlyProducts as $monthlyProduct)
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#" data-toggle="modal" data-target="#myModal"
									onclick="popupDetails.add_popup_detail(<?php echo $monthlyProduct->id; ?>)">
									<?php 
									if($monthlyProduct->thumbnail){
										echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$monthlyProduct->thumbnail.'?p=product&amp;h=90&amp;w=120" />';
									}else{
										echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=120" />';
									}
								?>
								</a>
								<center>
									<h5>
										<a href="{{Config::get('app.url')}}product/details/{{$monthlyProduct->id}}"><?php echo substr($monthlyProduct->title,0,20)?></a>
									</h5>
									<strong class="price">$ {{$monthlyProduct->price}}</strong>
								</center>
							</div>
						</div>
					</div>
				</div>
				<?php
				if ($monthlyPro >= 4 && $monthlyPro % 4 == 0) {
					echo '</div><div class="item"> ';
				}
				$monthlyPro ++;
				?>
			@endforeach
			</div>

		</div>
		<a class="left recommended-item-control"
			href="#second-hand-item-carousel" data-slide="prev"> <i
			class="fa fa-angle-left"></i>
		</a> <a class="right recommended-item-control"
			href="#second-hand-item-carousel" data-slide="next"> <i
			class="fa fa-angle-right"></i>
		</a>
	</div>
</div>
<?php } ?>