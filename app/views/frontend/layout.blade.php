@if(!empty($layout))
	@if ($layout == 'detail')
		{{ App::make('FePageController')->getSearchTypeAndLocations($product) }}
	@endif
@else
	{{ App::make('FePageController')->getSearchTypeAndLocations() }}
@endif
<?php 
$current_lang = Session::get('lang');
if($current_lang=='en'){
	$font_family='Arial';
	$font_size = '14';
}else{
	$font_family='Hanuman';
	$font_size = '16';
}
?>
<style>
	body,html,b,strong,div,a,p,font,small,input,select,.form-control{
		font-family:'<?php echo $font_family?>';
		font-size:<?php echo $font_size?>px;
	}
</style>
<section>
	<div class="container home_wrapper">
		<div class="row">
			@yield('content')
		</div>
	</div>
	<div class="container client_location hidden-sm hidden-xs">
		@yield('client_location')
	</div>
</section>
{{HTML::script('/frontend/autocomplete/scripts/jquery-1.8.2.min.js')}}
{{HTML::script('/frontend/js/popupdetails.js')}}
{{HTML::script('/frontend/js/bootstrap.min.js')}}
{{HTML::script('/frontend/js/jquery.scrollUp.min.js')}}
{{HTML::script('/frontend/js/jquery.colorbox-min.js')}}
{{HTML::script('/frontend/js/price-range.js')}}
{{HTML::script('/frontend/js/main.js')}}
{{HTML::script('/frontend/js/bootstrap-datepicker.min.js')}}
{{HTML::script('/frontend/autocomplete/scripts/jquery.mockjax.js')}}
{{HTML::script('/frontend/autocomplete/scripts/jquery.autocomplete.js')}}
{{HTML::script('/frontend/js/carouselengine/amazingcarousel.js')}}
{{HTML::script('/frontend/js/carouselengine/initcarousel-1.js')}}
{{HTML::script('/frontend/js/custom.js')}}
{{HTML::script('/frontend/autocomplete/scripts/app.js')}}
@include('frontend.partials.footer')
