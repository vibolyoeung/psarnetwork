<div class="col-lg-12 center-advertise">
	<!-- type:homepage, position: up on second hand, limit -->
	{{ App::make('FePageController')->getHorizontalAds(1, 17, 3) }}
</div>
<?php
	$secondHandProducts = Product::findSecondHandProducts ();
	if(count($secondHandProducts) > 0){
?>
<div class="category-tab feature-ad lastest-post" style="padding: 0;">
	<!--recommended_items-->
	<ul class="nav nav-tabs">
		<li>{{trans('product.secondhand_product')}}(<strong class="price" style="font-size:12px;"><?php echo count($secondHandProducts)?></strong>)</li>
	</ul>
	<div id="second-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
			<div id="detail_product"
				data-get-detail-product-url="{{Config::get('app.url')}}"></div>
			<?php
			$secondPro = 1;
			?>
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
			@foreach($secondHandProducts as $secondHandProduct)
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#"
									onclick="popupDetails.add_popup_detail(<?php echo $secondHandProduct->id; ?>)"
									data-toggle="modal" data-target="#myModal">
									<?php
										if($secondHandProduct->thumbnail){
											echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$secondHandProduct->thumbnail.'?p=product&amp;h=90&amp;w=120" />';
										}else{
											echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=120" />';
										}
									?>
								</a>
								<center>
									<h5>
										<a href="{{Config::get('app.url')}}product/details/{{$secondHandProduct->id}}"><?php echo str_limit($secondHandProduct->title,$limit = 15, $end = '...');?></a>
									</h5>
									<strong class="price">$ {{$secondHandProduct->price}}</strong>
								</center>
							</div>
						</div>
					</div>
				</div>
				<?php
				if($secondPro == 6 || $secondPro==12 || $secondPro == 18 || $secondPro == 24 || $secondPro == 30 || $secondPro == 36 || $secondPro == 42 || $secondPro == 48 || $secondPro == 54){
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