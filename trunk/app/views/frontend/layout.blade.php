	@include('frontend.partials.header')

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-lg-7" style="border:2px solid #F79646;padding:0;margin:0;">
					<div class="col-lg-8 pull-right" style="padding:0;margin:0;">
						<div class="col-lg-2 pull-right" style="padding:0;margin:0;">
							<button type="submit" class="btn btn-warning pull-right col-lg-12" style="border-radius:0;">
								<span class="glyphicon glyphicon-search"></span> Search
							</button>
						</div>
						<div class="col-lg-10" style="padding:0;margin:0;">
							<input type="text" class="form-control" placeholder="Search here" style="border-radius:0;border:none;border-left:1px solid #ddd;"/>
						</div>
					</div>
					<div class="col-lg-4" style="margin:0;padding:0;">
						<div class="col-lg-6 pull-right" style="margin:0;padding:0;">
							<div class="btn-group col-lg-12" style="padding:0;margin:0;">
							<button type="button" class="col-lg-12 btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="border-radius:0;border:none;">
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
						
						<div class="col-lg-6" style="margin:0;padding:0;">
							<div class="btn-group col-lg-12 " style="margin:0;padding:0;">
								  <button type="button" class="col-lg-12 btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="border-radius:0;border:none;border-right:1px solid #ddd;">
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
				<div class="col-lg-12" style="border:1px solid #F7F7F5;padding:0;">
					<div class="col-lg-3" style="border-right:0px solid #ddd;padding:10px;margin-top:55px;">
						<center><div class="btn btn-warning">Summary in each locations</div></center>
					</div>
					<div class="col-lg-9" style="padding:10px;border-left:1px solid #F7F7F5;">
						@foreach($Provinces as $province)
						<div class="btn btn-default" style="border-radius:0;min-width:160px;font-size:12px;border:none;text-align:left;">
							{{$province->province_name}} &nbsp;&nbsp;<span class="number-display">200</span>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-lg-12" style="border:1px solid #F7F7F5;padding:0;">
					<div class="col-lg-3" style="border-right:0px solid #ddd;padding:10px;margin-top:30px;">
						<center><div class="btn btn-warning">Summary in Seller Type</div></center>
					</div>
					<div class="col-lg-9" style="padding:10px;border-left:1px solid #F7F7F5;">
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
								<center>
									Manufatureur
									<br />
									<span class="number-display">200</span>
								</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Suppliyer
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Distribtor
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Retailer 
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Personal Sale
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
					</div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-lg-12" style="border:1px solid #F7F7F5;padding:0;">
					<div class="col-lg-3" style="border-right:0px solid #ddd;padding:10px;margin-top:30px;">
						<center><div class="btn btn-warning">Summary in business site</div></center>
					</div>
					<div class="col-lg-9" style="padding:10px;border-left:1px solid #F7F7F5;">
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
								<center>
									Supper Market<br />
									<span class="number-display">200</span>
								</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Tradictional Market
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Private Company 
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Home Shop
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
						<div class="btn btn-default" style="border:2px solid #F7F7F5;min-width:180px;font-size:12px;text-align:left;padding:15px;margin:13px;">
							<a href="#">
							<center>
								Individual
								<br />
								<span class="number-display">200</span>
							</center>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('frontend.partials.footer');
