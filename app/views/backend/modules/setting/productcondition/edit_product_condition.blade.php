@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/back-end-setting')}}" >Back End Setting</a></li>
		<li><a href="{{URL::to('admin/product-condition')}}" />Product Condition</a></li>
		<li>Update</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
			<h3 class="panel-title">District</h3>
		</div>
			<div class="panel-body">
				{{Form::open(
					array(
						'url'=>'admin/product-condition/edit/'.$productConditionById->id,
						'enctype'=>'multipart/form-data',
						'file' => true
					)
				)}}
					<div class="form-group col-md-12">
						<label>Name: {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</label>
						{{Form::text(
							'product_condition_en',
							$productConditionById->name_en, 
							array(
								'class' => 'form-control'
							)
						)}}
					</div>
					<div class="form-group col-md-12">
						<label>Name: {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</label>
						{{Form::text(
							'product_condition_km',
							$productConditionById->name_km, 
							array(
								'class' => 'form-control'
							)
						)}}
					</div>
					<div class="form-group col-md-12">
						{{Form::submit('Update', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
						{{Form::close()}}
					</div>
			</div>
		</div>
	</div>
</div>
 @endsection