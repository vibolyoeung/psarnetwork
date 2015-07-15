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
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo">
							<h5><center>{{$latestStore->title_en}}</center></h5>
							<a href="#" data-toggle="modal" data-target="#myModal">
							 <img
								src="{{Config::get('app.url')}}upload/store/{{$latestStore->image}}"
								alt="{{$latestStore->title_en}}"
								class="img-responsive img-thumbnail"
							/>
							</a>
							<div class="col-lg-12">
								<h5> {{$latestStore->title_en}}: </h5>
								<p>
									<?php
										$description = $latestStore->{'desc_'.Session::get('lang')}
									?>
									{{
										strlen($description) > 50 ?
										substr($description, 0, 50) . '....' :
										$description
									}} 
								</p>
								<strong> View <span class="price">{{$latestStore->view}}</span></strong> 
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