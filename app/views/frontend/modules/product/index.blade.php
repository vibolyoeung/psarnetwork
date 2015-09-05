@extends('frontend.nosidebar') @section('title') Product Management
@endsection @section('left') @endsection @section('content')
<div class="col-lg-2 col-md-4">
	@include('frontend.modules.product.partials.left_product_link')</div>
<div class="col-lg-10 col-md-8">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><strong>All Products View</strong></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<table class="table product-list">
			<thead>
				<tr>
					<th style="width:100px">Picture</th>
					<th>Title</th>
					<th style="width:300px" class="visible-lg">Others</th>
					<th style="width:90px">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td>
						{{HTML::image("image/phpthumb/$product->thumbnail?p=product&amp;h=100&amp;w=100",$product->title,array('class'
						=> 'img-rounded','width'=>'100'))}}</td>
					<td>{{ $product->title }}</td>
					<td class="visible-lg">
						<span style="color:red">{{ $product->price }}$</span>, 
						<span>{{ Session::get('currentUserName') }}</span>, 
						<span>{{ $product->created_date }}</span>, 
						<span><b>View</b>: {{ $product->view }}</span>
					</td>
					<td>
						<div class="dropdown">
							<button id="dLabel" type="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dLabel">
								<li><a href="{{URL::to('products/topup')}}/{{$product->id}}"> Top Up</a></li>
								<li><a href="{{URL::to('products/edit')}}/{{$product->id}}"> Edit </a></li>
								<li><a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('products/delete')}}/{{$product->id}}"> Delete </a></li>
								<li><a href="{{URL::to('products/ispublished')}}/{{$product->id}}/{{$product->is_publish}}">@if($product->is_publish === 0) Enable @else Disable @endif </a></li>
							</ul>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$products->links()}}
	</div>
</div>
@endsection
