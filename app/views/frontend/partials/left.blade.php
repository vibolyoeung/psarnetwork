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
						<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo URL::to("products/productbycategories/".$categoriesList->id);?>">
			      			<?php echo $categoriesList->{'name_'.Session::get('lang')};  ?> 
			      		</a>
				      	<?php
							 $subcategoriesobj = new MCategory();
							 $sub = $subcategoriesobj->getSubCategories($categoriesList->id);
								echo '<ul class="dropdown_main_menu">';
									foreach ($sub as $row){
										echo '<li class="main_category"><a href='.URL::to('products/productbycategories/'.$row->id.'/0').'>'.$row->{'name_'.Session::get('lang')}.'</a>';
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
		<div class="panel-group category-products" id="accordian">
			<!-- type:homepage, position: left meduim, limit -->
			{{ App::make('FePageController')->getFeAds(1, 4, 3) }}
		</div>
	</div>
</div>