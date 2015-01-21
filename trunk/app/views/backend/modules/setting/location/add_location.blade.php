@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}" >Back End Setting</a></li>
		<li><a href="{{URL::to('admin/location-setting')}}" />Province</a></li>
		<li>Add</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			<h3 class="panel-title">Province</h3>
		</div>
			<div class="panel-body">
				{{Form::open(array('url'=>'admin/province/add','enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-11">
						{{Form::text('province_name',null, array('class' => 'form-control','placeholder'=>'Enter Province'))}}
						<span class="class-error">{{$errors->first('province_name')}}</span>
					</div>
					<div class="form-group col-md-1">
						{{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
						{{Form::close()}}
					</div>
			</div>
		</div>
	</div>
</div>
 @endsection