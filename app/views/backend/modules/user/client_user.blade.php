@extends('backend/layout') @section('title') Users @endsection
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
            <div class="panel-body">
                <form>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Email</label>
                            <input 
                                type="text" 
                                class="form-control" 
                            />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Telephone</label>
                            <input 
                                type="text" 
                                class="form-control" 
                            />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Date Register</label>
                            <input 
                                type="text" 
                                class="form-control" 
                            />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Account Type</label>
                            <select class="form-control">
                                <option>Free</option>
                                <option>Enterprise</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option>Enable</option>
                                <option>Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input
                            style="width:100%; margin-top:24px;"
                            type="submit" 
                            class="btn btn-primary"
                            value="Filter" 
                        />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			<h3 class="panel-title">Client Users</h3>
			</div>
			<div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
			<div class="alert alert-block alert-success fade in">
			<button data-dismiss="alert" class="close" type="button"
				data-original-title="">x</button>
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
			<br />
		<div class="table-responsive">
		<table class="table table-bordered no-margin">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Telephone</th>
					<th>Date Register</th>
					<th>Account Type</th>
					<th class="class-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;?>
				@foreach($clientUsers as $user)
					<tr>
						<td>{{$i}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->telephone}}</td>
						<td>{{$user->create_at}}</td>
						<td>
							@if($user->account_type === 1)
								<span class="label label-primary">
									Free User Account
								</span>
							@else 
								<span class="label label-success">
									Enterprise User Account
								</span>
							@endif
						</td>
						<td>
							<a
								href='{{URL::to("admin/status")}}/{{$user->status}}/{{$user->id}}/4'>
								@if($user->status == 1) <span class="icon-ok success"></span> @else <span
				class="icon-remove danger"></span> @endif </a>
							<a title="Delete"
				href='{{URL::to("admin/delete/client")}}/{{$user->id}}'
				onclick="return confirm('Are you sure you want to delete this item?');"><i
				class='icon-trash danger'></i></a>
						</td>
					</tr>
				<?php $i++;?>
				@endforeach
			</tbody>
	</table>
</div>
{{$clientUsers->links()}}
</div>
</div>
</div>
</div>
 @endsection
