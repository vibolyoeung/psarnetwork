@extends('frontend.layout') @section('title') Product Details
@endsection @section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li class="active">Supper Market</li>
</ol>
@endsection @section('content')
<div class="col-lg-10">
	<div class="col-sm-12">
		<!-- ============Relative post=============== -->
		<div class="col-lg-12" style="padding: 0;">
			<div class="category-tab feature-ad lastest-post">
				<div class="col-lg-12">
					<h3>Product Details</h3>
				</div>
			</div>
			<?php
			$images = json_decode ( $detailProduct->pictures, true );
			?>
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
												<?php
												$thumbnail_id = 1;
												?>
												@foreach($images as $image)
												<div class="item"
												data-slide-number="<?= $thumbnail_id; ?>">
												<img
													src="{{Config::get('app.url')}}/upload/product/{{$image['pic']}}">
											</div>
													<?php $thumbnail_id++; ?>
												@endforeach
											</div>
										<!-- Carousel nav -->

										<a class="left carousel-control" href="#myCarousel"
											role="button" data-slide="prev"> <span
											class="glyphicon glyphicon-chevron-left"></span>
										</a> <a class="right carousel-control" href="#myCarousel"
											role="button" data-slide="next"> <span
											class="glyphicon glyphicon-chevron-right"></span>
										</a>
									</div>
								</div>
								<div class="col-sm-4" id="carousel-text"></div>
								<div id="slide-content" style="display: none;">
									<div id="slide-content-0">
										<h2 style="color: #285EA0;">{{ $detailProduct->title }}</h2>
										<p class="sub-text">{{ $detailProduct->created_date }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/Slider-->

					<div class="row hidden-xs" id="slider-thumbs">
						<div class="col-lg-8">
							<!-- Bottom switcher of slider -->
							<ul class="hide-bullets">
								<?php $thumbnails_id = 0; ?>
									@foreach($images as $image)
										<li class="col-sm-3"><a class="thumbnail"
									id="carousel-selector-<?= $thumbnails_id;?>"> <img
										src="{{Config::get('app.url')}}/upload/product/thumb/{{$image['pic']}}">
								</a></li>
										<?php $thumbnails_id++; ?>
									@endforeach
								</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<h3 style="color: #285EA0;">Product Details</h3>
					<hr />
					{{ $detailProduct->description }}
				</div>
				{{
				App::make('FePageController')->findRelatedProducts($detailProduct->s_category_id)
				}}
			</div>
		</div>
	</div>
</div>
@endsection
<script
	src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css"
	href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script
	src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

