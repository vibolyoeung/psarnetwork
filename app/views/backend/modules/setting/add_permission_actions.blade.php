@extends('backend/layout') @section('title') Permission Action @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/setting-list')}}">Setting</a></li>
		<li>Add Permission Name</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
				{{Form::open(array('url'=>'admin/setting-add-permission-name'))}}
					<table class="table table-bordered no-margin">
						<tr>
							<th>
							{{ Form::text('permission_name',null, array('class' =>'form-control','placeholder'=>'Enter Permission Action Name'))}}
							<span class="class-error">{{$errors->first('permission_name')}}</span>
							</th>
							<th width="300">
								{{Form::submit('Create', array('class' =>'btn btn-success','name'=>'btnSubmit'))}}
							</th>
						</tr>
					</table>
				 {{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">List Permission Name</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				@if(Session::has('ERROR_MODIFY_MESSAGE'))
					<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('ERROR_MODIFY_MESSAGE')}}</p>
					</div>
				@endif
				@if(Session::has('SECCESS_MESSAGE'))
					<div class="alert alert-block alert-success fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('SECCESS_MESSAGE')}}</p>
					</div>
				@endif
					<table class="table table-bordered no-margin">
						<tr>
							<th>Permission Method Name</th>
							<th>Action</th>
						</tr>
						@foreach($listPermissionMethodName as $lmn)
						<tr>
							<td>{{$lmn->permission_name}}</td>
							<td><a title="Delete"
				href="{{URL::to('admin/setting-delete-permission-name')}}/{{$lmn->id}}"
				onclick="return confirm('Are you sure you want to delete this item?');"><i
				class='icon-trash danger'></i></a></td>
						</tr>
						@endforeach
					</table>
					{{$listPermissionMethodName->links()}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection