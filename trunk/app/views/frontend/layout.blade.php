	@include('frontend.partials.header')

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="col-lg-9 pull-right" style="padding:0;">
						<div class="search_box">
							<form class="navbar-form search-form" role="search">
							    <div class="form-group col-sm-12">
							    	<div class="col-lg-12">
							    		<button type="submit" class="btn btn-success pull-right">
							    			<span class="glyphicon glyphicon-search"></span>
							    		</button>
							    		<input type="text" class="form-group col-lg-11 pull-left search-box" placeholder="Search">
							    	</div>
							    </div>
							</form>
						</div>
					</div>
					<div class="col-lg-3">
						<!-- Single button -->
						<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle top-post" data-toggle="dropdown" aria-expanded="false">
						    Type <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="#">Action</a></li>
						    <li><a href="#">Another action</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li class="divider"></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
						</div>
						
						<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle top-post" data-toggle="dropdown" aria-expanded="false">
						    Location <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="#">Action</a></li>
						    <li><a href="#">Another action</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li class="divider"></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
	@include('frontend.partials.menu')
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.partials.left')
				@yield('content')
				@include('frontend.partials.right')
			</div>
			<br />
			<div class="row">
				<div class="col-lg-12" style="border:1px solid #ddd;padding:0;">
					<div class="col-lg-3" style="border-right:0px solid #ddd;padding:10px;">
						<center><div class="btn btn-warning">Summary in each locations</div></center>
					</div>
					<div class="col-lg-9" style="padding:10px;border-left:1px solid #ddd;">
						@foreach($Provinces as $province)
						<div class="btn btn-default" style="margin:5px;padding:5px;border-radius:0;min-width:160px;font-size:12px;">
							{{$province->province_name}} &nbsp;&nbsp;<span class="number-display">200</span>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-12 productinfo text-center" style="border:1px solid #ddd;">
					<div class="col-lg-3" style="border-right:0px solid #ddd;padding:10px;">
						<center><div class="btn btn-warning">Summary in each locations</div></center>
					</div>
					<div class="col-lg-9" style="padding:10px;border-left:1px solid #ddd;">
						@foreach($Provinces as $province)
						<div class="btn btn-default" style="margin:5px;padding:5px;border-radius:0;min-width:160px;font-size:12px;">
							{{$province->province_name}} &nbsp;&nbsp;<span class="number-display">200</span>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-12 productinfo text-center" style="border:1px solid #ddd;">
					<div class="col-lg-3" style="border-right:0px solid #ddd;padding:10px;">
						<center><div class="btn btn-warning">Summary in each locations</div></center>
					</div>
					<div class="col-lg-9" style="padding:10px;border-left:1px solid #ddd;">
						@foreach($Provinces as $province)
						<div class="btn btn-default" style="margin:5px;padding:5px;border-radius:0;min-width:160px;font-size:12px;">
							{{$province->province_name}} &nbsp;&nbsp;<span class="number-display">200</span>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<br />
		</div>
	</section>
	@include('frontend.partials.footer');
