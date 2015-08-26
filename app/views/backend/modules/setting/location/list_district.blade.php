@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}">Back End Setting</a></li>
		<li><a href="{{URL::to('admin/location-setting')}}" />Province</a></li>
		<li>{{$provinceByName->province_name_en}}</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<a href="{{URL::to('admin/district/add')}}/{{$province_id}}">
				 <i class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i>
			</a>
			<h3 class="panel-title">District</h3>
		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<tr>
							<th>ID</th>
							<th>Name {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</th>
							<th>Name {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</th>
							<th>Action</th>
						</tr>
						<?php $i=1;?>
						<?php foreach ($districts as $district):?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$district->dis_name_en}}</td>
							<td>{{$district->dis_name_km}}</td>
							<td>
								<a href="{{URL::to('admin/district/edit')}}/{{$district->id}}/{{$district->province_id}}">
									<i class="icon-edit primary"></i>
								</a>
							</td>
						</tr>
						<?php $i++;?>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection