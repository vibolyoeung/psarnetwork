@extends('frontend.layout') @section('title') Product Details
@endsection @section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li class="active">Supper Market</li>
</ol>
@endsection @section('content')
@include('frontend.partials.menu', array('page' => 'detial'))
<!-- Put true is detials page for get advertisement for left side -->
{{ App::make('FePageController')->mainCategory(true) }}
<div class="col-lg-10">
	<!-- ============Relative post=============== -->
	<div class="col-lg-10" style="padding-top:10px;background-color:#fcfcfc;">
		<?php
		$images = json_decode($productdetails->pictures,true);
		?>
		<div class="col-lg-12" style="background-color:#FFF; border:1px solid #CCC;">
			<div class="col-lg-9 pull-right">
				<div class="col-lg-12" style="padding:10px;">
					<?php $contactInfo = json_decode($productdetails->contact_info); ?>
                   <ul id="Detail-Top-Contact">
						<li><label>Name :</label> {{$contactInfo->contactName}}</li>
						<li><label>Tel :</label> {{$contactInfo->contactHP}}</li>
						<li><label>Email :</label> {{$contactInfo->contactEmail}}</li>
						<li><label>Location :</label> {{$contactInfo->contactLocation}}</li>
                    </ul>
				</div>
			</div>
			<div class="col-lg-3 store-name" style="padding:10px 10px 10px 10px;">
				<?php
					if($productdetails->image){
						echo '<img src="'.Config::get('app.url').'upload/store/'.$productdetails->image.'" />';
					}else{
						echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;" />';
					}
				?>
				<div class="col-lg-10 pull-right" style="margin-top:8px;"><b>{{$productdetails->{'title_'.Session::get('lang')};}}</b></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="col-lg-12">
			<div class="col-lg-12 title-detail">
				{{$productdetails->title}}
			</div>
			<div class="task-bar">
				<span>
					<input
						class="btn btn-primary"
						type="button"
						onclick="ProductDetailPrint.print_product_detail('main_area')"
						value="Save / Download"
					/>
				</span>
				<span class="pull-right store-link">
					Visit Store:
						<a href="{{Config::get('app.url')}}store-{{$productdetails->store_id;}}" style="font-weight:bold;" target="_blank">
							{{Config::get('app.url')}}store-{{$productdetails->store_id;}}
						</a>
				</span>
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
										<?php
										$classB='';
										if($thumbnail_id==0) {
								    		$classB='active';
								    	}
										?>
										<div class="item <?php echo $classB; ?>"
											data-slide-number="<?= $thumbnail_id; ?>">
											<a class="slideshow-group" href="{{Config::get('app.url')}}upload/product/{{$image['pic']}}" rel="slideshow-group">
												<?php
													if($image['pic']){
														echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$image['pic'].'?p=product&amp;h=250&amp;w=550" />';
													}else{
														echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=" />';
													}
												?>
											</a>
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

								<div class="row hidden-xs" id="slider-thumbs">
								<!-- thumb -->
									@if (!empty($productdetails))
									<div id="similar-product" class="carousel slide">
									  <!-- Wrapper for slides -->
									    <div class="carousel-inner">
										    	<?php
											    	$num = 1;
											    	$to=0;
										    	?>
										    	@foreach($images as $small)
												    	<?php
												    	if($num==1) {
												    		$classA='active';
												    	} else {
												    		$classA='';
												    	}
														if ($num % 4 == 1) {
						                                    echo '<div class="item '.$classA.'">';
						                                }
												    	$thumb = $small['pic']?>
														  <a href="javascript:;" data-target="#DetailCarousel" data-slide-to="{{$to}}">{{HTML::image("image/phpthumb/$thumb?p=product&amp;h=90&amp;w=105")}}</a>
														<?php
														if ($num % 4 == 0) {
															echo "</div>";
														}
														$to++;
														$num++;
														?>
														@endforeach
														<?php
														if ($num % 4 != 1) {
															echo "</div>";
														}?>
										</div>

										  <!-- Controls -->
										  <a class="left item-control" href="#similar-product" data-slide="prev">
											<i class="fa fa-angle-left"></i>
										  </a>
										  <a class="right item-control" href="#similar-product" data-slide="next">
											<i class="fa fa-angle-right"></i>
										  </a>
									</div>
									@endif
								</div>
							<!-- end thumb -->
							</div>
							<div class="col-sm-4" id="carousel-text"></div>
							<div id="slide-content" style="display: none;">
								<div id="slide-content-0">
									<div class="col-lg-12 text-centered" style="border:1px solid #dddddd;background-color:#dddddd;padding:5px 10px;font-weight:bold;font-size:18px;">Current Price : <span class="price">{{$productdetails->price}}$</span></div>
									<div class="clear"></div>
									<div>Product ID:   &nbsp;<span class="pro-condition">{{$productdetails->id}}</span></div>
									<div>View: &nbsp;<span class="pro-condition"><?php echo $productdetails->view;?></span></div>
									<div>Post Date :&nbsp;<span class="pro-condition"><?php echo date("d/M/Y",strtotime($productdetails->created_date)); ?> </span></div>
									<div>Transfer :&nbsp;<span class="pro-condition">{{$productdetails->{'type_name_'.Session::get('lang')};}}</span></div>
									<div>Condition :&nbsp;<span class="pro-condition">{{$productdetails->{'pcon_name_'.Session::get('lang')};}}</span></div>
									<div>Status :&nbsp;<span class="pro-condition">{{Product::getProductStatus($productdetails->pro_status)}}</span></div>
									<hr />
									<div>Company type :&nbsp;<span class="pro-condition">{{$productdetails->{'role_name_'.Session::get('lang')};}}</span></div>
									<div>Bussiness site :&nbsp;<span class="pro-condition">{{$productdetails->{'client_type_name_'.Session::get('lang')};}}</span></div>
									<div>Post by :&nbsp;<span class="pro-condition">{{$productdetails->name}}</span></div>
									<div class="clear"></div>
									<div class="col-lg-12 text-centered" style="background-color:#eea236;padding:5px 10px;text-align:center;">
										<a href="{{Config::get('app.url')}}store-{{$productdetails->store_id;}}" style="color:white;font-weight:bold;" target="_blank">
										{{Config::get('app.url')}}store-{{$productdetails->store_id;}}
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/Slider-->
			</div>
			<div class="row col-lg-12">
				<ul id="TapTitle" class="nav nav-tabs" style="background-color:#E0E0E0; margin-top:20px; font-size:12px;">
				   <li class="active"><a href="#speification_detail" data-toggle="tab">Specification Detail</a></li>
				   <li><a href="#picture_summary" data-toggle="tab">Picture Summary</a></li>
				   <li class="dropdown">
				      <a href="#location_map" data-toggle="tab">Location Map </a>
				   </li>
				   <li class="dropdown">
				      <a href="#contact" data-toggle="tab">Contact</a>
				   </li>
				   <li class="dropdown">
				      <a href="#full-address" data-toggle="tab">Full Address</a>
				   </li>
				   <li class="dropdown">
				      <a href="#quotation" data-toggle="tab">Quotation</a>
				   </li>
				</ul>
				<div id="productTabContent" class="tab-content">
				   	<div class="tab-pane fade in active" id="speification_detail">
				      {{$productdetails->description}}
				    </div>
					<div class="tab-pane fade" id="picture_summary">
						@foreach($images as $image)
							<div class="col-lg-12">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo center-image">
											<?php
												if($image['pic']){
													echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$image['pic'].'?p=product&amp;h=250&amp;w=450" />';
												}else{
													echo '<img src="'.Config::get('app.url').'image/phpthumb/No_image_available.jpg?p=product&amp;h=250&amp;w=450" />';
												}
											?>
										</div>
									</div>
								</div>
							</div>
						@endforeach
				   </div>
				   <div class="tab-pane fade" id="location_map">
				   		<?php $locationArr = json_decode($productdetails->address); ?>
				   		<input
				   			type="text"
				   			value="{{$locationArr->g_latitude_longitude}}"
				   			name="gLatitudeLongitude"
				   			class="hide"
				   			id="latbox"
				   			aria-describedby="MappingAddressHereStatus"
				   		/>
				   		<span
				   			data="MappingAddressHere"
				   			class="glyphicon glyphicon-remove form-control-feedback"
				   			aria-hidden="true"
				   		></span>
						<span id="MappingAddressHereStatus" class="sr-only">
							(error)
						</span>
				      <div id="mapWrapper" style="">
				      	<div id="gmap" style="width: 100%; height: 375px"></div>
				      </div>
				   </div>

				   <div class="tab-pane fade" id="contact">
				   		<?php $contactInfo = json_decode($productdetails->contact_info); ?>
						<p><label>Contact Name:</label> {{$contactInfo->contactName}}</p>
						<p><label>Contact Email:</label> {{$contactInfo->contactEmail}}</p>
						<p><label>Telephone:</label> {{$contactInfo->contactHP}}</p>
						<p><label>Location:</label> {{$contactInfo->contactLocation}}</p>
				   </div>

				   <div class="tab-pane fade" id="quotation">
				      	<a href="{{Config::get('app.url')}}upload/quotation/{{$productdetails->file_quotation;}}">
							{{$productdetails->file_quotation;}}
						</a>
				   </div>
				    <div class="tab-pane fade" id="full-address">
				      	<a href="{{Config::get('app.url')}}upload/quotation/{{$productdetails->file_quotation;}}">
							{{$productdetails->contact_address;}}
						</a>
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
			<!-- type:detials, position: up on related product, limit -->
			{{ App::make('FePageController')->getHorizontalAds(3, 13, 3) }}
			<div class="col-lg-3 text-centered" style="border:1px solid #dddddd;background-color:#dddddd;padding:5px 10px;font-weight:bold;text-align:center;">Related Products</div>
			{{
			App::make('FePageController')->findRelatedProducts(array($productdetails->category_id))
			}}
			<br />
		</div><!--============End detail container hre=====-->
		<!-- type:detial, position: most buttom, limit -->
		{{ App::make('FePageController')->getHorizontalAds(3, 3, 3) }}
	</div>
	<div class="col-lg-2 pull-right right-ad-detail">
		@include('frontend.partials.details.right')
	</div>
<script
	src="{{Config::get('app.url')}}frontend/js/product_detail_print.js"></script>
<script
	src="{{Config::get('app.url')}}frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css"
	href="{{Config::get('app.url')}}frontend/js/carouselengine/initcarousel-1.css">
<script
	src="{{Config::get('app.url')}}frontend/js/carouselengine/initcarousel-1.js"></script>

<script>
	jQuery(document).ready(function(){
		jQuery("#menu_toogle").css('cursor','pointer');
		
		jQuery(".categories_menu").slideToggle("hide");
		jQuery("#menu_toogle").click(function(){
			jQuery(".categories_menu").slideToggle("slow");
		});

		jQuery(".slideshow-group").colorbox({rel:'slideshow-group', transition:"none", maxWidth:"95%", maxHeight:"95%"});
	});
</script>
@endsection
