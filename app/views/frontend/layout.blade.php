{{ App::make('FePageController')->getSearchTypeAndLocations() }}
{{ App::make('FePageController')->mainCategory() }}
<section>
	<div class="container">
		<div class="row">
			@yield('content')
		</div>
	</div>
	<div class="container client_location">
		@yield('client_location')
	</div>
</section>
@include('frontend.partials.footer')
