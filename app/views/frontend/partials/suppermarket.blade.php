@extends('frontend.layout') 
@section('title') 
Product by location 
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Supper Market</li>
</ol>
@endsection
@section('content')
<div class="col-lg-10">
	<div class="col-lg-1" style="border:1px solid red;">
	Lefe
	</div>
	<div class="col-sm-10">
		<div class="features_items">
		 	@foreach($listMarket as $markets)
		 	<?php 
				//var_dump($markets);
			?>
			<div class="col-lg-6">
				<div class="col-lg-12" style="padding:0;margin:0;">
					<div class="col-lg-12">
						View:
						<a href="#">&nbsp;&nbsp;Stores &nbsp;&nbsp;|</a>
						<a href="#">Products</a>
					</div>
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6" style="padding:0">
							<!--<img class="img-thumbnail img-responsive" alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">-->
							{{HTML::image("upload/market/thumb/".$markets->image,$markets->title_en,array('class'=>'img-thumbnail img-responsive col-lg-12'))}}
						</a>
						
						<div class="media-body img-thumbnail" style="padding:14px;">
							<h4 class="media-heading"><?php echo $markets->{'title_'.Session::get('lang')} ?></h4>
							<h5>Stair : <span class="number-display"><?php echo $markets->amount_stair;?></span></span></h5> 
							<h5>Stores : <span class="number-display">10</span></span></h5> 
							<h5>Product : <span class="number-display">200</span></span></h5> 
							<h5>Location : <span class="number-display">Phnom Penh</span></span></h5>
							<h5>Date : <span class="number-display"><?php echo $markets->created_date;?></span></span></h5> 
						</div>
						<br />
						<div class="col-lg-12 img-thumbnail img-responsive">
							<?php echo $markets->{'desc_'.Session::get('lang')}?>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col-lg-1" style="border:1px solid red;">
		Right
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
			                </div>
			                <!--/Slider-->
			
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
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

