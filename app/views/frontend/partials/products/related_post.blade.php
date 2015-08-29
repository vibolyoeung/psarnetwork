<div class="clear"></div>
<div class="category-tab feature-ad lastest-post" style="border:1px solid #ddd;">
	<!--recommended_items-->
	<div id="hotpromotion-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner" style="padding-top:15px;">
			<?php
			$secondPro = 1;
			?>
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
			@foreach($related_post as $relatedPost)
			<?php 
			//var_dump($relatedPost);
				if(strtotime($relatedPost->publish_date) >= strtotime("Y-m-d")){
				?>
				<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="#" data-toggle="modal" data-target="#myModal"
										onclick="popupDetails.add_popup_detail(<?php echo $relatedPost->id; ?>)" >
									<img
									src="{{Config::get('app.url')}}upload/product/thumb/{{$relatedPost->thumbnail}}"
									alt="" />
								</a>
								<h2>$ {{$relatedPost->price}}</h2>
								<a href="{{Config::get('app.url')}}product/details/{{$relatedPost->id}}"><?php echo substr($relatedPost->title,0,20)?></a>
							</div>
						</div>
					</div>
				</div>
				<?php }
				if ($secondPro >= 6&& $secondPro % 6 == 0) {
					echo '</div><div class="item"> ';
				}
				$secondPro ++;
				?>
			@endforeach
		</div>
	</div>
</div>
@include('frontend.partials.products.popup_details')
