<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type" id="menu_toogle">
				<img src="{{Config::get('app.url')}}frontend/images/icons/all_category.png" alt="" title="" height="23"/>
				<strong> &nbsp;&nbsp;&nbsp; All Categocies Type &nbsp;&nbsp;&nbsp;<span class="caret" ></span></strong>
			</div>
			<ul class="categories_menu" style="border:1px solid red;">
				@foreach ($maincategories as $categoriesList)
					<li class="">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
			      			<?php echo $categoriesList->name_en;  ?> 
			      		</a>
				      	<?php
							 $subcategoriesobj = new MCategory();
							 $sub = $subcategoriesobj->getSubCategories($categoriesList->id);
							if(count($sub) > 0){
								echo '<ul class="dropdown_main_menu" style="border:1px solid blue;position:relative;display:-moz-inline-box;z-index:1;background-color:#fff;">';
									foreach ($sub as $row){
											echo '<li><a href='.URL::to('product/'.$row->id).'>'.$row->{'name_en'}.' <span class="caret"></span></a>';
												//echo '<div class="thumbnails">';
												//$subcategoriesobj->getSubCategoriesDropdown($categoriesList->id, $row->id); 
												//echo '</div>';
												//echo '</li>';
									}
								echo '</ul>';
							}
						?>
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

<script>
	jQuery(document).ready(function(){
		jQuery("#menu_toogle").css('cursor','pointer');
		jQuery("#menu_toogle").click(function(){
			jQuery(".categories_menu").toggle("slow");
		});
	});
</script>