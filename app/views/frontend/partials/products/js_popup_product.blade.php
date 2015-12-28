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
							<div class="carousel-inner detail-popup">
								<?php 
								$thumbnail_id = 0;
								?>
								@foreach($images as $image)
								<div class="item<?php echo $thumbnail_id == 0?' active':'';?>"
									data-slide-number="<?php echo $thumbnail_id; ?>">
									<?php 
									echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$image['pic'].'?p=product&amp;h=250&amp;w=550" />';
									?>
								</div>
								<?php $thumbnail_id++; ?>
								@endforeach 
							</div>
							<a class="left carousel-control" href="#DetailPopupCarousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>                                       
							</a>
							<a class="right carousel-control" href="#DetailPopupCarousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>                                       
							</a> 
							<!-- Carousel nav -->
						</div>
						<div class="row hidden-xs" id="slider-thumbs">
						<!-- thumb -->
							@if (!empty($productDetail))
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
												  <a href="javascript:;" data-target="#DetailPopupCarousel" data-slide-to="{{$to}}">{{HTML::image("image/phpthumb/$thumb?p=product&amp;h=90&amp;w=105")}}</a>
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
											}
										?>
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
					<div class="col-sm-4" id="carousel-text" style="padding:0;">
                        <div class="col-lg-12 text-centered" style="border:1px solid #dddddd;background-color:#dddddd;padding:5px 10px;font-weight:bold;text-align:center;"> Summary Detail</div>
						<hr>
                        <h4>Price ss : <span class="price">{{ $productDetail->price }} $</span></h4>
                        <strong>Condition :&nbsp;<span class="pro-condition">{{$productDetail->{'pcon_name_'.Session::get('lang')};}}</span></strong><br />
                        <strong>Post Date :&nbsp;<span class="pro-condition"><?php echo ($productDetail->created_date!=null)?date("d/M/Y",strtotime($productDetail->created_date)):''?> </span></strong>
					    <div class="clear"></div> <div class="clear"></div>
                        <div class="col-lg-12 text-centered" style="background-color:#eea236;padding:5px 0;text-align:center;"><a href="{{Config::get('app.url')}}store-{{$productDetail->store_id;}}" style="color:white;font-weight:bold;" target="_blank">{{Config::get('app.url')}}store-{{$productDetail->store_id;}}</a></div>
                        <div class="clear"></div>
                        <div class="col-lg-12 text-centered" style="background-color:#eea236;padding:5px 10px;font-weight:bold;text-align:center;">
                                <a href="{{Config::get('app.url')}}product/details/{{$productDetail->id}}">See : Page Detail</a></div>
                    </div>
				</div>
            </div>
		</div>
	</div>
	<!--/Slider-->
</div> 

