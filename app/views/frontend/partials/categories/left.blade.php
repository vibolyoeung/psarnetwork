<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<div class="all_categories_type" id="menu_toogle">
				<img src="{{Config::get('app.url')}}frontend/images/icons/all_category.png" alt="" title="" height="23"/>
				  @foreach ($MaindetailCategory as $maincate)
					<?php
	      			$cateName = $maincate->{'name_'.Session::get('lang')};
	      			?>
	      			 {{ str_limit($cateName, $limit = 20, $end = '') }}
					@endforeach
					&nbsp;&nbsp;<span class="caret" ></span>
			</div>
			<ul class="categories_menu">
				<?php
				$finalCategory = new MCategory();
				if(count($detailCategory)){
				?>
					@foreach ($detailCategory as $categoriesList)
						<li class="dropdown-mainmenu">
								<?php
								if($finalCategory->countCategory($categoriesList->id) > 0 ){
						 		?>
						 			<a href="<?php echo URL::to('products/productbycategories/'.$categoriesList->id.'/'.$categoriesList->id); ?>">
						 		<?php
						 		}else{ ?>
						 			<a href="<?php echo URL::to('products/productbycategories/'.$categoriesList->parent_id.'/'.$categoriesList->id); ?>">
						 		<?php
						 		}
								$subcate = $categoriesList->{'name_'.Session::get('lang')};
								?>
								{{ str_limit($subcate, $limit = 30, $end = '...') }}
				      		</a>
						</li>
					@endforeach
				<?php
				}else{
					echo '<span class="price"><center>No Category</center></span>';
				}
				?>
			</ul>
		</div>
		<!--=========Register seller============ -->
		<div class="panel-group category-products ads_side_bar hidden-xs" id="accordian">
			<!-- type:cetegory, position: left meduim, limit -->
			{{ App::make('FePageController')->getFeAds(2, 6, 3) }}
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