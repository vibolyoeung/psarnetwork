<section id="slider" class="hide_responsive">
	<!--slider-->
	<div class="row">
		<div class="col-lg-12 pull-right" style="padding:0;">
			<div class="col-lg-7" style="padding-right:0;">
				<div class="carousel slide" id="slider-home">
					<!-- Carousel items -->
					<div class="carousel-inner">
						<?php
						if(count($slideshows)){
							$thumbnail_id = 0;
							?>
							@foreach($slideshows as $slideshow)
							<div class="item <?php echo $thumbnail_id == 0?'active':'';?>"
								data-slide-number="<?= $thumbnail_id; ?>">
								<a  href='{{$slideshow->link_url}}' target="_blank">
									<img
									src="{{Config::get('app.url')}}/upload/advertisement/{{$slideshow->image;}}" class="img-responsive img-thumbnail" alt="image" />
								</a>
							</div>
							<?php $thumbnail_id++; ?>
							@endforeach
						<?php
						}else{
							?>
							<img src="{{Config::get('app.url')}}upload/no-image.jpg" class="img-responsive img-thumbnail" alt="image" />
						<?php
						}
						?>                              
					</div>
					@if(count($slideshows)>0)
						<a class="left carousel-control" href="#slider-home" role="button" data-slide="prev">
	                    <span class="glyphicon glyphicon-chevron-left"></span>                                       
	                    </a>
	                    <a class="right carousel-control" href="#slider-home" role="button" data-slide="next">
	                        <span class="glyphicon glyphicon-chevron-right"></span>                                       
	                    </a>   
					@endif
					<!-- Carousel nav -->
				</div>
			</div>
			
			<div class="col-lg-5 top_special_ads">
				{{ App::make('FePageController')->getSpecialAds() }}
			</div>
			
		</div>
	</div>
</section>
<!--/slider-->
