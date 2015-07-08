{{ App::make('FePageController')->getSearchTypeAndLocations() }}
@include('frontend.partials.menu')
<section>
	<div class="container home_wrapper">
		<div class="row">
			@yield('content')
		</div>
	</div>
	<div class="container client_location">
		@yield('client_location')
	</div>
</section>
@include('frontend.partials.footer')
