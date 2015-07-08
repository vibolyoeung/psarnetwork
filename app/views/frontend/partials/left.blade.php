<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type">
				<img src="{{Config::get('app.url')}}frontend/images/icons/menu_tap.png" alt="" title=""/>
				<strong> &nbsp;&nbsp;&nbsp; All Categocies Type </strong>
			</div>
			<ul class="categories_menu">
				@foreach ($maincategories as $categoriesList)
					<li><a href="#"><?php echo $categoriesList->{'name_'.Session::get('lang')};?></a></li>
				@endforeach
			</ul>
		</div>
		<!--=========Register seller============ -->
		<div class="panel-group category-products" id="accordian">
			<!-- type:homepage, position: left meduim, limit -->
			{{ App::make('FePageController')->getFeAds(1, 4, 3) }}
		</div>
	</div>
</div>