	@include('frontend.partials.header')
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="search_box">
						<form class="navbar-form" role="search">
						    <div class="form-group col-sm-12">
						    	<div class="col-lg-12">
						    		<button type="submit" class="btn btn-success pull-right">
						    			<span class="glyphicon glyphicon-search"></span>
						    		</button>
						    		<input type="text" class="col-lg-11 pull-left search-box" placeholder="Search">
						    	</div>
						    </div>
						</form>
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
