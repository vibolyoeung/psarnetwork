@extends('backend/layout')
@section('title')
    Create
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Dashboard</li>
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
                 {{$errors->first('name')}}
                </div>
             
                <div class="form-group">
                  <label>Email address</label>
                 {{ Form::text('email',null, array('class' => 'form-control','placeholder'=>'Enter Email'))}}
                 {{$errors->first('email')}}
                </div>
                <div class="form-group">
                  <label>Password</label>
                  {{ Form::password('password',array('class' => 'form-control','placeholder'=>'Enter Password'))}}
               		{{$errors->first('password')}}
                </div>
                
                <div class="form-group">
                  <label>User Role</label>
               	  {{Form::select('Role', array(''=>'Select Role','1' => 'Super Administrator','2' => 'Administrator','3' => 'Admin'), 'key', array('class' => 'form-control'));}}
               	{{$errors->first('Role')}}
                </div>
                
                {{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection