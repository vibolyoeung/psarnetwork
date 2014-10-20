@extends('backend/layout')
@section('title')
    User Profile
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li><a href="{{URL::to('admin/users')}}">Users</a></li>
        <li>Change Password</li>
    </ul>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">Change Password</h3>
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
              @if(Session::has('ERROR_MESSAGE'))
            <div class="alert alert-block alert-danger fade in">
                <button data-dismiss="alert" class="close" type="button" data-original-title="">
                  x
                </button>
                <p>{{Session::get('ERROR_MESSAGE')}}</p>
              </div>
              @endif
             {{Form::open(array('url'=>'admin/change-password'))}}
             	<div class="form-group">
                  <label>Old Password</label>
                 {{ Form::password('old_password', array('class' => 'form-control','placeholder'=>'Old Password'))}}
                 <span class="class-error">{{$errors->first('old_password')}}</span>
                </div>

                <div class="form-group">
                  <label>New Password</label>
                 {{ Form::password('password', array('class' => 'form-control','placeholder'=>'New Password'))}}
                 <span class="class-error">{{$errors->first('password')}}</span>
                </div>

                <div class="form-group">
                  <label>Re-Password</label>
                 {{ Form::password('password_confirm',array('class' => 'form-control','placeholder'=>'Re-Password'))}}
                 <span class="class-error">{{$errors->first('password_confirm')}}</span>
                </div>

                {{Form::submit('Save', array('class' =>'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection