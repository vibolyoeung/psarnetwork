<!--=============Menu==========-->
<div class="header-bottom">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#dropdown-thumbnail-preview">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="dropdown-thumbnail-preview"
				style="border: 1px solid #f0ad4e;">
				<ul class="nav navbar-nav menu_nav_category">
					<li>
						<a href="{{Config::get('app.url')}}" class="home_icon"> <span
								class="glyphicon glyphicon-home" aria-hidden="true"></span>
								&nbsp;
						</a>
					</li>
				 @foreach ($maincategories as $subcategorylist)
					<li class="dropdown thumb-dropdown" id="<?php echo $subcategorylist->id; ?>">
						<a data-toggle="dropdown"
						class="dropdown-toggle" href="<?php echo URL::to('products/productbycategories') ?>/<?php echo $subcategorylist->id;?>">
	      					<?php echo $subcategorylist->{'name_'.Session::get('lang')};?> <span
							class="caret"></span>
						</a>
		      			<?php
									$subcategoriesobj = new MCategory ();
									$sub = $subcategoriesobj->getSubCategories ( $subcategorylist->id );
									if (count ( $sub ) > 0) {
										echo '<ul class="dropdown-menu dropdown_main_menu" role="menu">';
										foreach ( $sub as $row ) {
											echo '<li><a href=' . URL::to ( 'products/productbycategories/'.$subcategorylist->id.'/'. $row->id ) . '>' . $row->{'name_' . Session::get ( 'lang' )} . ' <span class="caret"></span></a>';
											echo '<div class="thumbnail">';
											$subcategoriesobj->getSubCategoriesDropdown ($subcategorylist->id, $row->id );
											echo '</div>';
											echo '</li>';
										}
										echo '</ul>';
									}
									?>
			</li> @endforeach
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</div>
<script>
	jQuery(document).ready(function(){
		var fullurl = window.location.href;
		var explodedurl = fullurl.split("/");
		$('.thumb-dropdown').each(function() {
		   var ID = ( this.id );
		   //alert(jQuery.inArray(ID,explodedurl));
		   if(jQuery.inArray(ID,explodedurl) == -1){
				jQuery(".menu_nav_category li:first-child").addClass(" active");
			}else{
				jQuery(this).addClass(" active");
			}
		});
	});
</script>