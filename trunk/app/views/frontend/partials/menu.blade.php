<!--=============Menu==========-->
<div class="header-bottom" >
<nav class="navbar navbar-default" role="navigation" style="border:1px solid #F79646;padding:0;">
  <div class="container">
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
    <div class="collapse navbar-collapse" id="dropdown-thumbnail-preview">
    	<ul class="nav navbar-nav">
    		<li><a href="#">Home</a></li>
    		@foreach ($maincategories as $subcategorylist)
	    	<?php
				$subcategoriesobj = new MCategory();
				//var_dump($subcategoriesobj);
				$sub = $subcategoriesobj->getSubCategories($subcategorylist->id);
				if(count($sub) > 0){
					foreach ($sub as $row) {
						echo '<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href='.URL::to('product/'.$row->id).'>'.$row->{'name_en'}.'</a>';
						$subcategoriesobj->getSubCategoriesDropdown($row->id);
					}
				}
			?>
			@endforeach 
		</ul>
		
      <!--<ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown thumb-dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Snippets <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li role="presentation" class="dropdown-header">Simple thumbnail</li>
            <li>
                <a href="#">
                    Preview carousel indicators                                
                    <div class="thumbnail">
                        <img class="img-responsive" src="http://krowdly.co/snippets/thumbnails/1.jpg">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    Simple subscribe form                                
                    <div class="thumbnail">
                        <img class="img-responsive" src="http://krowdly.co/snippets/thumbnails/2.jpg">
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    Flat user profile                             
                    <div class="thumbnail">
                        <img class="img-responsive" src="http://krowdly.co/snippets/thumbnails/3.jpg">
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li role="presentation" class="dropdown-header">Thumbnail with caption</li>
            <li>
                <a href="#">
                    Discount labels                                
                    <div class="thumbnail">
                        <img class="img-responsive" src="http://krowdly.co/snippets/thumbnails/4.jpg">
                        <div class="caption">
                            <p>You can add any text for describe thumbnail here.</p>
                        </div>
                    </div>
                </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	</div>
</header>
	<!--==============Closing header=========-->