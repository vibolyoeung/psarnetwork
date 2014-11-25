@extends('backend/layout') @section('title')
Deny Permission Page
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Deny Permission</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h2 class="panel-title" style="color:red;"><i class="fa fa-exclamation-triangle"></i> Permission Denied!</h2>
			</div>
			<div class="panel-body">
			<h4 class="text-center" style="color:red;">You do not have permission to access this page, please refer to your system administrator.</h4>
		</div>
		</div>
	</div>
</div>
 @endsection