	@include('frontend.partials.header')

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-5 search-bar">
						<div class="col-lg-8 pull-right" style="padding:0;margin:0;">
							<div class="col-lg-3 pull-right" style="padding:0;margin:0;">
								<button type="submit" class="btn btn-warning pull-right col-lg-12" style="border-radius:0;">
									<span class="glyphicon glyphicon-search"></span> Search
								</button>
							</div>
							<div class="col-lg-9" style="padding:0;margin:0;">
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
									    <li><a href="#">Separated link</a></li>
									  </ul>
								</div>
							</div>
						</div>
					</div>
					<!-- ==========top advertise blog -->
					<div class="col-lg-7 top-advertisement">
						@foreach($advTops as $adv)
						<?php
							$exp_date = $adv->end_date;
							$exp_date =str_replace('/', '-', $exp_date);
							if(strtotime(date("d-m-Y")) <= strtotime($exp_date)){ ?>
								<a href="{{$adv->link_url}}" >
									<img
										src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
										class="img-responsive"
										alt=""
									/>
								</a>
						<?php } ?>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
	{{ App::make('FePageController')->mainCategory() }}
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.partials.left')
				@yield('content')
				@include('frontend.partials.right')
			</div>
		</div>
		<div class="container client_location">
			@yield('client_location')
		</div>
	</section>
	@include('frontend.partials.footer');
