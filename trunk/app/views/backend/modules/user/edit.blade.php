@extends('backend/layout') @section('title') Edit @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/users')}}">Users</a></li>
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
				<div class="panel-body">
				{{Form::open(array('url'=>'admin/edit'))}}
				<div class="row well">
					<div class="col-md-6">
						<div class="form-group">
						<label>Name</label>
						{{Form::text('name',$users->name, array('class' =>'form-control','placeholder'=>'Enter Name'))}}
						{{$errors->first('name')}}
						</div>
						<div class="form-group"><label>Email address</label>
						{{Form::text('email',$users->email, array('class' =>'form-control','placeholder'=>'Enter Email'))}}
						{{$errors->first('email')}}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group"><label>Phone</label>
							{{Form::text('telephone',$users->telephone, array('class' =>'form-control','placeholder'=>'Enter Telephone'))}}
						</div>
						<div class="form-group"><label>Address</label>
							{{Form::text('address',$users->address, array('class' =>'form-control','placeholder'=>'Enter Address'))}}
						</div>
				</div>
				</div>
				{{Form::hidden('id',$users->id)}}
				<div class="row well">
					<div class="col-md-6">
						<div class="form-group"><label>User Group</label>
							{{Form::select('role',$userType,$users->user_type, array('class' =>'form-control'));}} {{$errors->first('role')}}
						</div>
					</div>
				</div>
				{{Form::submit('Update', array('class'=> 'btn btn-success','name'=>'btnSubmit'))}}
				{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endsection