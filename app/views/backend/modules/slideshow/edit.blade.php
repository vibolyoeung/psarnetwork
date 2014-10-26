@extends('backend/layout')
@section('title')
	Edit
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
	<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
	<li><a href="{{URL::to('admin/slideshows')}}">Slideshow</a></li>
	<li>Edit</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<i class="icon-calendar"></i>
				<h3 class="panel-title">Slideshows</h3>
			</div>
			<div class="panel-body">
				{{Form::open(array('url'=>'admin/edit-slideshow','enctype'=>'multipart/form-data','file' => true))}}
				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Title<span class="class-required">*</span></label>
					{{ Form::text('title',$slideshows->title, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
					<span class="class-error">{{$errors->first('title')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Link URL<span class="class-required">*</span></label>
					{{ Form::text('url',$slideshows->link_url, array('class' => 'form-control','placeholder'=>'Enter URL'))}}
					<span class="class-error">{{$errors->first('url')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Create Date <span class="class-required">*</span></label>
					{{ Form::text('createdDate',$slideshows->created_date, array('class' => 'form-control datepicker','placeholder'=>'Enter Create Date'))}}
					<span class="class-error">{{$errors->first('createdDate')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Expire Date <span class="class-required">*</span></label>
					{{ Form::text('ExpireDate',$slideshows->expire_date, array('class' => 'form-control datepicker','placeholder'=>'Enter Expire Date'))}}
					<span class="class-error">{{$errors->first('ExpireDate')}}</span>
				</div>

				<div class="form-group col-md-6 col-sm-12 col-xs-6">
					<label>Picture<span class="class-required">*</span></label>
					{{ Form::file('file',array('class' => 'form-control'))}}
					<span class="class-error">{{$errors->first('file')}}</span>
				</div>
				<div class="form-group">
						{{HTML::image("upload/slideshow/thumb/".$slideshows->image,$slideshows->title,array())}}
				</div>

				<div class="form-group ">
					<label>Short Description</label>
					{{ Form::textarea('short_desc',$slideshows->short_desc, array('class' => 'form-control','placeholder'=>'Enter short description'))}}
				</div>

				<div class="form-group">
					<label>Description</label>
					{{ Form::textarea('desc',$slideshows->description, array('class' => 'form-control','placeholder'=>'Enter description'))}}
				</div>
				{{Form::hidden('hid',$slideshows->id)}}
				{{Form::submit('Update', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
				{{Form::close()}}
			</div>
		</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#isAdvertiserOption').hide();
			isAdvertiserDisplay();
		});
	</script>
 @endsection
