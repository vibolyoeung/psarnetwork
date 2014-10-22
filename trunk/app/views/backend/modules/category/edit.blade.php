@extends('backend/layout') @section('title') Edit @endsection
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
					<h3 class="panel-title">Edit</h3>
				</div>
				<div class="panel-body">
					{{Form::open(array('url'=>'admin/edit-category'))}}
					<div class="form-group"><label>Title En<span class="class-required">*</span></label>
						{{ Form::text('name_en',$categoryById->name_en, array('class' =>
						'form-control','placeholder'=>'Enter Title'))}} <span
							class="class-error">{{$errors->first('name_en')}}</span>
					</div>
					<div class="form-group"><label>Title Zh<span class="class-required">*</span></label>
						{{ Form::text('name_zh',$categoryById->name_zh, array('class' =>
						'form-control','placeholder'=>'Enter Title'))}} <span
							class="class-error">{{$errors->first('name_zh')}}</span>
					</div>
					<div class="form-group"><label>Parent<span class="class-required">*</span></label>
						<select name="parent_id" class="form-control">
							<option value="0">Select Parent</option>
							<?php foreach($categories as $cl) { ?>
							<option
							<?php echo ($categoryById->parent_id == $cl['id']) ? 'selected' : ''?>
								value="<?php echo $cl["id"] ?>"><?php echo $cl["name_en"]; ?></option>
								<?php } ?>
						</select>
					</div>
					{{Form::hidden('id',$categoryById->id)}} {{Form::submit('Update',
					array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>
	@endsection
