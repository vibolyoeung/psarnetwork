@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}">Back End Setting</a></li>
		<li>Province</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<a href="{{URL::to('admin/province/add')}}">
				 <i class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i>
			</a>
			<h3 class="panel-title">Province</h3>
		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<tr>
							<th>ID</th>
							<th>Name {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</th>
							<th>Name {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</th>
							<th>View District</th>
							<th>Action</th>
						</tr>
						<?php $i=1;?>
						<?php foreach ($provinces as $province):?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$province->province_name_en}}</td>
							<td>{{$province->province_name_km}}</td>
							<td>
								<a href="{{URL::to('admin/district-setting')}}/{{$province->province_id}}">View Districts</a>
							</td>
							<td>
								<a href="{{URL::to('admin/province/edit')}}/{{$province->province_id}}">
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