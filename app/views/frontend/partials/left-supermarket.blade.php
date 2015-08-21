
<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type" id="menu_toogle">
				<img src="{{Config::get('app.url')}}frontend/images/icons/all_category.png" alt="" title="" height="23"/>
				<strong> &nbsp;&nbsp;&nbsp; 
					{{$mainmarket}}
					&nbsp;&nbsp;&nbsp;<span class="caret" ></span></strong>
			</div>
			<ul class="categories_menu">
				<?php
				$finalCategory = new MCategory();
				?>
					@foreach ($listMarkets as $categoriesList)
						<li class="dropdown-mainmenu">
							<a href="<?php echo URL::to('product/list/'.$mainID.'/'.$categoriesList->id); ?>">
								<?php echo $categoriesList->{'title_'.Session::get('lang')};?>
				      		</a>
						</li>
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