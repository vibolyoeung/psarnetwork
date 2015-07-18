<!--features_items-->
<div class="category-tab feature-ad lastest-post">
	<div class="col-lg-12 popular_product" style="padding: 0;">
		<ul class="nav nav-tabs">
			<li><strong>Feature & Popular Products</strong> &nbsp;&nbsp;&nbsp;
				&frasl;</li>
			<li>Products : <span class="number-display">25</span></li>
			<li>Stores :<span class="number-display">25</span></li>
			<li>Market :<span class="number-display">25</span></li>
			<li>Companies :<span class="number-display">25</span></li>
			<li>Home Shop :<span class="number-display">25</span></li>
			<li>Individual : <span class="number-display">25</span></li>
			<li>View :<span class="number-display">25</span></li>
		</ul>
	</div>
	<div class="row list-store">
		<?php
		$latestStores = Store::getLatestStores();
		if(count($latestStores) > 0){
		?>
		@foreach($latestStores as $latestStore)
			<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo">
							<!-- @TODO: Put link to store -->
							<a href="#">
							 <img
								src="{{Config::get('app.url')}}upload/store/{{$latestStore->image}}"
								alt="{{$latestStore->title_en}}"
								class="img-responsive img-thumbnail"
							/>
							</a>
							<div class="col-lg-12">
								<h5> {{$latestStore->{'title_'.Session::get('lang')};}}</h5>
								
								<strong> View: <span class="price">{{$latestStore->view}}</span></strong> 
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		<?php } ?>
	</div>
	<div class="col-lg-12 center-advertise">
		@foreach($advHorizontalLargeCenters as $adv)
		<?php
		$exp_date = $adv->end_date;
		$exp_date = str_replace ( '/', '-', $exp_date );
		if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date )) { ?>
				<a href="{{$adv->link_url}}"> <img
			src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
			class="img-responsive" alt="" />
		</a>
		<?php } ?>
		@endforeach
	</div>
</div>