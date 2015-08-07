    <?php
    if(!empty($dataStore->sto_url)) {
    	$userHome = @Config::get('app.url').'page/'.$dataStore->sto_url;
    } else {
    	$userHome = @Config::get('app.url').'page/store-'.$dataStore->id;
    }
    ?>

	@include('frontend.modules.store.partials.header')
	@include('frontend.modules.store.partials.menu')

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-2" style="padding:0;">
					<div class="left-sidebar">
						@yield('left')
					</div>
				</div>
				@yield('content')
				<div class="col-lg-2"  style="padding:0;">
					<div class="left-sidebar">
						@yield('right')
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('frontend.modules.store.partials.footer');
