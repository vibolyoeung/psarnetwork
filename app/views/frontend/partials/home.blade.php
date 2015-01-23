@extends('frontend.layout') 
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
<div class="col-lg-11">
	@include('frontend.partials.slider')
</div>
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
								<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
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
		<div class="col-lg-12">
			<!-- Paginatioin -->
			<div class="col-lg-12">
				<nav class="pull-right">
				  <ul class="pagination pagination-sm">
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
			</div>
			<!--  -->
			<div class="col-lg-12" style="border:1px solid #ddd;">
				<center>
					<h3>Advertisment Banner Here</h3>
					<p>(It can be automatically upside down add)</p>
				</center>
			</div>
		</div>
	</div>
	<!--features_items-->
	<div class="category-tab feature-ad lastest-post">
		<div class="col-lg-12">
			<ul class="nav nav-tabs">
				<li><strong>Feature & Popular Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
				<li>Products : <span class="number-display">25</span></li>
				<li>Stores :<span class="number-display">25</span></li>
				<li>Market :<span class="number-display">25</span></li>
				<li>Companies :<span class="number-display">25</span></li>
				<li>Home Shop :<span class="number-display">25</span></li>
				<li>Individual : <span class="number-display">25</span></li>
				<li>View :<span class="number-display">25</span></li>
			</ul>
		</div>
		<div class="col-lg-12">
			<div class="col-lg-1 pull-right" style="border: 1px solid #ddd;padding:0;">
				<img src="{{Config::get('app.url')}}/frontend/images/kiss-mag.gif" class="img-responsive" alt="" title=""/>
			</div>
			<div class="col-lg-1 putll-left" style="border: 1px solid #ddd;padding:0;">
				<img src="{{Config::get('app.url')}}/frontend/images/kiss-mag.gif" class="img-responsive" alt="" title=""/>
			</div>
			<div class="col-sm-10">
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$30.00</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$30.00</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
							<img alt="" src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="blog-socials">
								
								<a href="" class="btn btn-primary">$30.00</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="media commnets">
						<a href="#" class="pull-left col-lg-6">
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
				<div class="cleear"></div>
				<div class="col-ms-12">
					<nav class="pull-right">
					  <ul class="pagination pagination-sm" style="margin:0;">
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
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-lg-12" style="border:1px solid #ddd;">
				<center>
					<h3>Advertisment Banner Here</h3>
					<p>(It can be automatically upside down add)</p>
				</center>
			</div>
		</div>
	</div>
	<br />
	<!--/category-tab-->
	<div class="category-tab feature-ad lastest-post">
	<!--recommended_items-->
		<div class="col-lg-12">
			<div class="col-lg-1 pull-right" style="border: 0px solid #ddd;padding:0;">
				<a href="#">
					<img src="{{Config::get('app.url')}}/frontend/images/kiss-mag.gif" class="img-responsive" alt="" title=""/>
				</a>
			</div>
			
			<div class="col-lg-1 pull-left" style="border: 0px solid #ddd;padding:0;">
				<a href="#">
					<img src="{{Config::get('app.url')}}/frontend/images/kiss-mag.gif" class="img-responsive" alt="" title=""/>
				</a>
			</div>
			
			<div class="col-lg-10">
				<div class="col-lg-12">
					<ul class="nav nav-tabs">
						<li><strong>Hot PromotionProducts</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
						<li>Companies :<span class="number-display">25</span></li>
						<li>Home Shop :<span class="number-display">25</span></li>
						<li>Individual : <span class="number-display">25</span></li>
					<li>View :<span class="number-display">25</span></li>
					</ul>
				</div>
				<div id="recommended-item-carousel" class="carousel slide"
					data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
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
					<a class="left recommended-item-control"
						href="#recommended-item-carousel" data-slide="prev"> <i
						class="fa fa-angle-left"></i>
					</a> <a class="right recommended-item-control"
						href="#recommended-item-carousel" data-slide="next"> <i
						class="fa fa-angle-right"></i>
					</a>
				</div>
				
				<br />
				
				<div class="category-tab feature-ad lastest-post">
				<!--recommended_items-->
				<div class="col-lg-12">
					<ul class="nav nav-tabs">
						<li><strong>New Arrival Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
						<li>Companies :<span class="number-display">25</span></li>
						<li>Home Shop :<span class="number-display">25</span></li>
						<li>Individual : <span class="number-display">25</span></li>
						<li>View :<span class="number-display">25</span></li>
					</ul>
				</div>
				<div id="hotpromotion-item-carousel" class="carousel slide"
					data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
												<i class="fa fa-shopping-cart"></i>
													More Details
											</a>
										</div>
										<a href="#" data-toggle="modal" data-target="#myModal">
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-shopping-cart"></i>View Details
													</a>
												</div>
											</div>
										</a>
										<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<a class="left recommended-item-control"
						href="#hotpromotion-item-carousel" data-slide="prev"> <i
						class="fa fa-angle-left"></i>
					</a> <a class="right recommended-item-control"
						href="#hotpromotion-item-carousel" data-slide="next"> <i
						class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
			<!-- =============End of Monthly -->
			<br />
			<div class="category-tab feature-ad lastest-post">
					<!--recommended_items-->
					<ul class="nav nav-tabs">
						<li><strong>Monthly Pay Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
						<li>Companies :<span class="number-display">25</span></li>
						<li>Home Shop :<span class="number-display">25</span></li>
						<li>Individual : <span class="number-display">25</span></li>
						<li>View :<span class="number-display">25</span></li>
					</ul>
					<div id="second-hand-item-carousel" class="carousel slide"
						data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>s
							</div>
							<div class="item">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
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
						<a class="left recommended-item-control"
							href="#second-hand-item-carousel" data-slide="prev"> <i
							class="fa fa-angle-left"></i>
						</a> <a class="right recommended-item-control"
							href="#second-hand-item-carousel" data-slide="next"> <i
							class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
				<br />
				
				<div class="category-tab feature-ad lastest-post">
					<!--recommended_items-->
					<div class="col-lg-12">
						<ul class="nav nav-tabs">
							<li><strong>Second Hand Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
							<li>Products : <span class="number-display">25</span></li>
							<li>Stores :<span class="number-display">25</span></li>
							<li>Market :<span class="number-display">25</span></li>
							<li>Companies :<span class="number-display">25</span></li>
							<li>Home Shop :<span class="number-display">25</span></li>
							<li>Individual : <span class="number-display">25</span></li>
							<li>View :<span class="number-display">25</span></li>
						</ul>
					</div>
					<div id="monthly-pay-item-carousel" class="carousel slide"
						data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
														</a>
													</div>
												</div>
											</a>
											<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-shopping-cart"></i>
														More Details
												</a>
											</div>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>$56</h2>
														<p>Easy Polo Black Edition</p>
														<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
															<i class="fa fa-shopping-cart"></i>View Details
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
						<a class="left recommended-item-control"
							href="#monthly-pay-item-carousel" data-slide="prev"> <i
							class="fa fa-angle-left"></i>
						</a> <a class="right recommended-item-control"
							href="#monthly-pay-item-carousel" data-slide="next"> <i
							class="fa fa-angle-right"></i>
						</a>
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
	      	<div class="row">
	      		<div class="col-sm-8">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-12 productinfo text-center">
						<center>
							<h3>Advertisment Banner Here</h3>
							<p>(It can be automatically upside down add)</p>
						</center>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="category-tab feature-ad">
			        <div id="product-detail-carousel" class="carousel slide"
						data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="{{Config::get('app.url')}}/pro/simple-product-name/123" class="btn btn-default add-to-cart"><i
														class="fa fa-shopping-cart"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<a class="left recommended-item-control"
							href="#product-detail-carousel" data-slide="prev"> <i
							class="fa fa-angle-left"></i>
						</a> <a class="right recommended-item-control"
							href="#product-detail-carousel" data-slide="next"> <i
							class="fa fa-angle-right"></i>
						</a>
					</div>
				 </div>
				</div>
				<br />
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
