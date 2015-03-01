<!--=============Menu==========-->
<div class="header-bottom" >
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid" style="padding:0;">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dropdown-thumbnail-preview">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="dropdown-thumbnail-preview" style="padding:0;border:1px solid #f0ad4e;">
	      <ul class="nav navbar-nav">
	      	<li>
	      		<a href="#">Home</a>
	      	</li>
	      	@foreach ($maincategories as $subcategorylist)
	      	<li  class="dropdown thumb-dropdown">
	      		<a 
	      			data-toggle="dropdown" 
	      			class="dropdown-toggle" href="#">
	      			<?php echo $subcategorylist->name_en;?> <span class="caret"></span>
	      		</a>
		      	<?php
					$subcategoriesobj = new MCategory();
					$sub = $subcategoriesobj->getSubCategories($subcategorylist->id);
					if(count($sub) > 0){
						echo '<ul class="dropdown-menu" role="menu">';
							foreach ($sub as $row){
									echo '<li><a href='.URL::to('product/'.$row->id).'>'.$row->{'name_en'}.' <span class="caret"></span>';
										echo '<div class="thumbnail">';
											$subcategoriesobj->getSubCategoriesDropdown($row->id);
										echo '</div>';
									echo '</a></li>';
							}
						echo '</ul>';
					}
				?>
			</li>
			@endforeach 
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
</header>
	<!--==============Closing header=========-->