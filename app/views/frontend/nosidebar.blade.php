<div class="@if(empty($loginwrapper))user-member @endif">
<?php
	if(Session::get('currentUserId')) {
	    if(!empty($dataStore->sto_url)) {
	    	$userHome = @Config::get('app.url').$dataStore->sto_url;
	    } else {
	    	$userHome = @Config::get('app.url').'store-'.$dataStore->id;
	    }
	}
?>
@include('frontend.modules.member.layout.header')
	
	{{HTML::script('/frontend/js/jquery.js')}}
	{{HTML::script('/backend/js/bootstrap.min.js')}}
    {{HTML::script('/frontend/js/bootstrap-datepicker.min.js')}}
    {{HTML::script('/frontend/plugin/dropzone/dist/dropzone.js')}}
    {{HTML::script('/frontend/plugin/ckeditor/ckeditor.js')}}
    {{HTML::script('/frontend/js/member-info.js')}}
    {{HTML::script('/frontend/js/product.js')}}
     {{HTML::script('/frontend/js/ddmenu.js')}}
    {{HTML::script('/frontend/js/jquery-upload/jquery.form.js')}}
    <script
	src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
   	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	{{HTML::script('/frontend/js/mapCurr.js')}}
	{{HTML::script('frontend/js/Nestable-master/jquery.nestable.js')}}
	{{HTML::script('frontend/js/member/functions.js')}}
	{{HTML::script('/frontend/js/jquery.validate.js')}}
	<section>
		<div class="container">
            <div class="user-wrapper">
    			<div class="row">
    				@yield('content')
    			</div>
            </div>
		</div>
	</section>
</div>
