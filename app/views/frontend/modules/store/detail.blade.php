@extends('frontend.modules.store.layout.layout')
<?php
date_default_timezone_set ( 'Asia/Phnom_Penh' );
$currentDate = date ( 'Y-m-d' );

$userClass = new User ();
$userData = $userClass->getUser ( $dataStore->user_id );
$currentUserType = $userData->result->account_type;
if (! empty ( $dataStore->sto_url )) {
	$userHome = @Config::get ( 'app.url' )  . $dataStore->sto_url;
} else {
	$userHome = @Config::get ( 'app.url' ) . 'store-' . $dataStore->id;
}
//$title = $dataProductDetail->{'title_' . Session::get ( 'lang' )};
$title = $dataProductDetail->title;
if (empty ( $title )) {
	$title = $dataProductDetail->title;
}
$pictures = @json_decode ( $dataProductDetail->pictures, true );
?>
@section('title')
	@if (!empty($dataProductDetail))
		{{$title}}
	@endif
@endsection
@section('description')@if(!empty($dataProductDetail->description)){{$dataProductDetail->description}} @endif @endsection
@section('breadcrumb')
<ol class="breadcrumb">
	<li><a href="{{Config::get('app.url')}}">Home</a></li>
	<li><a href="#">Library</a></li>
	<li class="active">Data</li>
</ol>
@endsection @section('content')
	<div class="col-xs-12">
		<div class="row">
			<div class="col-lg-12"
				style="background-color: #FFF; border: 1px solid #CCC; margin: 2px 0 10px 0">
				<div class="col-lg-9 pull-right">
					<div class="col-lg-12" style="padding: 10px;">
								<?php $contactInfo = json_decode($dataProductDetail->contact_info); ?>
			                   <ul id="Detail-Top-Contact">
							<li><label>Name :</label> {{$contactInfo->contactName}}</li>
							<li><label>Tel :</label> {{$contactInfo->contactHP}}</li>
							<li><label>Email :</label> {{$contactInfo->contactEmail}}</li>
							<li><label>Location :</label> {{$contactInfo->contactLocation}}</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 store-name"
					style="padding: 10px 10px 10px 10px;">
					@if($dataStore->image)
					{{HTML::image("image/phpthumb/$dataStore->image?p=store&amp;h=80&amp;w=150",$title)}}
					@else
					{{HTML::image("image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;",$title)}}
					@endif
				</div>
			</div>
		</div>
		<!-- Top part of the slider -->
		<div style="clear: both"></div>
		<div class="row">
			<div style="clear: both; margin-top: 10px"></div>
			<h2 class="title text-center">{{$title}}</h2>
			<div class="col-sm-8" id="carousel-bounding-box">
				<div class="carousel slide" id="DetailCarousel" data-ride="carousel">
					<!-- Carousel items -->
					<div class="carousel-inner">
							@if (!empty($dataProductDetail))
								<?php
								$i = 0;
								?>
					    		@foreach($pictures as $picture)
					    			<?php $active = ($i === 0) ? 'active': ''; ?>
									<div class="{{$active}} item" data-slide-number="{{$i}}">
										<?php $imageSlide = @$picture['pic'];?>
										@if(!empty($imageSlide))
										<a class="slideshow-group" href="{{Config::get('app.url')}}image/phpthumb/{{$imageSlide}}?p=product"  title="{{$title}}" rel="slideshow-group">
											{{HTML::image("image/phpthumb/$imageSlide?p=product&amp;h=250&amp;w=550",$title)}}
										</a>
										@else
										<a class="slideshow-group" href="{{Config::get('app.url')}}image/phpthumb/{{$imageSlide}}?p=product">
											{{HTML::image("image/phpthumb/No_image_available.jpg?p=product&amp;h=250&amp;w=550",$title)}}
										</a>
										@endif
									</div>
									<?php $i++; ?>
								@endforeach
							@endif
						</div>
					<!-- Carousel nav -->
					<a class="left carousel-control" href="#DetailCarousel" role="button"
						data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
					</a> <a class="right carousel-control" href="#DetailCarousel"
						role="button" data-slide="next"> <span
						class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>

				<!-- thumb -->
				<div class="row hidden-xs" id="slider-thumbs">
					<!-- thumb -->
					<?php $num = 1;$to=0; $totalImg = count($pictures);?>
						@if (!empty($dataProductDetail))
						<div id="similar-product" class="carousel slide">
						  <!-- Wrapper for slides -->
						    <div class="carousel-inner" style="height: 100px">
						    	@if (!empty($dataProductDetail))
								<?php
								$num = 1;
								$to = 0;
								?>
					    		@foreach($pictures as $picture)

					    		<?php
						    	if($num==1) {
						    		$classA='active';
						    	} else {
						    		$classA='';
						    	}
								if ($num % 4 == 1) {
                                    echo '<div class="item '.$classA.'">';
                                }
						    	$thumb = $picture['pic']?>
								  <a href="javascript:void(0);" data-target="#DetailCarousel" data-slide-to="{{$to}}">{{HTML::image("image/phpthumb/$thumb?p=product&amp;h=90&amp;w=100")}}</a>
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
							@endif
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
				<!-- end thumb -->
				</div>
				<!-- end thumb -->

			</div>
			<div class="col-sm-4" id="carousel-text">
				<div id="slide-content-0">
					<div class="col-lg-12 text-centered"
						style="border: 1px solid #dddddd; background-color: #dddddd; padding: 5px 10px; font-weight: bold; font-size: 18px;">
						Current Price : <span class="price">{{$dataProductDetail->price}}$</span>
					</div>
					<div class="clear"></div>
					<div>
						Product ID: &nbsp;<span class="pro-condition">{{$dataProductDetail->id}}</span>
					</div>
					<div>
						View: &nbsp;<span class="pro-condition"><?php echo $dataProductDetail->view;?></span>
					</div>
					<div>
						Post Date :&nbsp;<span class="pro-condition"><?php echo date("d/M/Y",strtotime($dataProductDetail->created_date)); ?> </span>
					</div>
					<div>
						Transfer :&nbsp;<span class="pro-condition">{{$dataProductDetail->{'type_name_'.Session::get('lang')};}}</span>
					</div>
					<div>
						Condition :&nbsp;<span class="pro-condition">{{$dataProductDetail->{'pcon_name_'.Session::get('lang')};}}</span>
					</div>
					<div>
						Status :&nbsp;<span class="pro-condition">{{Product::getProductStatus($dataProductDetail->pro_status)}}</span>
					</div>
					<hr />
					<div>
						Company type :&nbsp;<span class="pro-condition">{{$dataProductDetail->{'role_name_'.Session::get('lang')};}}</span>
					</div>
					<div>
						Bussiness site :&nbsp;<span class="pro-condition">{{$dataProductDetail->{'client_type_name_'.Session::get('lang')};}}</span>
					</div>
					<div>
						Post by :&nbsp;<span class="pro-condition">{{$dataProductDetail->name}}</span>
					</div>
					<div class="clear"></div>
					<div class="col-lg-12 text-centered"
						style="background-color: #eea236; padding: 5px 10px; text-align: center;">
						<a
							href="{{$userHome}}"
							style="color: white; font-weight: bold;" target="_blank">
							{{$userHome}}
						</a>
					</div>
				</div>
			</div>
		</div>

	<!-- tab -->
	<style>
.category-tab ul.product-detail {
	border: none !important
}

.product-detail>li {
	padding: 5px 8px;
}
#similar-product .item-control{top: 35%;}
</style>
	<div class="category-tab shop-details-tab">
		<!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs product-detail" style="background: #999">
				<li class="active"><a href="#speification_detail" data-toggle="tab">Specification
						Detail</a></li>
				<li><a href="#picture_summary" data-toggle="tab">Picture Summary</a></li>
				<li class="dropdown"><a href="#location_map" data-toggle="tab">Location
						Map </a></li>
				<li class="dropdown"><a href="#contact" data-toggle="tab">Contact</a>
				</li>
				<li class="dropdown"><a href="#quotation" data-toggle="tab">Quotation</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="speification_detail">
				{{$dataProductDetail->description}}</div>
			<div class="tab-pane fade" id="picture_summary">
				@foreach($pictures as $image)
				<div class="col-lg-12">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo center-image">
											<?php
											if ($image ['pic']) {
												echo '<img src="' . Config::get ( 'app.url' ) . 'image/phpthumb/' . $image ['pic'] . '?p=product&amp;h=250&amp;w=450" />';
											} else {
												echo '<img src="' . Config::get ( 'app.url' ) . 'image/phpthumb/No_image_available.jpg?p=product&amp;h=250&amp;w=450" />';
											}
											?>
										</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="tab-pane fade" id="location_map">
				   		<?php $locationArr = json_decode($dataProductDetail->address); ?>
				   		<input type="text"
					value="{{$locationArr->g_latitude_longitude}}"
					name="gLatitudeLongitude" class="hide" id="latbox"
					aria-describedby="MappingAddressHereStatus" /> <span
					data="MappingAddressHere"
					class="glyphicon glyphicon-remove form-control-feedback"
					aria-hidden="true"></span> <span id="MappingAddressHereStatus"
					class="sr-only"> (error) </span>
				<div id="mapWrapper" style="">
					<div id="gmap" style="width: 100%; height: 375px"></div>
				</div>
			</div>

			<div class="tab-pane fade" id="contact">
				   		<?php $contactInfo = json_decode($dataProductDetail->contact_info); ?>
						<p>
					<label>Contact Name:</label> {{$contactInfo->contactName}}
				</p>
				<p>
					<label>Contact Email:</label> {{$contactInfo->contactEmail}}
				</p>
				<p>
					<label>Telephone:</label> {{$contactInfo->contactHP}}
				</p>
				<p>
					<label>Location:</label> {{$contactInfo->contactLocation}}
				</p>
			</div>

			<div class="tab-pane fade" id="quotation">
				<a
					href="{{Config::get('app.url')}}upload/quotation/{{$dataProductDetail->file_quotation;}}">
					{{$dataProductDetail->file_quotation;}} </a>
			</div>

		</div>
	</div>
	<!-- end tab content -->
	@if(!empty($relatedProduct))
	<div class="recommended_items">
		<h2 class="title text-center">Related Products</h2>
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>

				<?php $numA = 1;
		    	?>
		    	@foreach($relatedProduct as $related)
		    	<?php
		    		$proIdRelated = $related->id;
						    	$titleR = $related->title;
						    	if (empty ( $titleR )) {
						    		$titleR = $related->title;
						    	}
						    	if($numA==1) {
						    		$classB='active';
						    	} else {
						    		$classB='';
						    	}
								if ($numA % 4 == 1) {
                                    echo '<div class="item '.$classB.'">';
                                }
                                $picturesR = @json_decode ( $related->pictures, true );
						    	$thumbB = @$picturesR[0]['pic']?>
							  <div class="col-lg-3 col-sm-4 col-xs-4 hidden-md hidden-xs hidden-sm">
								  <div class="product-image-wrapper">
								  	<div class="single-products">
								  		<div class="productinfo text-center page-product-list">
									  		<a href="{{$userHome}}/my/detail/{{$related->id}}">
											  {{HTML::image("image/phpthumb/$thumbB?p=product&amp;h=120&amp;w=145",$titleR)}}
											</a>
											<h2>${{$related->price}}</h2>
											<p><a href="{{Config::get('app.url')}}product/details/{{$proIdRelated}}"><?php echo str_limit($titleR,$limit = 10, $end = '...')?></a></p>
								  		</div>
								  	</div>
								  </div>
							  </div>
				<?php
				if ($numA % 4 == 0) {
					echo "</div>";
				}
				$numA++;
				?>

				@endforeach
				<?php
				if ($numA % 4 != 1) {
					echo "</div>";
				}
				?>
				</div>
			</div>
		</div>
	@endif
	<!-- end recommended items -->
    </div>
@endsection
@section('left')
<?php
	if (!empty($toolView )){
		foreach ($toolView as $tool ){
			if($tool->type == 'tool_memeber_status' && $tool->status == 1){
				include('frontend.modules.store.partials.slidebar.memeber_status');
			}
		}
	}
?>
	@if(!empty($banner)) 
		@foreach($banner as $ban) 
			@if($ban->ban_position == 'ls') 
				@if($ban->ban_enddate >= $currentDate)
    				<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
        				src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
        				style="width: 100%;" />
        			</a>
    			@endif
            @endif
        @endforeach
    @endif
    <!-- In case interprice user -->
    @if($currentUserType == 2)
        {{ App::make('FePageController')->getFeAds(6, 6, 3) }}
    @else
        {{ App::make('FePageController')->getFeAds(7, 6, 3) }}
    @endif
@endsection

@section('right')
    @include('frontend.modules.store.partials.slidebar.fb_like')
    <?php $memberTool = array ();?>
    @if (! empty ( $toolView ))
        @foreach ( $toolView as $tool )
            @if($tool->type == 'tool_visitor_info' && $tool->status == 1)
            @include('frontend.modules.store.partials.slidebar.tool_visitor')
            @endif
        @endforeach
    @endif

    @if(!empty($banner))
        @foreach($banner as $ban)
            @if($ban->ban_position == 'rs')
                @if($ban->ban_enddate >= $currentDate)
                <a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
                    src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
                    style="width: 100%;" /></a>
                @endif
            @endif
        @endforeach
    @endif
    <!-- In case interprice user -->
    @if($currentUserType == 2)
        {{ App::make('FePageController')->getFeAds(6, 7, 3) }}
    @else
        {{ App::make('FePageController')->getFeAds(7, 7, 3) }}
    @endif
@endsection