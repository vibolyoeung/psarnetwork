@extends('backend/layout') @section('title')
User Group
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>User Group</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix"><a
				href="{{URL::to('admin/create')}}"> <i
				class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i> </a>
			<h3 class="panel-title">User Group</h3>
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
					<th>Group Name</th>
					<th class="class-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i=1;?>
		@foreach($userGroup as $groupUser)
		<tr>
			<td>{{$i}}</td>
			<td>{{$groupUser->name}}</td>
			<td align="center">
				<a title="Edit" href="{{URL::to('admin/user-group-edit')}}/{{$groupUser->id}}">
					<i class="icon-edit primary"></i>
				</a>
				<a title="Delete" href="{{URL::to('admin/delete')}}/{{$groupUser->id}}"
				onclick="return confirm('Are you sure you want to delete this item?');">
				<i class='icon-trash danger'></i>
				</a>
			</td>
		</tr>
		<?php $i++;?>
		@endforeach


	</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
 @endsection