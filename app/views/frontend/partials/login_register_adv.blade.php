<div class="constug">
	<center>
	@if(count($advRegisterAndLogin))
		@foreach($advRegisterAndLogin as $adv)
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
					src="{{Config::get('app.url')}}frontend/images/member/strug.png"
					class="img-responsive img-thumbnail" alt="image" />
			<?php } ?>
		@endforeach
	@else
		<img
			src="{{Config::get('app.url')}}frontend/images/member/strug.png"
			class="img-responsive img-thumbnail" alt="image" />
	@endif
	</center>
</div>