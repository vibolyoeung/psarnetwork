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
<div class="clear"></div>
@include('frontend.partials.menu')
@section('content')
@include('frontend.partials.left-supermarket')
	<div class="col-lg-10" style="">
		<div class="col-lg-10"  style="padding:0;">
			<div>
				<!-- ============Slider end here========= -->
				<div class="row">
					<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
					<?php
					if(count($listProductSupermarket) > 0){
					?>
						@foreach($listProductSupermarket as $product)
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 grid_view_product">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="#" data-toggle="modal" data-target="#myModal"
												onclick="popupDetails.add_popup_detail(<?php echo $product->id; ?>)">
												<?php
												if($product->thumbnail){
													echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$product->thumbnail.'?p=product&amp;h=130&amp;w=170" />';
												}else{
													echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=130&amp;w=170" />';
												}
												?>
											</a>
											<h5>
												<a href="{{Config::get('app.url')}}product/details/{{$product->id}}">
													{{str_limit($product->title,$limit = 20, $end = '...')}}
												</a>
											</h5>
											<h5>
												<div class="price">$ {{$product->price}}</div>
											</h5>
											<?php
												$contactInfo = json_decode($product->contact_info);
											?>
											<p class="product_teaser">
												{{$product->created_date}}
												&nbsp;
												{{$contactInfo->contactLocation}}
												&nbsp;
												View : <span class="price">12</span>
											</p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list_view_product">
								<div class="product-image-wrapper" style="overflow:hidden;padding-bottom:12px;">
									<div class="single-products">
										<div class="productinfo">
											<div class="col-lg-3" style="padding-left:0;">
												<a href="#" data-toggle="modal" data-target="#myModal"
													onclick="popupDetails.add_popup_detail(<?php echo $product->id; ?>)">
													<?php
													if($product->thumbnail){
														echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$product->thumbnail.'?p=product&amp;h=125&amp;w=170" />';
													}else{
														echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=125&amp;w=170" />';
													}
													?>
												</a>
											</div>
											<div class="col-lg-5" style="border:1px solid #f7f7f5;line-height:2;">
												<div class="col-lg-12" style="padding:0;">
													<div class="pull-right price">{{$product->price}} $</div>
													<h5>
														<a href="{{Config::get('app.url')}}product/details/{{$product->id}}">
															{{str_limit($product->title,$limit = 40, $end = '...')}}
														</a>
													</h5>
													<p>{{str_limit($product->description,$limit = 200, $end = '...')}}</p>
													<p class="product_teaser">
														<span style="color:blue;">{{$product->created_date}}</span>
													&nbsp;
													{{$contactInfo->contactLocation}}
													&nbsp;
													View : <span class="price">{{$product->view}}</span>
													&nbsp;
													Transfer : <span class="price"><?php  echo $product->{'transfer_type_name_'.Session::get('lang')};?></span>
													&nbsp;
													Condition : <span class="price"><?php  echo $product->{'condition_name_'.Session::get('lang')};?></span>
												</p>
												</div>
											</div>
											<div class="col-lg-4 pull-right">
												<div class="col-lg-12" style="border:1px solid #f7f7f5;text-align:center;">
													<h5>
														<a href="#">
															<?php
																$storename = $product->{'title_en'};
															?>
															{{str_limit($storename,$limit = 20, $end = '...')}}
														</a>
													</h5>
													<div class="row">
														<div class="col-lg-7 pull-right" style="text-align:left;">
															<div class="col-lg-12">
																<p>{{$product->username}}<br />
																	<?php echo $product->{'account_role_name_'.Session::get('lang')};?><br />
																	<?php echo $product->{'client_type_name_'.Session::get('lang')};?>
																</p>
															</div>
														</div>
														<div class="col-lg-5 pull-left">
															<?php
																if($product->image){
																	echo '<img src="'.Config::get('app.url').'upload/store/'.$product->image.'" width="110" style="border:1px solid #f7f7f5;" />';
																}else{
																	echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;" />';
																}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					<?php
						}else{
							echo '<p><center style="color:red;">Product not found!</center></p>';
						}
					?>
					</div>
				</div>
			</div>
			<div class="col-lg-2 pull-right" style="padding:0;">
				@include('frontend.partials.categories.right')
			</div>
		</div>
	</div>
@include('frontend.partials.products.popup_details')
@endsection
<script src="{{Config::get('app.url')}}/frontend/js/jquery.js"></script>
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>


