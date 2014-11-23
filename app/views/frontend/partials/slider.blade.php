<section id="slider">
	<!--slider-->
	<div class="row">
		<div class="col-sm-12">
			<div id="slider-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				<?php $i=0;?>
					@foreach($slideshows as $slideshow)
						<?php 
							$exp_date = $slideshow->expire_date;
							$exp_date = str_replace('/', '-', $exp_date);
							
							$created_date = $slideshow->created_date;
							$created_date =str_replace('/', '-', $created_date); 
						?>
						@if(strtotime($exp_date) >= strtotime($created_date))
							<li data-target="#slider-carousel" data-slide-to="<?php echo $i;?>" class="bullet"></li>
						@endif
						<?php $i++;?>
					@endforeach
				</ol>
				<div class="carousel-inner">
				
				@foreach($slideshows as $slideshow)
					<?php 
						$exp_date = $slideshow->expire_date;
						$exp_date = str_replace('/', '-', $exp_date);
						
						$created_date = $slideshow->created_date;
						$created_date =str_replace('/', '-', $created_date); 
					?>
					@if(strtotime($exp_date) >= strtotime($created_date))
						<div class="item">
						<div class="col-sm-6">
							<h3>
								<span>{{$slideshow->title;}}</span>
							</h3>
							<p>{{$slideshow->short_desc;}}</p>
							<a href='{{URL::to("product/product_detail")}}/{{$slideshow->id}}' class="btn btn-default get">View Details</a>
						</div>
						<div class="col-sm-6">
							<img src="{{Config::get('app.url')}}/upload/slideshow/{{$slideshow->image;}}" class="girl img-responsive" alt="" /> 
							<!-- <img src="{{Config::get('app.url')}}/frontend/images/home/pricing.png" class="pricing" alt="" /> -->
						</div>
					</div>
					@endif
				@endforeach
				</div>
				<a href="#slider-carousel" class="left control-carousel hidden-xs"
					data-slide="prev"> <i class="fa fa-angle-left"></i>
				</a> <a href="#slider-carousel"
					class="right control-carousel hidden-xs" data-slide="next"> <i
					class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
</section>
<!--/slider-->
