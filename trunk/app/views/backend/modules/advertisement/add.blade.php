@extends('backend/layout') @section('title') Create @endsection
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
	<li><a href="{{URL::to('admin/advertisements')}}">Advertisement</a></li>
	<li>Create</li>
</ul>
@endsection @section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<i class="icon-calendar"></i>
				<h3 class="panel-title">Advertisement</h3>
			</div>
			<div class="panel-body">
				{{Form::open(array('url'=>'admin/create-advertisement','enctype'=>'multipart/form-data','file'=> true, 'class'=> 'form-vertical'))}}
				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Title<span class="class-required">*</span></label>
					{{Form::text('title',null, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
					<span class="class-error">{{$errors->first('title')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Link URL<span class="class-required">*</span></label>
					{{Form::text('url',null, array('class' => 'form-control','placeholder'=>'Enter URL'))}}
					<span class="class-error">{{$errors->first('url')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Start Date<span class="class-required">*</span></label>
					{{Form::text('startDate',null, array('class' => 'form-control datepicker','placeholder'=>'dd/mm/yyyy'))}}
					<span class="class-error">{{$errors->first('url')}}</span>
				</div>

				<div class="form-group date col-md-6 col-sm-12 col-xs-6">
					<label>Expiration Date<span class="class-required">*</span></label>
					{{ Form::text('expirationDate',null, array('class' => 'form-control datepicker','placeholder'=>'dd/mm/yyyy'))}}
					<span class="class-error">{{$errors->first('url')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Picture<span class="class-required">*</span></label>
					{{Form::file('file',array('class' => 'form-control'))}}
					<span class="class-error">{{$errors->first('file')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-6 col-xs-6">
					<label>Advertise On Page</label>
					{{ Form::select('advertisementPage',$advPage, null , array('class' => 'form-control', 'id' => 'ads-page'))}}
				</div>

				<div class="form-group col-md-6 col-sm-6 col-xs-6">
					<label>Position</label>
					{{ Form::select('advertisementPage', array(), null , array('class' => 'form-control', 'id' => 'ads-position'))}}
				</div>
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
					<label>Description</label>
					{{ Form::textarea('description',null, array('class' => 'form-control'))}}
				</div>

				<div class="form-group col-md-6 col-sm-6 col-xs-6">
					<label>Publish</label>
					{{ Form::checkbox('status',null, array('class' => 'form-control'))}}
				</div>
				<div class="form-group col-md-12 col-sm-12 col-xs-12">
					{{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
					{{Form::close()}}
				</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection
