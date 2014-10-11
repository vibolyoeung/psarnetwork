@extends('backend/layout')
@section('title')
    Users
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Dashboard</li>
        <li>Users</li>
    </ul>
@endsection
@section('content')
<div class="row">
		
        <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
            <a href="{{URL::to('admin/create')}}">
              <i class="icon-plus btn btn-xs btn-info rounded-buttons" >&nbsp;Add</i>
             </a>
             <h3 class="panel-title">Users</h3>
            </div>
            <div class="panel-body">
            @if(Session::has('successCreate'))
            <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button" data-original-title="">
                  x
                </button>
                <p>{{Session::get('successCreate')}}</p>
              </div>
              @endif
              <br />
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>User Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Lucky</td>
                      <td>Honey</td>
                      <td>@honey</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jacob</td>
                      <td>Nani</td>
                      <td>@nani</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Harris</td>
                      <td>Handsome</td>
                      <td>@Mr.Perfect</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 @endsection