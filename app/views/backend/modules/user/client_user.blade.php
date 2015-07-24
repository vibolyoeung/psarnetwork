@extends('backend/layout') @section('title') Users @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Users</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			<h3 class="panel-title">Client Users</h3>
			</div>
			<div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
			<div class="alert alert-block alert-success fade in">
			<button data-dismiss="alert" class="close" type="button"
				data-original-title="">x</button>
			<p>{{Session::get('SECCESS_MESSAGE')}}</p>
			</div>
			@endif
			@if(Session::has('ERROR_MODIFY_MESSAGE'))
				<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button"
					data-original-title="">x</button>
				<p>{{Session::get('ERROR_MODIFY_MESSAGE')}}</p>
				</div>
			@endif
			<br />
		<div class="table-responsive">
		<table class="table table-bordered no-margin">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Telephone</th>
					<th>Date Register</th>
					<th>User Type</th>
					<th class="class-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;?>
				@foreach($clientUsers as $user)
					<tr>
						<td>{{$i}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->telephone}}</td>
						<td>{{$user->create_at}}</td>
						<td>Client</td>
						<td>
							<a
								href='{{URL::to("admin/status")}}/{{$user->status}}/{{$user->id}}/4'>
								@if($user->status == 1) <span class="icon-ok success"></span> @else <span
				class="icon-remove danger"></span> @endif </a>
							<a title="Delete"
				href='{{URL::to("admin/delete/client")}}/{{$user->id}}'
				onclick="return confirm('Are you sure you want to delete this item?');"><i
				class='icon-trash danger'></i></a>
						</td>
					</tr>
				<?php $i++;?>
				@endforeach
			</tbody>
	</table>
</div>
{{$clientUsers->links()}}
</div>
</div>
</div>
</div>
 @endsection
