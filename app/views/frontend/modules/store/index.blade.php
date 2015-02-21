@extends('frontend.modules.store.layout.layout') 
@section('title') 
	Home 
@endsection
@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
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
						<li><strong>The latest products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
						<li>Companies :<span class="number-display">25</span></li>
						<li>Home Shop :<span class="number-display">25</span></li>
						<li>Individual : <span class="number-display">25</span></li>
						<li>View :<span class="number-display">25</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="padding:0;">
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content"> 
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="{{Config::get('app.url')}}/frontend/images/home/nokia-lumia.jpg" alt="" />
							</a>
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="{{Config::get('app.url')}}/pro/simple-product-name/123">View Details</a>
						</div>
						<a href="#" data-toggle="modal" data-target="#myModal">
							<div class="product-overlay">
								<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" data-toggle="modal" data-target="#myModal">
											View Details
										</a>
								</div>
							</div>
						</a>
						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
<nav align="center">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>









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
@section('client_location')
	<?php //include('frontend.partials.client_location');?>
@endsection
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
