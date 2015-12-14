<div class="col-lg-2 left_bar">
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
								echo '<ul class="dropdown_main_menu">';
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
		<div class="panel-group category-products ads_side_bar" id="accordian">
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