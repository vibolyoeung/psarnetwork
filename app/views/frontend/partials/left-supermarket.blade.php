<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type" id="menu_toogle">
				<img src="{{Config::get('app.url')}}frontend/images/icons/all_category.png" alt="" title="" height="23"/>
				&nbsp;&nbsp;&nbsp; 
					<?php echo $mainmarket->{'name_'.Session::get('lang')};?>
					&nbsp;&nbsp;&nbsp;<span class="caret" ></span>
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
		<div class="panel-group category-products ads_side_bar" id="accordian">
			<!-- type:homepage, position: left meduim, limit -->
			{{ App::make('FePageController')->getFeAds(1, 4, 3) }}
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function(){
		jQuery("#menu_toogle").css('cursor','pointer');
		jQuery("#menu_toogle").click(function(){
			jQuery(".categories_menu").slideToggle("fast");
		});

		jQuery(".slideshow-group").colorbox({rel:'slideshow-group', transition:"none", maxWidth:"95%", maxHeight:"95%"});
	});

	$(window).on('load resize', function(){
		var windowsize = $(window).width();
		if (windowsize > 768) {
		    //if the window is greater than 768, then show menu as default
		    jQuery(".categories_menu").show();
		  }else{
		  	jQuery(".categories_menu").hide();
		  }
	});
</script>