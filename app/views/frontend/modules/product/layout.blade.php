@include('frontend.modules.product.partials.header')
@include('frontend.modules.product.partials.menu')
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-2" style="padding:0;">
				<div class="left-sidebar">
					@yield('left')
				</div>
			</div>
			@yield('content')
			<div class="col-lg-1"  style="padding:0;">
				<div class="left-sidebar">
					@yield('right')
				</div>
			</div>
		</div>
	</div>
</section>
@yield('footer')
