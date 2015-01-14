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
<div class="col-sm-8">
	<div class="features_items">	
		@include('frontend.partials.slider')
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><a href="#"><strong>The latest Comercial Ads</strong> &nbsp;&nbsp;&nbsp; &frasl;</a></li> 
						<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
						<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
						<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
						<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
						<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
						<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
						<li><a href="#">View :<strong class="number-display">25</strong></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="col-sm-3">
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
											View Details</a>
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
										View Details</a>
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
										View Details</a>
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
										View Details</a>
									</a>
							</div>
						</div>
					</a>
					<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
				</div>
			</div>
		</div>
	</div>
	<!-- Paginatioin -->
	<div class="col-ms-10">
		<div class="pull-right">
			<nav>
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
		</div>
	</div>
		<!--  -->
	</div>
	<!--features_items-->
	<div class="category-tab feature-ad">
		<!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>The Feature Comercial Consummer Ads</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
				<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
				<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
				<li><a href="#">View :<strong class="number-display">25</strong></a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade active in">
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
								<a href="#" data-toggle="modal" data-target="#myModal">
									<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								</a>
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-shopping-cart"></i>View Details</a>
								</a>
							</div>
							
							<a href="#" data-toggle="modal" data-target="#myModal">
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
											<i class="fa fa-shopping-cart"></i>View Details</a>
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
		<!-- Paginatioin -->
		<div class="col-ms-12 pagination-row">
			<div class="col-ms-4">
				<nav>
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
			</div>
		</div>
		<!--  -->
	</div>
	<!--/category-tab-->
	
	<div class="category-tab feature-ad">
		<!--recommended_items-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>Hot Promotion Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
				<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
				<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
				<li><a href="#">View :<strong class="number-display">25</strong></a></li>
			</ul>
		</div>
		<div id="recommended-item-carousel" class="carousel slide"
			data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
									<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
	</div>
	<br />
	<!-- ============ -->
	<div class="category-tab feature-ad">
		<!--recommended_items-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>New Arrival</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
				<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
				<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
				<li><a href="#">View :<strong class="number-display">25</strong></a></li>
			</ul>
		</div>
		<div id="hotpromotion-item-carousel" class="carousel slide"
			data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
											</a>
										</div>
									</div>
								</a>
								<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
	<br />
	
	<!-- ============ -->
	<div class="category-tab feature-ad">
		<!--recommended_items-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>Second Hand Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
				<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
				<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
				<li><a href="#">View :<strong class="number-display">25</strong></a></li>
			</ul>
		</div>
		<div id="second-hand-item-carousel" class="carousel slide"
			data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
									<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
	
	<!-- ============ -->
	<div class="category-tab feature-ad">
		<!--recommended_items-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>Monthly Pay Products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
				<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
				<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
				<li><a href="#">View :<strong class="number-display">25</strong></a></li>
			</ul>
		</div>
		<div id="monthly-pay-item-carousel" class="carousel slide"
			data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
									<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
	<br />
	
	<!-- ============ -->
	<div class="category-tab feature-ad">
		<!--recommended_items-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>Buyer Request</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
				<li><a href="#">Products : <strong class="number-display">25</strong></a></li>
				<li><a href="#">Stores :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Market :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Companies :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Home Shop :<strong class="number-display">25</strong></a></li>
				<li><a href="#">Individual : <strong class="number-display">25</strong></a></li>
				<li><a href="#">View :<strong class="number-display">25</strong></a></li>
			</ul>
		</div>
		<div id="buyer-request-item-carousel" class="carousel slide"
			data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
					<div class="col-sm-2">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
									<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal">
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
												<i class="fa fa-shopping-cart"></i>View Details</a>
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
				href="#buyer-request-item-carousel" data-slide="prev"> <i
				class="fa fa-angle-left"></i>
			</a> <a class="right recommended-item-control"
				href="#buyer-request-item-carousel" data-slide="next"> <i
				class="fa fa-angle-right"></i>
			</a>
		</div>
	</div>
	<br />
	
	<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> -->
<!--   Launch demo modal -->
<!-- </button> -->

	
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
					<h2>Sample title</h2>
					<p>It is the biggest party night of the year, so get gorgeous with flirty dresses and glittering jewellery.</p>
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
	<!--/recommended_items-->
</div>
@endsection
