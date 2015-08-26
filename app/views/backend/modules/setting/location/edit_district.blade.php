@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}" >Back End Setting</a></li>
		<li><a href="{{URL::to('admin/district-setting')}}/{{$province_id}}" />Districts</a></li>
		<li>Edit</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			<h3 class="panel-title">District</h3>
		</div>
			<div class="panel-body">
				{{Form::open(array('url'=>'admin/district/edit/'.$district->id.'/'.$district->province_id,'enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-12">
						<label>Name {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</label>
						{{Form::text(
							'dis_name_en',
							$district->dis_name_en, 
							array(
								'class' => 'form-control',
								'placeholder'=>'Enter District'
							)
						)}}
					</div>
					<div class="form-group col-md-12">
						<label>Name {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</label>
						{{Form::text(
							'dis_name_km',
							$district->dis_name_km, 
							array(
								'class' => 'form-control',
								'placeholder'=>'Enter District'
							)
						)}}
					</div>
					<div class="form-group col-md-12">
						{{Form::submit(
							'Update', 
							array(
								'class' => 'btn btn-success',
								'name'=>'btnSubmit'
							)
						)}}
						{{Form::close()}}
					</div>
			</div>
		</div>
	</div>
</div>
 @endsection