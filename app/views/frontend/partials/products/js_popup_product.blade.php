<div id="main_area">
	<!-- Slider -->
	<div class="row">
	<?php
	
	$images = json_decode ($productDetail->pictures, true );
    //var_dump($productDetail);die;
	?>
		<div class="col-xs-12" id="slider">
			<!-- Top part of the slider -->
			<div id="main_area">
                <!-- Slider -->
                <div class="row">
					<div class="col-sm-8" id="carousel-bounding-box">
						<div class="carousel slide" id="DetailPopupCarousel">
							<!-- Carousel items -->
							<div class="carousel-inner">
								<?php 
								$thumbnail_id = 0;
								?>
								@foreach($images as $image)
								<div class="item<?php echo $thumbnail_id == 0?' active':'';?>"
									data-slide-number="<?php echo $thumbnail_id; ?>">
									<img
										src="{{Config::get('app.url')}}upload/product/{{$image['pic']}}">
								</div>
									<?php $thumbnail_id++; ?>
								@endforeach
							</div>
							<!-- Carousel nav -->
						</div>
					</div>
					<div class="col-sm-4" id="carousel-text" style="padding:0;">
                        <div class="col-lg-12 text-centered" style="border:1px solid #dddddd;background-color:#dddddd;padding:5px 10px;font-weight:bold;text-align:center;"> Summary Detail</div>
						<hr>
                        <h4>Price : <span class="price">{{ $productDetail->price }} $</span></h4>
                        <strong>Condition :&nbsp;<span class="pro-condition">New Arrival</span></strong><br />
                        <strong>Post Date :&nbsp;<span class="pro-condition"><?php echo date("d/M/Y",strtotime($productDetail->created_date)); ?> </span></strong>
					    <div class="clear"></div> <div class="clear"></div>
                        <div class="col-lg-12 text-centered" style="background-color:#eea236;padding:5px 10px;text-align:center;"><a href="#" style="color:white;font-weight:bold;">www.khmerabba.com/total</a></div>
                        <div class="clear"></div>
                        <div class="col-lg-12 text-centered" style="background-color:#eea236;padding:5px 10px;font-weight:bold;text-align:center;">
                                <a href="#">See : Page Detail</a></div>
                    </div>
				</div>
            </div>
		</div>
	</div>
	<!--/Slider-->

	<div class="row hidden-xs" id="slider-thumbs">
		<div class="row">
			<!-- Bottom switcher of slider -->
			<ul class="hide-bullets">
			<?php $thumbnails_id = 0; ?>
				@foreach($images as $image)
					<li class="col-sm-3"><a class="thumbnail"
					id="popup-carousel-selector-<?php echo $thumbnails_id;?>">
					<img
						src="{{Config::get('app.url')}}/upload/product/thumb/{{$image['pic']}}">
				</a></li>
					<?php $thumbnails_id++; ?>
				@endforeach
			</ul>
		</div>
	</div>
</div> 

