@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}">Back End Setting</a></li>
		<li>Product Transfer Type</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title">Product Transfer Type</h3>
		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
						<?php $i=1;?>
						<?php foreach ($productTransferType as $productTransferType):?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$productTransferType->name}}</td>
							<td>
								<a href="{{URL::to('admin/product-transfer-type/edit')}}/{{$productTransferType->ptt_id}}">
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