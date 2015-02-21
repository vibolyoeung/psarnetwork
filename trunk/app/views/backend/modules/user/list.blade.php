use Boris\Config;
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
			<div class="panel-heading clearfix"><a
				href="{{URL::to('admin/create')}}"> <i
				class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i> </a>
			<h3 class="panel-title">Users</h3>
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
					<th>User Group</th>
					<th class="class-center">Status</th>
					<th class="class-center">Action</th>
				</tr>
				<tr>
					<td></td>
					<td>{{Form::text('filter_name',null,array('class' =>'form-control','id'=>'filter_name'))}}</td>
					<td>{{Form::text('filter_email',null,array('class' =>'form-control','id'=>'filter_email'))}}</td>
					<td>{{Form::select('filter_role',$arrUserGroup,'key', array('class' =>'form-control','id'=>'filter_role'))}}</td>
					<td>{{Form::select('filter_status',$status,'key', array('class' =>'form-control','id'=>'filter_status'))}}</td>
					<td align="center">{{Form::submit('Filter', array('class' => 'btn btn-success','name'=>'btnFilter','id'=>'btn_filter_user'))}}</td>
				</tr>
			</thead>
	<tbody id="result_filter_user">
		<?php $i=1;?>
		@foreach($users as $user)
		<tr>
			<td>{{$i}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
				<?php 
					$userGroup = DB::table(Config::get('constants.TABLE_NAME.USER_TYPE'))
					->where('id','=',$user->user_type)
					->first();
					if(!empty($userGroup)){
						echo $userGroup->name;
					}
				?>
			</td>
			<td align="center"><a
				href='{{URL::to("admin/status")}}/{{$user->status}}/{{$user->id}}'>
			@if($user->status == 1) <span class="icon-ok success"></span> @else <span
				class="icon-remove danger"></span> @endif </a></td>
			<td align="center"><a title="Edit"
				href="{{URL::to('admin/edit')}}/{{$user->id}}"><i
				class="icon-edit primary"></i></a> <a title="Delete"
				href="{{URL::to('admin/delete')}}/{{$user->id}}"
				onclick="return confirm('Are you sure you want to delete this item?');"><i
				class='icon-trash danger'></i></a></td>
		</tr>
		<?php $i++;?>
		@endforeach
	</tbody>
</table>
</div>
{{$users->links()}}</div>
</div>
		</div>
		</div>
	{{HTML::script('backend/js/filter.js')}}
 @endsection
