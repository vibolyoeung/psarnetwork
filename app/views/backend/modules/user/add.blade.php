@extends('backend/layout') @section('title') Create @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/users')}}">Users</a></li>
		<li>Create</li>
	</ul>
@endsection
@section('content')
{{Form::open(array('url'=>'admin/create'))}}
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><i class="icon-calendar"></i>
					<h3 class="panel-title">Create</h3>
				</div>
				<div class="panel-body">
				<div class="row well">
					<div class="col-md-6">
						<div class="form-group"><label>Name <span class="class-required">*</span></label>
					{{ Form::text('name',null, array('class' =>
					'form-control','placeholder'=>'Enter Name'))}} <span class="class-error">{{$errors->first('name')}}</span>
					</div>
					<div class="form-group"><label>Email address (As UserName for login) <span
						class="class-required">*</span></label> {{ Form::text('email',null,
					array('class' => 'form-control','placeholder'=>'Enter Email'))}} <span
						class="class-error">{{$errors->first('email')}}</span></div>
						<div class="form-group">
							<label>
								Telephone
							</label>
								{{ Form::text('telephone',null,array('class' =>'form-control','placeholder'=>'Enter Telephone'))}}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>
								Password <span class="class-required">*</span>
							</label>
								{{ Form::password('password',array('class' =>'form-control','placeholder'=>'Enter Password'))}}
							<span class="class-error">{{$errors->first('password')}}</span>
						</div>
					<div class="form-group">
						<label>
							Retype Password <span class="class-required">*</span>
						</label>
						{{ Form::password('password_confirm',array('class' =>'form-control','placeholder'=>'Enter Retype Password'))}}
						<span class="class-error">{{$errors->first('password_confirm')}}</span>
					</div>
					<div class="form-group">
						<label>Address</label>
						{{ Form::text('address',null,array('class' =>'form-control','placeholder'=>'Enter Address'))}}
					</div>
					</div>
				</div>
				<div class="row well">
					<div class="col-md-6">
						<div class="form-group">
						<label>
							User Group <span class="class-required">*</span>
						</label>
						{{Form::select('role',$userType,'key', array('class' =>'form-control','id'=>'user_type'));}}
						<span class="class-error">{{$errors->first('role')}}</span>
						</div>
					</div>
				</div>
					{{Form::submit('Create', array('class' => 'btn
					btn-success','name'=>'btnSubmit'))}}
				</div>
			</div>
		</div>
	</div>
{{Form::close()}}
	@endsection
