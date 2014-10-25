@extends('backend/layout') @section('title') Market @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/markets')}}">{{$storeName}}</a></li>
		<li>Stores</li>
	</ul>
@endsection
@section('content')
<div class="row">

<div class="col-md-12 col-sm-12 col-sx-12">
<div class="panel panel-default">
<div class="panel-heading clearfix"><a
	href="{{URL::to('admin/market/store/create')}}/{{strtolower($storeName)}}/{{$id}}"> <i
	class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i> </a>
<h3 class="panel-title">Stores</h3>
</div>
<div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
<div class="alert alert-block alert-success fade in">
<button data-dismiss="alert" class="close" type="button"
	data-original-title="">x</button>
<p>{{Session::get('SECCESS_MESSAGE')}}</p>
</div>
@endif <br />
<div class="table-responsive">
<table class="table table-bordered no-margin">
	<thead>
		<tr>
			<th>#</th>
			<th>Images</th>
			<th>Store Title En</th>
			<th>Store Title Zh</th>
			<th>Stair</th>
			<th class="class-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i = 1;?>
		@foreach($stores as $store)
		<tr>
			<td>{{$i}}</td>
			<td width="9%">{{HTML::image("upload/store/thumb/".$store->image,
			$store->title_en,array())}}</td>
			<td>{{$store->title_en}}</td>
			<td>{{$store->title_zh}}</td>
			<td>{{$store->stair}}</td>
			<td align="center"><a title="Edit"
				href="{{URL::to('admin/market/store/edit')}}/{{$store->id}}/{{$storeName}}/{{$id}}"> <i
				class="icon-edit primary"></i> </a> <a title="Delete"
				href="{{URL::to('admin/market/store/delete/')}}/{{$store->id}}/{{$storeName}}/{{$id}}"
				onclick="return confirm('Are you sure you want to delete this item?');">
			<i class='icon-trash danger'></i> </a></td>
		</tr>
		<?php $i++;?>
		@endforeach
	</tbody>

</table>
</div>
{{$stores->links()}}</div>
</div>
</div>
</div>
 @endsection