@extends('backend/layout')
@section('title')
    Create
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li><a href="{{URL::to('admin/users')}}">Users</a></li>
        <li>Create</li>
    </ul>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">Create</h3>
            </div>
            <div class="panel-body">
             {{Form::open(array('url'=>'admin/create'))}}
             	<div class="form-group">
                  <label>Name</label>
                 {{ Form::text('name',null, array('class' => 'form-control','placeholder'=>'Enter Name'))}}
                 <span class="class-error">{{$errors->first('name')}}</span>
                </div>
             
                <div class="form-group">
                  <label>Email address</label>
                 {{ Form::text('email',null, array('class' => 'form-control','placeholder'=>'Enter Email'))}}
                 <span class="class-error">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  {{ Form::password('password',array('class' => 'form-control','placeholder'=>'Enter Password'))}}
               		<span class="class-error">{{$errors->first('password')}}</span>
                </div>
                <div class="form-group">
                  <label>Re-password</label>
                  {{ Form::password('password_confirm',array('class' => 'form-control','placeholder'=>'Enter Repassword'))}}
               		<span class="class-error">{{$errors->first('password_confirm')}}</span>
                </div>
                <div class="form-group">
                  <label>User Role</label>
               	  {{Form::select('role', array(''=>'Select Role','1' => 'Super Administrator','2' => 'Administrator','3' => 'Admin'), 'key', array('class' => 'form-control'));}}
               		<span class="class-error">{{$errors->first('role')}}</span>
                </div>
                
                {{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection