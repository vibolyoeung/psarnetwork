	@include('frontend.partials.header')
	<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo pull-left">
							<a href="{{Config::get('app.url')}}"><img src="{{Config::get('app.url')}}/frontend/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="shop-menu pull-left">
							<ul class="nav navbar-nav">
								<li><a href="#"><li class="fa"><a href="#">
									<div class="search_box pull-right">
										<form class="navbar-form navbar-left" role="search">
										    <div class="form-group">
										        <input type="text" class="form-control" placeholder="Search">
										    </div>
										    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
										</form>
									</div>
								</li></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	@include('frontend.partials.menu')
	<section>
		<div class="container">
			<div class="row">
				@yield('content')	
			</div>
		</div>
	</section>
	@include('frontend.partials.footer')
