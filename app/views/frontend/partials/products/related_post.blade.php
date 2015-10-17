<div class="clear"></div>
<div id="related-item-carousel" class="carousel slide"
		data-ride="carousel" style="border:1px solid #ddd;">
		<div class="carousel-inner">
			<?php
			$newPro = 1;
			?>
			<div class="item active">
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
				@foreach($related_post as $relatedPost)
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="#" data-toggle="modal" data-target="#myModal"
										onclick="popupDetails.add_popup_detail(<?php echo $relatedPost->id; ?>)">
										<?php 
										if($relatedPost->thumbnail){
											echo '<img src="/image/phpthumb/'.$relatedPost->thumbnail.'?p=product&amp;h=90&amp;w=120" />';
										}else{
											echo '<img src="/image/phpthumb/No_image_available.jpg?p=product&amp;h=90&amp;w=120" />';
										}
										?>
									</a>
									<center>
										<h5>
											<a href="{{Config::get('app.url')}}product/details/{{$relatedPost->id}}">
												<?php echo str_limit($relatedPost->title,$limit = 18, $end = '...');?>
											</a>
										</h5>
										<strong class="price">$ {{$relatedPost->price}}</strong>
									</center>
								</div>
							</div>
						</div>
					</div>
				<?php
				if ($newPro >= 4 && $newPro % 4 == 0) {
					echo '</div><div class="item">';
				}
				$newPro ++;
				?>
				@endforeach
			</div>
		</div>
		<a class="left recommended-item-control"
			href="#related-item-carousel" data-slide="prev"> <i
			class="fa fa-angle-left"></i>
		</a> <a class="right recommended-item-control"
			href="#related-item-carousel" data-slide="next"> <i
			class="fa fa-angle-right"></i>
		</a>
	</div>
@include('frontend.partials.products.popup_details')
