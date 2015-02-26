@extends('frontend.modules.product.layout')
@section('title')
	Product Management
@endsection
@section('left')
	@include('frontend.modules.product.partials.left_product_link')
@endsection
	@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
	@endsection
@section('content')
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
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>
						<input class="form-control" type="text" placeholder="Sort Display">
					</th>
					<th colspan="4">
						<input class="form-control" type="text" placeholder="Search By">
					</th>
				</tr>
				<tr>
					<th>Picture</th>
					<th>Title</th>
					<th>Description</th>
					<th>Others</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@for($i=0;$i<5; $i++)
				<tr>
					<td>
						{{HTML::image("upload/product/thumb/ring.jpg",'Ring',array('class' => 'img-rounded','width'=>'100'))}}
					</td>
					<td>Itally Dimon Ring </td>
					<td>This is good Ring..</td>
					<td>
						<div>700$</div>
						<div>Somoeun</div>
						<div>12-Dec-2015</div>
						<div>View 102</div>
					</td>
					<td>
						<div>
							<a>Top Up</a>
						</div>
						<div>
							<a>Edit</a>
						</div>
						<div>
							<a>Delete</a>
						</div>
						<div>
							<a>Disable</a>
						</div>
					</td>
				</tr>
			@endfor
			</tbody>
		</table>
	</div>
</div>
@endsection
