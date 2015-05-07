<!-- -============Advertise top special======== -->
<?php $i = 0; ?>
@foreach($advHorizontalLargeCenters as $adv)
<?php
$exp_date = $adv->end_date;
$exp_date = str_replace ( '/', '-', $exp_date );
if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date )) {
	?>
<a href="{{$adv->link_url}}"> <img
	src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
	class="img-responsive" alt="" />
</a>
<?php
	$i ++;
}
?>
@endforeach
<?php
if ($i === 0) {
	?>
<a href="#"> <img
	src="{{Config::get('app.url')}}frontend/images/horizontal_default_advertise.png"
	class="img-responsive" alt="" />
</a>
<?php
}
?>