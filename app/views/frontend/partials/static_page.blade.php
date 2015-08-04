@extends('frontend.layout') 

@section('title') 
	<?php  
		echo $page->{"title_".App::getLocale()}
	?> 
@endsection

@section('content')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li>
			<?php  
				echo $page->{"title_".App::getLocale()}
			?> 
		</li>
	</ol>
	<div>
		<h3>
			<b>
			<?php  
				echo $page->{"title_".App::getLocale()}
			?> 
			</b>
		</h3>
		<p>
			<?php  
				echo $page->{"short_desc_".App::getLocale()}
			?> 
		</p>
	</div>
@endsection

