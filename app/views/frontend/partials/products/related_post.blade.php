<!-- ============Relative post=============== -->
<div class="col-lg-12" style="padding: 0;">
	<div class="category-tab feature-ad lastest-post">
		<div class="col-lg-12">
			<h3 style="color: #285EA0;">Related Posts</h3>
		</div>
	</div>
	<hr />
	@foreach($related_post as $relatedPost)
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<a
						href="{{Config::get('app.url')}}/product/details/{{$relatedPost->id}}"
						data-toggle=""
						data-target="{{Config::get('app.url')}}/product/details/{{$relatedPost->id}}">
						<img
						src="{{Config::get('app.url')}}/upload/product/thumb/{{$relatedPost->thumbnail}}"
						alt="" />
					</a>
					<h2>$ {{$relatedPost->price}}</h2>
					<p>{{substr($relatedPost->title,0,20)}}</p>
					<a
						href="{{Config::get('app.url')}}/product/details/{{$relatedPost->id}}">
						View Details</a>
				</div>
				<img
					src="{{Config::get('app.url')}}/frontend/images/home/sale.png"
					class="new" alt="" />
			</div>
		</div>
	</div>
	@endforeach
</div>