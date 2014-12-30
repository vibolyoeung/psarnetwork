@extends('backend/layout')
@section('title')
    User Profile
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li><a href="{{URL::to('admin/users')}}">Users</a></li>
        <li>User Profile</li>
    </ul>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">User Profile:  <?php echo $users->name;?></h3>
            </div>
            <div class="panel-body">
             <br/>
             @if(Session::has('SECCESS_MESSAGE'))
            <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button" data-original-title="">
                  x
                </button>
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
				<div class="row well">
					<div class="col-md-6">
						{{Form::open(array('url'=>'admin/profile'))}}
						<div class="form-group">
						<label>Name</label>
							{{ Form::text('name',$users->name, array('class' => 'form-control','placeholder'=>'Enter Name'))}}
							<span class="class-error">{{$errors->first('name')}}</span>
						</div>
						<div class="form-group">
						<label>Email</label>
							<input type="text" readonly="readonly" value="{{$users->email}}" class="form-control" />
						</div>
						<div class="form-group">
						<label>My Status</label>
							<input type="text" readonly="readonly" value="{{($users->status == 1) ? 'Enable': 'Disable'}}" class="form-control" />
						</div>
						{{Form::submit('Save', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
						{{Form::close()}}
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label>Telephone</label>
							<input type="text" readonly="readonly" value="{{$users->telephone}}" class="form-control" />
						</div>
						<div class="form-group">
						<label>Address</label>
							<input type="text" readonly="readonly" value="{{$users->address}}" class="form-control" />
						</div>
						<div class="form-group">
						<label>Created Date</label>
							<input type="text" readonly="readonly" value="{{$users->create_at}}" class="form-control" />
						</div>
					</div>
				</div>
				<label>MY Group Information</label>
				<?php
					$userGroup = new UserGroup();
					$ug = $userGroup->findUserGroupById($users->user_type);
				?>
				<div class="row well">
					<div class="col-md-6">
						<div class="form-group">
						<label>Group Name</label>
							<input type="text" readonly="readonly" value="{{$ug->name}}" class="form-control" />
						</div>
					</div>
				</div>
            </div>
          </div>
        </div>
      </div>
 @endsection