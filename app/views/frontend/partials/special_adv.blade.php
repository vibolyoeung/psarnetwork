<!-- -============Advertise top special======== -->
<?php $i = 0; 

if(count($advHorizontalTopLarges)){ ?>
	@foreach($advHorizontalTopLarges as $adv)
	<?php
	$exp_date = $adv->end_date;
	$exp_date = str_replace ( '/', '-', $exp_date );
	if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date )) {
		?>
		<a href="{{$adv->link_url}}"> <img
			src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
			class="img-responsive img-thumbnail" alt="" />
		</a>
		<?php
		$i ++;
	}else{ ?>
		<a href="#"> 
			<img
				src="{{Config::get('app.url')}}upload/advertisement/default_advertisement.jpg"
				class="img-responsive img-thumbnail" alt="" />
		</a>
	<?php
	}
	?>
	@endforeach
<?php
}else{ ?>
   <a href="#"> 
    <img
		src="{{Config::get('app.url')}}upload/advertisement/default_advertisement.jpg"
		class="img-responsive img-thumbnail" alt="" />
    </a>
<?php
}
?>