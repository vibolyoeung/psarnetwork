@if(count($productAdvs) > 0)
<div class="category-tab feature-ad product-adv">
	<div class="col-lg-12 product-adv" style="padding: 0;">
		<ul class="nav nav-tabs">
			<li><strong>Product advertisement</strong> &nbsp;&nbsp;&nbsp;
				&frasl;</li>
		</ul>
	</div>
	<div class="row list-store">
			@foreach($productAdvs as $adv)
				<?php
					$exp_date = $adv->end_date;
					$exp_date = str_replace ( '/', '-', $exp_date );
				?>
				@if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date ))
				<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
					<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
					<div class="product-l-wrapper">
						<div class="single-products">
							<div class="productinfo">
								<a href="{{$adv->link_url}}">
								 <img
									src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
									class="img-responsive img-thumbnail" alt="" />
								</a>
								<div class="col-lg-12">
									<h5> {{$adv->{'title_'.Session::get('lang')};}}</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
			@endforeach
	</div>
</div>
@endif