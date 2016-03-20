@if(!empty($page))
	@if ($page == 'detail')
		{{ App::make('FePageController')->getSearchTypeAndLocations($product) }}
	@endif
@else
	{{ App::make('FePageController')->getSearchTypeAndLocations() }}
@endif
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
@include('frontend.partials.footer')
