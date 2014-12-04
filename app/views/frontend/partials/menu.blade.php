<!--=============Menu==========-->
	<div class="header-bottom">
		<div class="container">
			<div class="row visible-lg">
				<div class="col-sm-5">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left menu-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.html" class="active">Hot Promotion</a></li>
							<li><a href="404.html">News Arrival</a></li>
							<li><a href="contact-us.html">Secondhand&nbsp;&nbsp;&nbsp;/</a></li>
							<li><a href="contact-us.html">Buy</a></li>
							<li><a href="contact-us.html">Sell</a></li>
							<li><a href="contact-us.html">Monthly Pay</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-7">
					<img class="imgmenu"
						src="{{Config::get('app.url')}}/frontend/images/home/right-menu.png" />
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
					</div>
					<div class="category-tab">
						<div class="mainmenu">
							<ul class="nav nav-tabs navbar-nav collapse navbar-collapse">
								<li><a href="{{Config::get('app.url')}}">Home</a></li>
								@foreach($maincategories as $categorylist)
								<li><a href="#{{$categorylist->id}}" data-toggle="tab"><?php echo $categorylist->{'name_'.Session::get('lang')};?></a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-content">
				@foreach ($maincategories as $subcategorylist)
					<nav class="navbar navbar-default tab-pane fade in submenu-bar" role="navigation" id="{{$subcategorylist->id}}">
				        <!-- Brand and toggle get grouped for better mobile display -->
				        <div class="container">
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-{{$subcategorylist->id}}">
				                    <span class="sr-only">Toggle navigation</span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				            </div>
				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-{{$subcategorylist->id}}">
				                <ul class="nav navbar-nav">
					                    <?php
											$subcategoriesobj = new MCategory();
											$sub = $subcategoriesobj->getSubCategories($subcategorylist->id);
											if(count($sub) > 0){
												foreach ($sub as $row) {
													echo '<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href='.URL::to('product/'.$row->id).'>'.$row->{'name_'.Session::get('lang')}.'</a>';
													$subcategoriesobj->getSubCategoriesDropdown($row->id);
												}
											}
										?>
								</ul>
							</div><!-- /.navbar-collapse-->
						</div>
					</nav>
				@endforeach 
			</div>
			<div class="row">
				<!-- ========Start Breadcrumb here============ -->
				<session id="breadcrumb"> <!--@yield('breadcrumb')--> </session>
				<!-- ========End Breadcrumb here============ -->
			</div>
		</div>
	</div>
</header>
	<!--==============Closing header=========-->