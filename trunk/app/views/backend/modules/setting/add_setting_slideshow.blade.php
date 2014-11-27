@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/setting-list')}}">Setting</a></li>
		<li>Display Number Of Slideshows</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-body">
			@if(Session::has('SECCESS_MESSAGE'))
			<div class="alert alert-block alert-success fade in">
			<button data-dismiss="alert" class="close" type="button"
				data-original-title="">x</button>
			<p>{{Session::get('SECCESS_MESSAGE')}}</p>
			</div>
			@endif
			@if(Session::has('ERROR_MODIFY_MESSAGE'))
				<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button"
					data-original-title="">x</button>
				<p>{{Session::get('ERROR_MODIFY_MESSAGE')}}</p>
				</div>
			@endif
				<div class="table-responsive">
				{{Form::open(array('url'=>'admin/setting-add-slideshow'))}}
					<table class="table table-bordered no-margin">
						<tr>
							<th>
							{{ Form::select('setting_slideshow',array(''=>'Select Display Number of Slideshow',5=>5,10=>10,15=>15,20=>20,25=>25,30=>30,35=>35,40=>40,45=>45,50=>50), $slideshowSetting->setting_value , array('class' => 'form-control'))}}
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
 @endsection