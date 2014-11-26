@extends('backend/layout') @section('title') Categories @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Categories</li>
	</ul>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-sx-12">
			<div class="panel panel-default">
				<div class="panel-heading clearfix"><a
					href="{{URL::to('admin/create-category')}}"> <i
					class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i> </a>
					<h3 class="panel-title">Categories</h3>
				</div>
				<div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
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
					<br />
					<div class="table-responsive">
						<table class="table table-bordered no-margin">
							<thead>
								<tr>
									<th>#</th>
									<th>Title En</th>
									<th>Title Zh</th>
									<th class="class-center">Status</th>
									<th class="class-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($categoryList as $row) {{$row}} @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection