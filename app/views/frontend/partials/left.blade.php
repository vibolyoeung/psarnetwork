<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type" id="menu_toogle">
				<img src="{{Config::get('app.url')}}frontend/images/icons/all_category.png" alt="" title="" height="23"/>
				<strong> &nbsp;&nbsp;&nbsp; All Categocies Type &nbsp;&nbsp;&nbsp;<span class="caret" ></span></strong>
			</div>
			<ul class="categories_menu">
				@foreach ($maincategories as $categoriesList)
					<li class="dropdown-mainmenu">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
			      			<?php echo $categoriesList->name_en;  ?> 
			      		</a>
				      	<?php
							 $subcategoriesobj = new MCategory();
							 $sub = $subcategoriesobj->getSubCategories($categoriesList->id);
							//if(count($sub) > 0){
								echo '<ul class="dropdown_main_menu">';
									foreach ($sub as $row){
										echo '<li class="main_category"><a href='.URL::to('product/'.$row->id).'>'.$row->{'name_en'}.'</a>';
									?>
											<ul style="padding:0;border:0px solid red;" class="child-menu">
												<?php 
													$subcategoriesobj->getLastFinalCategories($categoriesList->id, $row->id);
												?>
											</ul>
										</li>
									<?php
									}
								echo '</ul>';
							//}
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