	@include('frontend.partials.header')
	@include('frontend.partials.searchtop')
	{{ App::make('FePageController')->mainCategory() }}
	
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.partials.left')
				@yield('content')
				{{ App::make('FePageController')->getRightAds() }}
			</div>
		</div>
		<div class="container client_location">
			@yield('client_location')
		</div>
	</section>
	@include('frontend.partials.footer');
