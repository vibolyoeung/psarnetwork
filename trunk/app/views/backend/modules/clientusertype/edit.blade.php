@extends('backend/layout') @section('title') Edit Client User Type @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/client-user-type')}}">Client User Type</a></li>
		<li>Edit Client User Type</li>
	</ul>
@endsection
@section('content')

<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Edit</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				@if(Session::has('ERROR_MODIFY_MESSAGE'))
					<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('ERROR_MODIFY_MESSAGE')}}</p>
					</div>
				@endif
				@if(Session::has('SECCESS_MESSAGE'))
					<div class="alert alert-block alert-success fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('SECCESS_MESSAGE')}}</p>
					</div>
				@endif
					{{Form::open(array('url'=>'admin/client-user-type-edit'))}}
					<table class="table table-bordered no-margin">
						<tr>
							<th>
							{{ Form::text('client_user_type',$clentTypes->name, array('class' =>'form-control','placeholder'=>'Enter Client User Type'))}}
					{{Form::hidden('hid', $clentTypes->id)}}
							</th>
							<th width="300">
								{{Form::submit('Update', array('class' =>'btn btn-success','name'=>'btnSubmit'))}}
							</th>
						</tr>
					</table>
				 {{Form::close()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection