<section id="slider">
	<!--slider-->
	<div class="row">
		<div class="col-lg-12 pull-right" style="padding-right:0;">
			<div class="col-sm-8">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel" >
					<ol class="carousel-indicators">
					<?php $i=0;?>
					@foreach($slideshows as $slideshow)
					<?php
						if($slideshow->pro_id == ''){
							$expire_date = $slideshow->sli_expire_date;
							$expire_date =str_replace('/', '-', $expire_date);
							if(strtotime(date("Y-m-d")) <= strtotime($expire_date)){ 
								echo '<li data-target="#slider-carousel" data-slide-to="'.$i.'" class="bullet"></li>';
							}
						}else{
							$expire_date = $slideshow->pro_expire_date;
							$expire_date =str_replace('/', '-', $expire_date);
							if(strtotime(date("Y-m-d")) <= strtotime($expire_date)){
							 	echo '<li data-target="#slider-carousel" data-slide-to="'.$i.'" class="bullet"></li>';
							}
						}		
						$i++;
					?>
					@endforeach
					</ol>
					<div class="carousel-inner" style="border: 2px solid #ddd;padding:0;max-height: 200px;">
					@foreach($slideshows as $slideshow)
						<?php
							if($slideshow->pro_id == ''){
								$exp_date = $slideshow->sli_expire_date;
								$exp_date =str_replace('/', '-', $exp_date);
								if(strtotime(date("Y-m-d")) <= strtotime($exp_date)){ ?>
									<div class="item">
											<a href='{{URL::to("product/product_detail")}}/{{$slideshow->id}}' target="_blank">
												<img src="{{Config::get('app.url')}}/upload/slideshow/{{$slideshow->sli_image;}}" class="" alt="" />
											</a>
									</div>
							<?php
								}
							}
							else{	
								$exp_date = $slideshow->pro_expire_date;
								$exp_date =str_replace('/', '-', $exp_date);
								if(strtotime(date("d-m-Y")) <= strtotime($exp_date)){ ?>
								<div class="item">
									<div class="col-sm-6">
										<h5>
											{{$slideshow->sli_title;}}
										</h5>
										<p>{{$slideshow->sli_desc;}}</p>
										<a href='{{URL::to("product/product_detail")}}/{{$slideshow->id}}' class="btn btn-default get">View Details</a>
									</div>
									<div class="col-sm-6">
										<img src="{{Config::get('app.url')}}/upload/product/{{$slideshow->pro_image;}}" class="img-responsive" alt="" /> 
										<!-- <img src="{{Config::get('app.url')}}/frontend/images/home/pricing.png" class="pricing" alt="" /> -->
									</div>
								</div>
							<?php 
								}
							}
							?>
					@endforeach
					</div>
					<a href="#slider-carousel" class="left control-carousel hidden-xs"
						data-slide="prev"> <i class="fa fa-angle-left"></i>
					</a> 
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next"> <i
						class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
			
			<!-- -============Advertise top special======== -->
			<div class="col-lg-4" style="border:2px solid #ddd;padding:5px;max-height: 200px;overflow:hidden;">
				<a href="#" >
					<img src="{{Config::get('app.url')}}frontend/images/top-advertise.jpg" alt="" title="" class="img-responsive"/>
				</a> 
			</div>
		</div>
	</div>
</section>
<div class="clear"></div>
<div class="clear"></div>
<!--/slider-->
