@extends('frontend.layout') @section('title') Product Details
@endsection @section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li class="active">Supper Market</li>
</ol>
@endsection @section('content')
{{ App::make('FePageController')->mainCategory() }}
<div class="col-lg-10">
	<!-- ============Relative post=============== -->
	<div class="col-lg-10" style="padding-top:10px;background-color:fcfcfc;">
		<?php
		$images = json_decode ( $detailProduct->pictures, true );
		?>
		<div class="col-lg-12">
			<div class="col-lg-9 pull-right">
				<div class="col-lg-12 top-detail-ads">
					Top ads
				</div>
			</div>
			<div class="col-lg-3 store-name">
				<img src="{{Config::get('app.url')}}frontend/images/user_store.png" title="" alt="" style="float:left;"/>
				<div class="col-lg-10 pull-right" style="margin-top:8px;"><b>Store Name</b></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="col-lg-12">
			<div class="col-lg-12 title-detail">
				{{$detailProduct->title}}
			</div>
			<div class="clear"></div>
			<div id="main_area">
				<!-- Slider -->
				<div class="row">
					<div class="col-xs-12" id="slider">
						<!-- Top part of the slider -->
						<div class="row">
							<div class="col-sm-8" id="carousel-bounding-box">
								<div class="carousel slide" id="DetailCarousel">
									<!-- Carousel items -->
									<div class="carousel-inner">
										<?php
										$thumbnail_id = 0;
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
									<a class="left carousel-control" href="#DetailCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>                                       
                                    </a>
                                    <a class="right carousel-control" href="#DetailCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>                                       
                                    </a>   
									<!-- Carousel nav -->
								</div>
								<div class="row col-lg-12">
									<div class="row hidden-xs" id="slider-thumbs">
										<!-- Bottom switcher of slider -->
										<ul class="hide-bullets">
											<?php $thumbnails_id = 0; ?>
												@foreach($images as $image)
													<li class="col-sm-3"><a class="thumbnail"
												id="popup-carousel-selector-<?= $thumbnails_id;?>"> <img
													src="{{Config::get('app.url')}}/upload/product/thumb/{{$image['pic']}}">
											</a></li>
													<?php $thumbnails_id++; ?>
												@endforeach
											</ul>
									</div>
								</div>
							</div>
							<div class="col-sm-4" id="carousel-text"></div>
							<div id="slide-content" style="display: none;">
								<div id="slide-content-0">
									
									<div class="col-lg-12 text-centered" style="border:1px solid #dddddd;background-color:#dddddd;padding:5px 10px;font-weight:bold;font-size:18px;">Current Price : <span class="price">{{$detailProduct->price}}$</span></div>
									<div class="clear"></div>
									<div>Genuine Price &nbsp;<span class="pro-condition">500$</span></div>
									<div>Discount &nbsp;<span class="pro-condition">10%</span></div>
									<div>Product ID   &nbsp;<span class="pro-condition">{{$detailProduct->id}}</span></div>
									<div>View &nbsp;<span class="pro-condition">200</span></div>
									<div>Post Date :&nbsp;<span class="pro-condition"><?php echo date("d/M/Y",strtotime($detailProduct->created_date)); ?> </span></div>
									<div>Post by :&nbsp;<span class="pro-condition">KIMHIM</span></div>
									<div>Location :&nbsp;<span class="pro-condition">Phnom Penh</span></div>
									<div class="clear"></div>
									<div class="col-lg-12 text-centered" style="background-color:#eea236;padding:5px 10px;text-align:center;"><a href="#" style="color:white;font-weight:bold;">www.khmerabba.com/kimhim</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/Slider-->
			</div>
			<input
				class="btn btn-primary" 
				type="button" 
				onclick="ProductDetailPrint.print_product_detail('main_area')" 
				value="Print Product" 
			/>
			<div class="row col-lg-12">
				<ul id="TapTitle" class="nav nav-tabs">
				   <li class="active"><a href="#speification_detail" data-toggle="tab">Specification Detail</a></li>
				   <li><a href="#picture_summary" data-toggle="tab">Picture Summary</a></li>
				   <li class="dropdown">
				      <a href="#location_map" data-toggle="tab">Location Map </a>
				   </li>
				   <li class="dropdown">
				      <a href="#contact" data-toggle="tab">Contact</a>
				   </li>
				   <li class="dropdown">
				      <a href="#quotation" data-toggle="tab">Quotation</a>
				   </li>
				</ul>
				<div id="productTabContent" class="tab-content">
				   <div class="tab-pane fade in active" id="speification_detail">
				      <p>Tutorials Point is a place for beginners in all technical areas. 
				         This website covers most of the latest technoligies and explains 
				         each of the technology with simple examples. You also have a 
				         <b>tryit</b> editor, wherein you can edit your code and 
				         try out different possibilities of the examples.</p>
				   </div>
				   <div class="tab-pane fade" id="picture_summary">
				      <p>iOS is a mobile operating system developed and distributed by Apple 
				         Inc. Originally released in 2007 for the iPhone, iPod Touch, and 
				         Apple TV. iOS is derived from OS X, with which it shares the 
				         Darwin foundation. iOS is Apple's mobile version of the 
				         OS X operating system used on Apple computers.</p>
				   </div>
				   <div class="tab-pane fade" id="location_map">
				      <p>jMeter is an Open Source testing software. It is 100% pure 
				      Java application for load and performance testing.</p>
				   </div>

				   <div class="tab-pane fade" id="contact">
				      <p>Contact to prodcut poster is add here</p>
				   </div>

				   <div class="tab-pane fade" id="quotation">
				      <p>Quotation will be here</p>
				   </div>
				</div>
				<script>
				   $(function(){
				      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				      // Get the name of active tab
				      var activeTab = $(e.target).text(); 
				      // Get the name of previous tab
				      var previousTab = $(e.relatedTarget).text(); 
				      $(".active-tab span").html(activeTab);
				      $(".previous-tab span").html(previousTab);
				   });
				});
				</script>
			</div>
			<div class="clear"></div><div class="clear"></div>
			<div class="col-lg-3 text-centered" style="border:1px solid #dddddd;background-color:#dddddd;padding:5px 10px;font-weight:bold;text-align:center;">Related Products</div>
			{{
			App::make('FePageController')->findRelatedProducts($detailProduct->s_category_id)
			}}
			<br />
		</div><!--============End detail container hre=====-->
	</div>
	<div class="col-lg-2 pull-right right-ad-detail">
		@include('frontend.partials.categories.right')
	</div>
@endsection
<script
	src="{{Config::get('app.url')}}/frontend/js/product_detail_print.js"></script>
<script
	src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css"
	href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script
	src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>

{{HTML::script('frontend/js/jquery.js')}}
<script>
	jQuery(document).ready(function(){
		jQuery(".categories_menu").hide();
		jQuery("#menu_toogle").css('cursor','pointer');
		jQuery("#menu_toogle").click(function(){
			jQuery(".categories_menu").toggle("slow");
		});
	});
</script>
