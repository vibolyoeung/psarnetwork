@extends('backend/layout')
@section('title')
    Edit
@endsection
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
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">Edit</h3>
            </div>
            <div class="panel-body">
             {{Form::open(array('url'=>'admin/edit'))}}
             	<div class="form-group">
                  <label>Name</label>
                 {{ Form::text('name',$users->name, array('class' => 'form-control','placeholder'=>'Enter Name'))}}
                 {{$errors->first('name')}}
                </div>
                <div class="form-group">
                  <label>Email address</label>
                 {{ Form::text('email',$users->email, array('class' => 'form-control','placeholder'=>'Enter Email'))}}
                 {{$errors->first('email')}}
                </div>
                <div class="form-group">
                  <label>User Role</label>
               	  {{Form::select('role', array(''=>'Select Role','1' => 'Super Administrator','2' => 'Administrator','3' => 'Admin'), $users->user_role_id, array('class' => 'form-control'));}}
               	{{$errors->first('role')}}
                </div>
                {{Form::hidden('id',$users->id)}}
                {{Form::submit('Update', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection