@include('frontend.modules.member.layout.header')
	<section>
		<div class="container">
			<div class="row">
				@yield('content')	
			</div>
		</div>
	</section>
	@include('frontend.partials.footer')
