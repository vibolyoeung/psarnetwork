@extends('frontend.nosidebar') 
@section('title')
	Product Management
@endsection
@section('left')
@endsection
	@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
	@endsection
@section('content')
<div class="col-sm-2">
	@include('frontend.modules.product.partials.left_product_link')
</div>
<div class="col-sm-10">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li>
							<strong>All Products View</strong>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<table class="table table-bordered product-list">
			<thead>
				<tr>
					<th width="10%">Picture</th>
					<th width="15%">Title</th>
					<th width="55%">Description</th>
					<th width="10%">Others</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($products as $product)
				<tr>
					<td>
						{{HTML::image("upload/product/thumb/$product->thumbnail",$product->title,array('class' => 'img-rounded','width'=>'100'))}}
					</td>
					<td>{{ $product->title }} </td>
					<td>{{ $product->description }}</td>
					<td>
						<div>{{ $product->price }}$</div>
						<div>{{ Session::get('currentUserName') }}</div>
						<div>{{ $product->created_date }}</div>
						<div>View {{ $product->view }}</div>
					</td>
					<td>
						<div>
							<a href="{{URL::to('products/topup')}}/{{$product->id}}">
								Top Up
							</a>
						</div>
						<div>
							<a href="{{URL::to('products/edit')}}/{{$product->id}}">
								Edit
							</a>
						</div>
						<div>
							<a href="{{URL::to('products/delete')}}/{{$product->id}}">
								Delete
							</a>
						</div>
						<div>
							<a href="{{URL::to('products/ispublished')}}/{{$product->id}}/{{$product->is_publish}}">
								@if($product->is_publish === 0)
									Enable
								@else
									Disable
								@endif
							</a>
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