@if($currentUserType == 2)
<div class="panel-group category-products" id="accordian">
	<label class="btn-default get popular-links"> {{trans('store.visitor')}}</label>
	<!--category-products-->
	<div class="panel panel-default popular-links"
		style="color: #000; padding: 5px">
		<p>
		<?php
		if (! empty ( $dataStore->sto_url )) {
			$userSrore = 'page/' . $dataStore->sto_url;
		} else {
			$userSrore = 'page/store-' . $dataStore->id;
		}
		
		$getCounter = new Store ();
		$getCounterVisitor = $getCounter->getTrackingBy ( array (
				'cnt_object_id' => $dataStore->id
		) );
		?>
		<span style="color: black;">{{trans('store.visitorToday')}}: &nbsp;</span><span
				style="color: red;">{{$getCounterVisitor->today}}</span><br /> <span
				style="color: black;">{{trans('store.visitorYesterday')}}: &nbsp;</span><span
				style="color: red;">{{$getCounterVisitor->yesterday}}</span><br /> <span
				style="color: black;">{{trans('store.visitorLastWeek')}}: &nbsp;</span><span
				style="color: red;">{{$getCounterVisitor->lastweek}}</span><br /> <span
				style="color: black;">{{trans('store.visitorLastMounth')}}: &nbsp;</span><span
				style="color: red;">{{$getCounterVisitor->lastMounth}}</span>
		</p>
	</div>
</div>
@endif