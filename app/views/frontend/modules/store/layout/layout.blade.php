	@include('frontend.modules.store.partials.header')
	@include('frontend.modules.store.partials.menu')
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.modules.store.partials.left')
				@yield('content')
				@include('frontend.modules.store.partials.right')
			</div>
			<div class="client_location">
				@yield('client_location')
			</div>
	</section>
	@include('frontend.modules.store.partials.footer');
