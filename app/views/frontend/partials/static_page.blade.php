@extends('frontend.layout')
@section('title') 
	<?php  
		echo $page->{"title_".App::getLocale()}
	?> 
@endsection

@section('content')
	<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1" style='margin-top:5%;margin-bottom:3%;padding-bottom:10px;font-family:Hanuman !important;line-height:2;word-break:break-all;-webkit-box-shadow: -1px 5px 11px 9px rgba(227,227,227,0.5);-moz-box-shadow: -1px 5px 11px 9px rgba(227,227,227,0.5);box-shadow: -1px 5px 11px 9px rgba(227,227,227,0.5);'>
		<h3>
			<b>
			<?php  
				echo $page->{"title_".App::getLocale()}
			?> 
			</b>
		</h3>
		<?php  
			echo $page->{"short_desc_".App::getLocale()}
		?> 
	</div>
@endsection
<style>
	body,html{
		position: relative;
		height: 100%;
		font-size: 11px;
		color:#333;
		font-family:"Hanuman","Arial" !important;
	}
    p.MsoNormal span{
    	font-family: "Hanuman",Arial !important;
    	line-height: 1 !important; 
    }
</style>

