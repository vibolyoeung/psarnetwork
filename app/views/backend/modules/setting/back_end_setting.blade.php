@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Back End Setting</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<tr>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i>
								<a href="{{URL::to('admin/setting-add-permission-name')}}">Add Permission Access</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i>
								<a href="{{URL::to('admin/location-setting')}}">Location</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i> <a href="{{URL::to('admin/markets')}}">Business Market</a>
							</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<tr>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i>
								<a href="#">Product Condition</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i>
								<a href="#">Product Transfer Type</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i> <a href="#">Business Page Condition</a>
							</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection