@extends('backend/layout')
@section('title')
    Create
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/markets')}}">Markets</a></li>
		<li><a href="{{URL::to('admin/market/store')}}/{{$storeName}}/{{$id}}">{{$storeName}}</a></li>
		<li><a href="{{URL::to('admin/market/store')}}/{{$storeName}}/{{$id}}">Store</a></li>
		<li>Create</li>
	</ul>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<i class="icon-calendar"></i>
					<h3 class="panel-title">Markets</h3>
				</div>
				<div class="panel-body">
					{{Form::open(array('url'=>"admin/market/store/create/$storeName/$id",'enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Title En<span class="class-required">*</span></label>
						{{Form::text('title_en',null, array('class' => 'form-control','placeholder'=>'Enter Title En'))}}
						<span class="class-error">{{$errors->first('title_en')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Title Zh<span class="class-required">*</span></label>
						{{Form::text('title_zh',null, array('class' => 'form-control','placeholder'=>'Enter Title Zh'))}}
						<span class="class-error">{{$errors->first('title_zh')}}</span>
					</div>


					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Description En</label>
						{{ Form::textarea('desc_en',null, array('class' => 'form-control'))}}
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Description Zh</label>
						{{ Form::textarea('desc_zh',null, array('class' => 'form-control'))}}
					</div>

					<div class="form-group col-xs-12">
						<label>Image <span class="class-required">*</span></label>
						{{ Form::file('file',array('class' => 'form-control'))}}
						<span class="class-error">{{$errors->first('file')}}</span>
					</div>
					<div class="form-group col-xs-12">
						<label>Stair<span class="class-required">*</span></label>
						{{Form::text('stair',null, array('class' => 'form-control','placeholder'=>'Enter Stair'))}}
						<span class="class-error">{{$errors->first('stair')}}</span>
					</div>

					<div class="form-group col-md-12">
						{{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
						{{Form::close()}}
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

 @endsection