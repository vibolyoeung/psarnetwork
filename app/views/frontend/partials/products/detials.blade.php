@extends('frontend.layout') 
@section('title') 
Product Details
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Supper Market</li>
</ol>
@endsection
@section('content')
<div class="col-lg-10">
	<div class="col-sm-12">
		 <!-- ============Relative post=============== -->
		<div class="col-lg-12" style="padding:0;">
			<div class="category-tab feature-ad lastest-post">
				<div class="col-lg-12">
					<h3>Product Details</h3>
				</div>
			</div>
			<hr />
				<div class="col-lg-12">
					<div id="main_area">
						<!-- Slider -->
						<div class="row">
							<div class="col-xs-12" id="slider">
								<!-- Top part of the slider -->
								<div class="row">
									<div class="col-sm-8" id="carousel-bounding-box">
										<div class="carousel slide" id="myCarousel">
											<!-- Carousel items -->
											<div class="carousel-inner">
												<div class="active item" data-slide-number="0">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail04.jpg">
												</div>

												<div class="item" data-slide-number="1">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail05.jpg">
												</div>

												<div class="item" data-slide-number="2">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail06.jpg">
												</div>

												<div class="item" data-slide-number="3">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail04.jpg">
												</div>
											</div><!-- Carousel nav -->

											<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
												<span class="glyphicon glyphicon-chevron-left"></span>
											</a>
											<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
												<span class="glyphicon glyphicon-chevron-right"></span>
											</a>
										</div>
									</div>
									<div class="col-sm-4" id="carousel-text"></div>
									<div id="slide-content" style="display: none;">
										<div id="slide-content-0">
											<h2 style="color:#285EA0;">What is Lorem Ipsum?</h2>
											<p class="sub-text">October 24 2014</p>
										</div>
									</div>
								</div>
							</div>
						</div><!--/Slider-->

						<div class="row hidden-xs" id="slider-thumbs">
							<div class="col-lg-8">
								<!-- Bottom switcher of slider -->
								<ul class="hide-bullets">
									<li class="col-sm-3">
										<a class="thumbnail" id="carousel-selector-0"><img src="{{Config::get('app.url')}}/frontend/images/productDetail04.jpg"></a>
									</li>

									<li class="col-sm-3">
										<a class="thumbnail" id="carousel-selector-1"><img src="{{Config::get('app.url')}}/frontend/images/productDetail05.jpg"></a>
									</li>

									<li class="col-sm-3">
										<a class="thumbnail" id="carousel-selector-2"><img src="{{Config::get('app.url')}}/frontend/images/productDetail06.jpg"></a>
									</li>

									<li class="col-sm-3">
										<a class="thumbnail" id="carousel-selector-3"><img src="{{Config::get('app.url')}}/frontend/images/productDetail04.jpg"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-12">
						<h3 style="color:#285EA0;">Product Details</h3>
						<hr />
						Lorem ipsum dolor sit amet, his zril insolens at, ea mel labitur utroque offendit, cu dico animal ius. Nec erat dicunt scriptorem ex. Qui suas falli error ex, at est nominavi perfecto partiendo. Et his primis regione. Bonorum fabellas ne vis, sumo oratio vel te. Eius reformidans delicatissimi sea te, ei impetus indoctum euripidis vim, fugit mnesarchum reprimique eum at. Pro ei ignota molestie sadipscing, vel at possim ornatus habemus, vim dicta essent euripidis ne.

Vis timeam mentitum ea. Dolorum legimus atomorum sit et, ea gloriatur dissentiunt pri, ne commune efficiendi qui. Ea duo lorem explicari consectetuer. Ad liber postea vim, cum ubique timeam maluisset at, tale cibo id vix.

Eos simul praesent salutatus ut. Nam alii posse utroque eu, ut efficiendi temporibus mei, ea vis illud iracundia. Ei eum quod malorum dolores. Eos unum quaerendum accommodare te, pri adhuc persecuti id, cum ex reque periculis persecuti. Et nam aeque pertinax. Purto eros cibo cu est. Etiam impedit eu eos.

Vim ad essent officiis consetetur, ex nam labores conclusionemque. Per possit voluptua quaerendum et. Eos odio essent expetendis no, affert malorum adversarium no nec, prima fierent convenire duo ex. Vero detraxit mea id, erant invenire scribentur mea eu. In alii conceptam sed, autem minim tritani id usu.

Solum meliore platonem ex pri, tale eligendi ei vim. Nostrud saperet consequuntur at cum, eirmod tritani forensibus ad eam. Te vim integre scribentur, ea illud mandamus gubergren vel. Ei perfecto singulis persecuti has, eum laoreet accumsan in, mei ut novum constituam disputando. Duo soleat democritum an.
						</div>
				   	@include('frontend.partials.products.related_post')
				</div>	
		</div>
	</div>
</div>
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

