@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Setting</li>
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
								<a href="{{URL::to('admin/setting-add-permission-name')}}">Add Permission Actions</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i> <a href="{{URL::to('admin/setting-add-slideshow')}}">Add Setting Slideshow</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i> <a href="">Add Others</a>
							</th>
							<th width="300">
								<i class="icon-plus btn btn-xs btn-info"></i> <a href="">Add Others</a>
							</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection