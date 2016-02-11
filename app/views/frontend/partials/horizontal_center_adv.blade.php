<div class="col-lg-12 center-advertise">
	@if(count($advHorizontalLargeCenters))
		@foreach($advHorizontalLargeCenters as $adv)
			<?php
			$exp_date = $adv->end_date;
			$exp_date = str_replace ( '/', '-', $exp_date );
			if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date )) { ?>
				<a href="{{$adv->link_url}}"> <img
					src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
					class="img-responsive img-thumbnail" alt="" />
				</a>
			<?php } ?>
		@endforeach
	@endif
</div>