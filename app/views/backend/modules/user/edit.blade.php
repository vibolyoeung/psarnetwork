@extends('backend/layout')
@section('title')
    Edit
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Dashboard</li>
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
              <form role="form">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
                <button type="submit" class="btn btn-success" data-original-title="" title="">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
 @endsection