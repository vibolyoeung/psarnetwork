@extends('backend/layout')
@section('title')
    Users
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
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
            @if(Session::has('SECCESS_MESSAGE'))
            <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button" data-original-title="">
                  x
                </button>
                <p>{{Session::get('SECCESS_MESSAGE')}}</p>
              </div>
              @endif
              <br />
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th class="class-center">Status</th>
                      <th class="class-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  		<?php $i=1;?>
                  		@foreach($users as $user)
                  			<tr>
                  				<td>{{$i}}</td>
                  				<td>{{$user->name}}</td>
                  				<td>{{$user->email}}</td>
                  				<td>
                  					@if($user->user_role_id == Config::get('constants.SUPER_ADMINISTRATOR'))
                  						Super Admistrator
                  					@elseif($user->user_role_id == Config::get('constants.ADMINISTRATOR'))
                  						Administrator
                  					@elseif($user->user_role_id == Config::get('constants.ADMIN'))
                  						Admin
                  					@endif
                  				</td>
                  				<td align="center">
                  					<a href='{{URL::to("admin/status")}}/{{$user->status}}/{{$user->id}}'>
                  						@if($user->status == 1)
                  							<i class="btn btn-xs btn-success">Active</i>
                  						@else
                  							<i class="btn btn-xs btn-danger">In Active</i>
                  						@endif
                  					
                  					</a>
                  				</td>
                  				<td align="center">
	                  				<a href="{{URL::to('admin/edit')}}/{{$user->id}}" ><i class="icon-edit"></i></a>
	                  				<a  href="{{URL::to('admin/delete')}}/{{$user->id}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class='icon-trash'></i></a>
	                  			</td>
                  			</tr>
                  			<?php $i++;?>
                  		@endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 @endsection