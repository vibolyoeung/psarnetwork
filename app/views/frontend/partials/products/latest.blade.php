<?php
$latestProducts = Product::findPreminumLatest();
if(count($latestProducts) > 0){
?>
<div class="features_items">
	<div class="features_items">
		<div class="category-tab lastest-post">
			<div class="col-sm-12" style="padding: 0;">
				<ul class="nav nav-tabs">
					<li><strong>The latest products</strong> &nbsp;&nbsp;&nbsp; &frasl;</li>
					<li>Products : <span class="number-display">25</span></li>
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
								echo '<img src="image/phpthumb/'.$latestProduct->thumbnail.'?p=product&amp;h=150&amp;w=150" />';
							}else{
								echo '<img src="image/phpthumb/No_image_available.jpg?p=product&amp;h=150&amp;w=150" />';
							}
							?>
						</a>
						<h2>$ {{$latestProduct->price}}</h2>
						<a href="{{Config::get('app.url')}}product/details/{{$latestProduct->id}}">
							<?php echo substr($latestProduct->title,0,20)?>
						</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="col-lg-12 center-advertise">
		@include('frontend.partials.horizontal_center_adv')
	</div>
</div>
<?php } ?>
{{HTML::script('frontend/js/jquery.js')}}
