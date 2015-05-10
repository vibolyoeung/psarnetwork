<?php 
	if(Session::get('currentUserId')) {
		$userHome = @Config::get('app.url').'page/'.$dataStore->id;
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
