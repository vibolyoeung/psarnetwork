@extends('backend/layout')
@section('title')
    Create
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/markets')}}">Markets</a></li>
		<li>Create</li>
	</ul>
@endsection
@section('content')
	{{HTML::style('ce_editor/jquery.cleditor.css')}}
	{{HTML::script('ce_editor/jquery.js')}}
	{{HTML::script('ce_editor/jquery.cleditor.js')}}
	<script type="text/javascript">
	$(document).ready(function () {
		$(".ce_editor").cleditor();
	});
	</script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	{{HTML::script('frontend/js/map.js')}}
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<i class="icon-calendar"></i>
					<h3 class="panel-title">Markets</h3>
				</div>
				<div class="panel-body">
					{{Form::open(array('url'=>'admin/create-market','enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>
						Title<span class="class-required">*</span>
						{{HTML::image("backend/images/lang-icons/en.png",'EN',array())}}
						</label>
						{{Form::text('title_en',null, array('class' => 'form-control','placeholder'=>'Enter Title EN'))}}
						<span class="class-error">{{$errors->first('title_en')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>
						Title<span class="class-required">*</span>
						{{HTML::image("backend/images/lang-icons/km.png",'KM',array())}}
						</label>
						{{Form::text('title_km',null, array('class' => 'form-control','placeholder'=>'Enter Title KM'))}}
						<span class="class-error">{{$errors->first('title_km')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Provinces <span class="class-required">*</span></label>
						{{ Form::select('province_id',$provinces, null , array('class' => 'form-control', 'id' => 'provinces'))}}
						<span class="class-error">{{$errors->first('province_id')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Districts <span class="class-required">*</span></label>
						<select class="form-control" name="district_id" id="district_option"></select>
						<span class="class-error">{{$errors->first('district_id')}}</span>
					</div>
					<div class="form-group col-md-12">
						<label>Address</label>
						<input
							type="text"
							name="MappingAddressHere"
							class="form-control"
							id="latbox"
							placeholder="{{trans('register.Mapping_Address_Here_Placeholder')}}"
							aria-describedby="MappingAddressHereStatus"
							required
						/>
						<br/>
						<div id="mapWrapper">
							<div id="gmap" style="width: 100%; height: 375px"></div>
						</div>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Description {{HTML::image("backend/images/lang-icons/en.png",'EN',array())}}</label>
						{{ Form::textarea('desc_en',null, array('class' => 'form-control ce_editor'))}}
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Description {{HTML::image("backend/images/lang-icons/km.png",'KM',array())}}</label>
						{{ Form::textarea('desc_km',null, array('class' => 'form-control ce_editor'))}}
					</div>

					<div class="form-group col-xs-12">
						<label>Image <span class="class-required">*</span></label>
						{{ Form::file('file',array('class' => 'form-control'))}}
						<span class="class-error">{{$errors->first('file')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Business-Market-Type<span class="class-required">*</span></label>
						{{ Form::select('market_type',$marketTypes, null , array('class' => 'form-control', 'id' => 'district_option'))}}
						<span class="class-error">{{$errors->first('market_type')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Amount of Stair<span class="class-required">*</span></label>
						{{Form::text('amount_stair',null, array('class' => 'form-control','placeholder'=>'Enter Amount of stair'))}}
						<span class="class-error">{{$errors->first('amount_stair')}}</span>
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
