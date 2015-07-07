<section id="slider">
	<!--slider-->
	<div class="row">
		<div class="col-lg-12 pull-right" style="padding:0;">
			<div class="col-lg-7" style="padding-right:0;">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel" >
				<?php 
				if(count($slideshows) > 0){
				?>
					<ol class="carousel-indicators">
					<?php $i=0;?>
					@foreach($slideshows as $slideshow)
					<?php
						$expire_date = $slideshow->end_date;
						$expire_date =str_replace('/', '-', $expire_date);
						if(strtotime(date("Y-m-d")) <= strtotime($expire_date)){
							echo '<li data-target="#slider-carousel" data-slide-to="'.$i.'" class="bullet"></li>';
						}
						$i++;
					?>
					@endforeach
					</ol>
					<div class="carousel-inner">
					@foreach($slideshows as $slideshow)
						<?php
							if($slideshow->type == 1){
								$exp_date = $slideshow->end_date;
								$exp_date =str_replace('/', '-', $exp_date);
								if(strtotime(date("Y-m-d")) <= strtotime($exp_date)){ ?>
									<div class="item">
											<a href='{{URL::to("product/product_detail")}}/{{$slideshow->id}}' target="_blank">
												<img src="{{Config::get('app.url')}}/upload/advertisement/{{$slideshow->image;}}" class="img-responsive img-thumbnail" alt="image" />
											</a>
									</div>
							<?php
								}
							}else{
								$exp_date = $slideshow->end_date;
								$exp_date =str_replace('/', '-', $exp_date);
								if(strtotime(date("d-m-Y")) <= strtotime($exp_date)){ ?>
								<div class="item">
									<div class="col-sm-6">
										<h5>
											{{$slideshow->title_en;}}
										</h5>
										<p>{{$slideshow->description_en;}}</p>
										<a href='{{URL::to("product/product_detail")}}/{{$slideshow->id}}' class="btn btn-default get">View Details</a>
									</div>
									<div class="col-sm-6">
										<img src="{{Config::get('app.url')}}/upload/advertisement/{{$slideshow->image;}}" class="img-responsive img-thumbnail" alt="" />
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
					
				<?php 
				}else{
				?>
					<img src="{{Config::get('app.url')}}/frontend/images/default_slideshow.png" class="img-responsive img-thumbnail" alt="image" />
				<?php 
				}
				?>
				</div>
			</div>
			
			<div class="col-lg-5 top_special_ads">
				{{ App::make('FePageController')->getSpecialAds() }}
			</div>
			
		</div>
	</div>
</section>
<!--/slider-->
