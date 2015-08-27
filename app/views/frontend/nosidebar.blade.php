<div class="@if(empty($loginwrapper))user-member @endif">
<?php 
	if(Session::get('currentUserId')) {
	    if(!empty($dataStore->sto_url)) {
	    	$userHome = @Config::get('app.url').'page/'.$dataStore->sto_url;
	    } else {
	    	$userHome = @Config::get('app.url').'page/store-'.$dataStore->id;
	    }
	} 
?>
@include('frontend.modules.member.layout.header')
	<section>
		<div class="container">
            <div class="user-wrapper">
    			<div class="row">
    				@yield('content')	
    			</div>
            </div>
		</div>
	</section>
	@include('frontend.partials.footer')
</div>
