<div class="clear"></div>
<div class="category-tab feature-ad lastest-post" style="border:1px solid #ddd;">
	<!--recommended_items-->
	<div id="hotpromotion-item-carousel" class="carousel slide"
		data-ride="carousel">
		<div class="carousel-inner" style="padding-top:15px;">
			<?php
			$newPro = 1;
			?>
			<div class="item active">
			<div id="detail_product" data-get-detail-product-url="{{Config::get('app.url')}}"></div>
				@foreach($related_post as $relatedPost)
				<div class="col-sm-2">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="#" data-toggle="modal" data-target="#myModal"
										onclick="popupDetails.add_popup_detail(<?php echo $relatedPost->id; ?>)">
										<img
										src="{{Config::get('app.url')}}upload/product/thumb/{{$relatedPost->thumbnail}}"
										alt="" />
									</a>
									<h2>
										<a href="{{Config::get('app.url')}}/product/details/{{$relatedPost->id}}" >$ {{$relatedPost->price}}</a></h2>
								</div>
							</div>
						</div>
					</div>
				<?php
				if ($newPro >= 4 && $newPro % 4 == 0) {
					echo '</div><div class="item"> ';
				}
				$newPro ++;
				?>
				@endforeach
			</div>
		</div>
		<a class="left recommended-item-control"
			href="#hotpromotion-item-carousel" data-slide="prev"> <i
			class="fa fa-angle-left"></i>
		</a> <a class="right recommended-item-control"
			href="#hotpromotion-item-carousel" data-slide="next"> <i
			class="fa fa-angle-right"></i>
		</a>
	</div>
</div>