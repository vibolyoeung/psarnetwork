@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}">Back End Setting</a></li>
		<li>Product Condition</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<h3 class="panel-title">Product Condition</h3>
		</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<tr>
							<th>ID</th>
							<th>Product Condition</th>
							<th>Action</th>
						</tr>
						<?php $i=1;?>
						<?php foreach ($product_condition as $productCondition):?>
						<tr>
							<td>{{$i}}</td>
							<td>{{$productCondition->name}}</td>
							<td>
								<a href="{{URL::to('admin/product-condition/edit')}}/{{$productCondition->id}}">
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