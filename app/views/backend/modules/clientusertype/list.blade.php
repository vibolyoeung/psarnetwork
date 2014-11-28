@extends('backend/layout') @section('title')
Client User Type
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Client User Type</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			<h3 class="panel-title">Client User Type</h3>
			</div>
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
			<br />
		<div class="table-responsive">
		<table class="table table-bordered no-margin">
			<thead>
				<tr>
					<th>#</th>
					<th>Client User Type Name</th>
					<th class="class-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i=1;?>
		@foreach($clentTypes as $clentType)
		<tr>
			<td>{{$i}}</td>
			<td>{{$clentType->name}}</td>
			<td align="center">
				<a title="Edit" href="{{URL::to('admin/client-user-type-edit')}}/{{$clentType->id}}">
					<i class="icon-edit primary"></i>
				</a>
			</td>
		</tr>
		<?php $i++;?>
		@endforeach


	</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
 @endsection