@extends('backend/layout') @section('title') Edit @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/user-group')}}">User Group</a></li>
		<li>Edit</li>
	</ul>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><i class="icon-calendar"></i>
					<h3 class="panel-title">Edit</h3>
				</div>
				<div class="panel-body">{{Form::open(array('url'=>'admin/user-group-edit'))}}
					<div class="form-group"><label>User Group Name <span class="class-required">*</span></label>
					{{ Form::text('group_name',$getUserPermissionById->name, array('class' =>
					'form-control','placeholder'=>'Enter User Group Name'))}} <span class="class-error"></span>
					</div>
					{{Form::hidden('hid',$getUserPermissionById->id)}}
					<?php
						$unserialUserPermission = unserialize($getUserPermissionById->permission);
					?>
				<div class="col-sm-12">
					<label>Access Permission</label>
					<div class="well well-sm" style="height: 150px; overflow: auto;">
						@foreach($permissions as $permission)
						<div class="checkbox">
							<label>
							@if(in_array($permission->permission_name,!empty($unserialUserPermission['access'])? $unserialUserPermission['access'] : array()))
							<input checked type="checkbox" name="permission[access][]" value="{{$permission->permission_name}}">
								{{$permission->permission_name}}
							@else
							<input type="checkbox" name="permission[access][]" value="{{$permission->permission_name}}">
								{{$permission->permission_name}}
							@endif
							</label>
						</div>
						@endforeach
					</div>
				</div>

				<div class="col-sm-12">
					<label>Modify Permission</label>
					<div class="well well-sm" style="height: 150px; overflow: auto;">
						@foreach($permissions as $permission)
						<div class="checkbox">
							<label>
							@if(in_array($permission->permission_name,!empty($unserialUserPermission['access'])? $unserialUserPermission['modify'] : array()))
							<input checked type="checkbox" name="permission[modify][]" value="{{$permission->permission_name}}">
								{{$permission->permission_name}}
							@else
							<input type="checkbox" name="permission[modify][]" value="{{$permission->permission_name}}">
								{{$permission->permission_name}}
							@endif
							</label>
						</div>
						@endforeach
					</div>
				</div>
					{{Form::submit('Update', array('class' => 'btn
					btn-success','name'=>'btnSubmit'))}} {{Form::close()}}
				</div>
			</div>
		</div>
	</div>
	@endsection
