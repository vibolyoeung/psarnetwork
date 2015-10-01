<!--features_items-->
<?php
	$latestStores = Store::getLatestStores();
	if(count($latestStores) > 0){
	?>
	<div class="category-tab feature-ad lastest-post">
		<div class="col-lg-12 popular_product" style="padding: 0;">
			<ul class="nav nav-tabs">
				<li>Feature & Popular Products&nbsp;&nbsp;&nbsp;
					&frasl;</li>
				<li>Products : <span class="number-display">25</span></li>
			</ul>
		</div>
		<div class="row list-store">
			@foreach($latestStores as $latestStore)
				<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
					<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo">
								<a href="{{Config::get('app.url')}}store-{{$latestStore->id}}" target="_blank">
								<?php
									$storeImg = Config::get('app.url').'frontend/images/default_store.jpg';
									$image = Config::get('app.url').'upload/store/' . $latestStore->image;
									// Check if image not in folder store
									if (@getimagesize($image)) {
										$storeImg = Config::get('app.url').'upload/store/' . $latestStore->image;
									}
								?>
								 <img
									src="{{$storeImg}}"
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
		</div>
		<div class="col-lg-12 center-advertise">
			@if(count($advHorizontalLargeCenters))
				@foreach($advHorizontalLargeCenters as $adv)
					<?php
					$exp_date = $adv->end_date;
					$exp_date = str_replace ( '/', '-', $exp_date );
					if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date )) { ?>
							<a href="{{$adv->link_url}}"> <img
						src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
						class="img-responsive" alt="" />
					</a>
					<?php } else { ?>
						<img
							src="{{Config::get('app.url')}}frontend/images/horizontal_default_advertise.jpgpng"
							class="img-responsive img-thumbnail" alt="image" />
					<?php } ?>
				@endforeach
			@else
				<img 
					src="{{Config::get('app.url')}}frontend/images/horizontal_default_advertise.png" 
					class="img-responsive img-thumbnail" alt="image" />
			@endif


		</div>
	</div>

	<?php
		}
	?>