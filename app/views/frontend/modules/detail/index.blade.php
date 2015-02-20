@extends('frontend.layout') 
@section('title') 
Categories 
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li class="active">Data</li>
</ol>
@endsection
@section('content')

<div class="col-sm-10">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li>
							<span id="grid_view">Grid View</span> |
							<span id="list_view">List View</span> |
							<span id="social_view">Social View</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
				<div class="col-lg-12 product_list_container">
					<div class="media commnets">
						<a href="#" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$ 20.00</a>
							</div>
						</div>
					</div>
				</div>
				<div class="product_list_container">
					<div class="media commnets">
						<a href="#" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$20.00</a>
							</div>
						</div>
					</div>
				</div><div class="product_list_container">
					<div class="media commnets">
						<a href="#" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$ 20.00</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 product_list_container">
					<div class="media commnets">
						<a href="#" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$20.00</a>
							</div>
						</div>
					</div>
				</div><div class="product_list_container">
					<div class="media commnets">
						<a href="#" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$ 20.00</a>
							</div>
						</div>
					</div>
				</div>
				<div class="product_list_container">
					<div class="media commnets">
						<a href="#" class="pull-left product_image">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$20.00</a>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Product details title</h4>
	      </div>
	      <div class="modal-body">
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
			                                        <img src="{{Config::get('app.url')}}/frontend/images/home/blackview.jpg"></div>
			
			                                        <div class="item" data-slide-number="1">
			                                        <img src="{{Config::get('app.url')}}/frontend/images/home/blackview.jpg"></div>
			
			                                        <div class="item" data-slide-number="2">
			                                        <img src="{{Config::get('app.url')}}/frontend/images/home/blackview.jpg"></div>
			
			                                        <div class="item" data-slide-number="3">
			                                        <img src="{{Config::get('app.url')}}/frontend/images/home/blackview.jpg"></div>
			
			                                        <div class="item" data-slide-number="4">
			                                        <img src="{{Config::get('app.url')}}/frontend/images/home/blackview.jpg"></div>
			
			                                        <div class="item" data-slide-number="5">
			                                        <img src="{{Config::get('app.url')}}/frontend/images/home/blackview.jpg"></div>
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
			                                    <h2>Slider One</h2>
			                                    <p>Lorem Ipsum Dolor</p>
			                                    <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
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
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<!--<button type="button" class="btn btn-primary">Save changes</button> -->
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

