@extends('backend/layout') @section('title') Create @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/categories')}}">Categories</a></li>
		<li>Create</li>
	</ul>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><i class="icon-calendar"></i>
					<h3 class="panel-title">Create</h3>
				</div>
				<div class="panel-body">
					{{Form::open(array('url'=>'admin/create-category'))}}
					<div class="form-group"><label>Title En<span class="class-required">*</span></label>
						{{ Form::text('name_en',null, array('class' =>
						'form-control','placeholder'=>'Enter Title'))}} <span
							class="class-error">{{$errors->first('name_en')}}</span>
					</div>
					<div class="form-group"><label>Title Zh<span class="class-required">*</span></label>
						{{ Form::text('name_zh',null, array('class' =>
						'form-control','placeholder'=>'Enter Title'))}} <span
							class="class-error">{{$errors->first('name_zh')}}</span>
					</div>
					<div class="form-group"><label>Parent<span class="class-required">*</span></label>
						<select name="parent_id" class="form-control">
							<option value="0">Select Parent</option>
							<?php foreach($categories as $cl) { ?>
							<option value="<?php echo $cl["id"] ?>"><?php echo $cl["name_en"]; ?></option>
							<?php } ?>
						</select>
					</div>
					{{Form::submit('Create', array('class' => 'btn
					btn-success','name'=>'btnSubmit'))}} {{Form::close()}}
				</div>
			</div>
		</div>
	</div>
@endsection
