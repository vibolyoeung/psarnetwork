    <?php
    $getStoreUrlID = Request::segment ( 1 );
    if (preg_match("/store-/i", $getStoreUrlID)) {
    	$getStoreUrlID = 1;
    }
    if(!empty($dataStore->sto_url)) {
    	$userHome = @Config::get('app.url').$dataStore->sto_url;
    } else {
    	$userHome = @Config::get('app.url').'store-'.$dataStore->id;
    }
    ?>
	@if(!empty($dataStore->sto_url))
	@if($getStoreUrlID==1)
	<script>
		window.location = '{{@Config::get('app.url').$dataStore->sto_url}}';
	</script>
	@endif
	@endif
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
				<div class="col-lg-8">
					<div class="entry-content">
						@yield('content')
					</div>
				</div>
				<div class="col-lg-2"  style="padding:0;">
					<div class="left-sidebar">
						@yield('right')
					</div>
				</div>
			</div>
		</div>
	</section>
	<link href='//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css' rel='stylesheet'/>
	@include('frontend.modules.store.partials.footer');
