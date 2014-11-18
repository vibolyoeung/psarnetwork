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
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product2.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product3.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product4.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product5.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{Config::get('app.url')}}/frontend/images/home/product6.jpg" alt="" />
						<h2>$56</h2>
						<p>Easy Polo Black Edition</p>
						<a href="#" class="btn btn-default add-to-cart"><i
							class="fa fa-shopping-cart"></i>View Details</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i
								class="fa fa-shopping-cart"></i>View Details</a>
						</div>
					</div>
					<img src="{{Config::get('app.url')}}/frontend/images/home/new.png" class="new" alt="" />
				</div>
			</div>
		</div>
		
	</div>
	<!--features_items-->

	<div class="category-tab feature-ad">
		<!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>Comercial Consummer Ads</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
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
			<div class="tab-pane fade active in" id="tshirt">
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i
									class="fa fa-shopping-cart"></i>View Details</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/category-tab-->

	<div class="category-tab feature-ad">
		<!--recommended_items-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#" ><strong>Comercial Consummer Ads</strong>  &nbsp;&nbsp;&nbsp; &frasl;</a></li>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
							</div>
						</div>
					</div><div class="col-sm-2">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i
										class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i
											class="fa fa-shopping-cart"></i>View Details</a>
									</div>
								</div>
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
	<!--/recommended_items-->

</div>

@endsection
