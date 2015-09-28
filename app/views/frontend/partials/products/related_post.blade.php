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
			@if(count($related_post))
				@foreach($related_post as $relatedPost)
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="product-image-wrapper related-product-image">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="" data-toggle="modal" data-target="#myModal" onclick="popupDetails.add_popup_detail(<?php echo $relatedPost->id; ?>)">
									<?php 
										if($relatedPost->thumbnail){
											echo '<img src="'.Config::get('app.url').'image/phpthumb/'.$relatedPost->thumbnail.'?p=product&amp;h=150&amp;w=160" />';
										}else{
											echo '<img src="'.Config::get("app.url").'image/phpthumb/No_image_available.jpg?p=product&amp;h=150&amp;w=160" />';
										}
									?>
									</a>
									<center>
										<h5>
											<a href="{{Config::get('app.url')}}product/details/{{$relatedPost->id}}"><?php echo substr($relatedPost->title,0,20)?></a>
										</h5>
										<strong class="price">$ {{$relatedPost->price}}</strong>
									</center>
								</div>
							</div>
						</div>
					</div>
					<?php 
					if ($secondPro >= 6 && $secondPro % 6 == 0) {
						echo '</div><div class="item"> ';
					}
					$secondPro ++;
					?>
				@endforeach
			@else
				<span class="price"><center>No related product</center></span>
			@endif
		</div>
	</div>
</div>
@include('frontend.partials.products.popup_details')
