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
					<li>Stores :<span class="number-display">25</span></li>
					<li>Market :<span class="number-display">25</span></li>
					<li>Companies :<span class="number-display">25</span></li>
					<li>Home Shop :<span class="number-display">25</span></li>
					<li>Individual : <span class="number-display">25</span></li>
					<li>View :<span class="number-display">25</span></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
		@foreach($latestProducts as $latestProduct)
		<?php 
		if(strtotime($latestProduct->publish_date) >= strtotime("d/m/Y")){
		?>
		<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<a href="#" data-toggle="modal" data-target="#myModal" onclick="popupDetails.add_popup_detail(<?php echo $latestProduct->id; ?>)">
							<img
							src="{{Config::get('app.url')}}upload/product/thumb/{{$latestProduct->thumbnail}}"
							alt="" />
						</a>
						<h2>$ {{$latestProduct->price}}</h2>
						<p><?php echo substr($latestProduct->title,0,20)?></p>
						<a href="{{Config::get('app.url')}}product/details/{{$latestProduct->id}}">View
							Details</a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		@endforeach
	</div>
	<div class="col-lg-12">
		<div class="col-lg-12 center-advertise">
			@include('frontend.partials.horizontal_center_adv')
		</div>
	</div>
</div>
<?php } ?>
{{HTML::script('frontend/js/jquery.js')}}
