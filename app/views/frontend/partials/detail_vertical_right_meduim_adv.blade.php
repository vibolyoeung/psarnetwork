<?php $i = 0; ?>
@foreach($advVerticalRightMiduim as $adv)
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
	src="{{Config::get('app.url')}}frontend/images/default_ad_1135_85.jpg"
	class="img-responsive" alt="" />
</a>
<?php
}
?>