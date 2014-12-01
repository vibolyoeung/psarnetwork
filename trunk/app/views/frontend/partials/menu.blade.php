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
								<li><a href="#{{$categorylist->id}}" data-toggle="tab">{{$categorylist->name_en}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-content">
				@foreach ($maincategories as $subcategorylist)
					<div class="tab-pane fade in submenu-bar" id="{{$subcategorylist->id}}">
						<div class="row sub-menu">
							<div class="category-tab ">
								<div class="mainmenu">
									<div class="navbar-header"> 
										<button type="button" class="navbar-toggle" data-toggle="collapse">
										data-target=".navbar-collapse">
										<span class="sr-only">Toggle navigation</span> <span>
											class="icon-bar"></span> <span class="icon-bar"></span> <span>
										class="icon-bar"></span>
										</button>
									</div>
									<ul class="nav navbar-nav collapse navbar-collapse submenu tab-pane fade in" >
									<?php
									$subcategoriesobj = new MCategory();
									$sub = $subcategoriesobj->getSubCategories($subcategorylist->id);
									if(count($sub) > 0){
										foreach ($sub as $row) {
											echo '<li><a href="'.URL::to('product/'.$row->id).'">'.$row->name_en.'</a></li>';
										}
									}
									?>
									</ul>
								</div>
							</div>
						</div>
					</div>
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