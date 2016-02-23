<div class="col-lg-2 col-md-4 left_bar hidden-sm">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type" id="menu_toogle">
				<img src="{{Config::get('app.url')}}frontend/images/icons/all_category.png" alt="" title="" height="23"/>
				&nbsp;{{trans('product.all_categories_type')}}&nbsp;&nbsp;&nbsp;<span class="caret" ></span>
			</div>
			<ul class="categories_menu">
				@foreach ($maincategories as $categoriesList)
					<li class="dropdown-mainmenu">
						<a class="dropdown-toggle" href="<?php echo URL::to("products/productbycategories/".$categoriesList->id.'/'.$categoriesList->id);?>">
			      			<?php
			      			$cateName = $categoriesList->{'name_'.Session::get('lang')};
			      			?>
			      			{{ str_limit($cateName, $limit = 22, $end = '...') }}
			      		</a>
				      	<?php
							 $subcategoriesobj = new MCategory();
							 $sub = $subcategoriesobj->getSubCategories($categoriesList->id);
								echo '<ul class="dropdown_main_menu hidden-xs">';
									foreach ($sub as $row){
										echo '<li class="main_category"><a href='.URL::to('products/productbycategories/'.$row->id.'/'.$row->id).'>';
											$subCateName = $row->{'name_'.Session::get('lang')};
						      			?>
											{{ str_limit($subCateName, $limit = 22, $end = '...') }}
									<?php
										echo '</a>';
									?>
											<ul style="padding:0;border:0px solid red;" class="child-menu">
												<?php
													$subcategoriesobj->getLastFinalCategories($row->id);
												?>
											</ul>
										</li>
									<?php
									}
								echo '</ul>';
						?>
					</li>
				@endforeach
			</ul>
		</div>
		<!--=========Register seller============ -->
		<div class="panel-group category-products ads_side_bar hidden-xs" id="accordian">
			@if($isDetails)
				<!-- type:homepage, position: left meduim, limit -->
				{{ App::make('FePageController')->getFeAds(3, 6, 3) }}
			@else
				<!-- type:homepage, position: left meduim, limit -->
				{{ App::make('FePageController')->getFeAds(1, 6, 3) }}
			@endif
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function(){
		jQuery("#menu_toogle").css('cursor','pointer');
		jQuery("#menu_toogle").click(function(){
			jQuery(".categories_menu").slideToggle("fast");
		});
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