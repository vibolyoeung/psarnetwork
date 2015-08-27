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
						<div class="row">
							<div class="col-md-12">
								<label>Name {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</label>
								{{ Form::text(
									'client_user_type_en',
									$clentTypes->name_en, 
									array(
										'class' =>'form-control',
										'placeholder'=>'Enter Client User Type'
									)
								)}}
								{{Form::hidden('hid', $clentTypes->id)}}
							</div>
							<div class="col-md-12">
								<label>Name {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</label>
								{{ Form::text(
									'client_user_type_km',
									$clentTypes->name_km, 
									array(
										'class' =>'form-control',
										'placeholder'=>'Enter Client User Type'
									)
								)}}
							</div>
						</div>
						<br />
						{{Form::submit(
							'Update', 
							array(
								'class' =>'btn btn-success',
								'name'=>'btnSubmit'
							)
						)}}
						{{Form::close()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection