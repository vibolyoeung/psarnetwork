<!-- Modal -->
<div class="container modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Product details title</h4>
			</div>
			<div class="modal-body modal_container">
				<div class="container">
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
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail01.jpg">
												</div>

												<div class="item" data-slide-number="1">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail02.jpg">
												</div>

												<div class="item" data-slide-number="2">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail03.jpg">
												</div>

												<div class="item" data-slide-number="3">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail04.jpg">
												</div>

												<div class="item" data-slide-number="4">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail05.jpg">
												</div>

												<div class="item" data-slide-number="5">
													<img src="{{Config::get('app.url')}}/frontend/images/productDetail06.jpg">
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
									<li class="col-sm-2">
										<a class="thumbnail" id="carousel-selector-0"><img src="http://placehold.it/170x100&text=one"></a>
									</li>

									<li class="col-sm-2">
										<a class="thumbnail" id="carousel-selector-1"><img src="http://placehold.it/170x100&text=two"></a>
									</li>

									<li class="col-sm-2">
										<a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/170x100&text=three"></a>
									</li>

									<li class="col-sm-2">
										<a class="thumbnail" id="carousel-selector-3"><img src="http://placehold.it/170x100&text=four"></a>
									</li>

									<li class="col-sm-2">
										<a class="thumbnail" id="carousel-selector-4"><img src="http://placehold.it/170x100&text=five"></a>
									</li>

									<li class="col-sm-2">
										<a class="thumbnail" id="carousel-selector-5"><img src="http://placehold.it/170x100&text=six"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-12">
						<h3 style="color:#285EA0;">Product Details</h3>
						<hr />
						<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
					</div>
				   	@include('frontend.partials.products.related_post')
				</div>
			</div>
		</div>
	</div>
</div>