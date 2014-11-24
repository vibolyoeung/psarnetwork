@extends('backend/layout') @section('title') Create @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/user-group')}}">User Group</a></li>
		<li>Create</li>
	</ul>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><i class="icon-calendar"></i>
					<h3 class="panel-title">Create</h3>
				</div>
				<div class="panel-body">{{Form::open(array('url'=>'admin/user-group-add'))}}
					<div class="form-group"><label>User Group Name <span class="class-required">*</span></label>
					{{ Form::text('group_name',null, array('class' =>
					'form-control','placeholder'=>'Enter User Group Name'))}} <span class="class-error"></span>
					</div>

				<div class="col-sm-12">
					<label>Access Permission</label>
					<div class="well well-sm" style="height: 150px; overflow: auto;">
						@foreach($permissions as $permission)
						<div class="checkbox">
							<label>
							<input type="checkbox" name="permission[access][]" value="{{$permission->permission_name}}">
								{{$permission->permission_name}}
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
							<input type="checkbox" name="permission[modify][]" value="{{$permission->permission_name}}">
								{{$permission->permission_name}}
							</label>
						</div>
						@endforeach
					</div>
				</div>
					{{Form::submit('Create', array('class' => 'btn
					btn-success','name'=>'btnSubmit'))}} {{Form::close()}}
				</div>
			</div>
		</div>
	</div>
	@endsection
