@extends('frontend.modules.product.layout')
@section('title')
	Product Management
@endsection
	@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
	@endsection
@section('content')
	<div class="container">
		{{Form::open(array('url'=>'products/create','enctype'=>'multipart/form-data','file' => true, 'class'=>'form-horizontal'))}}
			<div class="row">
				<div class="col-md-12 ">
					<div class="col-md-6">
						<div class="well">
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.category')}}
								</label>
								<div class="col-sm-10">
									<select class="form-control" name="s_category">
										<?php foreach($categoryTree as $cl) : ?>
											<option value="{{$cl['id']}}">
												{{$cl['m_title']}}
											</option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.product_title')}}
								</label>
								<div class="col-sm-10">
									{{Form::text('productTitle',null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.transfer_as')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('proTransferType',$proTransferType, null, array('class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.condition')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('productCondition',$productCondition, null, array('class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.status')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('productCondition',Product::$PRODUCT_STATUS, null, array('class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.price')}}
								</label>
								<div class="col-sm-10">
									{{Form::text('productPrice', null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.description')}}
								</label>
								<div class="col-sm-10">
									{{Form::textarea('desc', null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.publish')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('productCondition',Product::$PRODUCT_IS_PUBLISH, null, array('class' => 'form-control'))}}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="well">
							<div class="row" id="upload-preview">
							<div class="form-group">
								<label>
									{{trans('product.upload_file')}}
								</label>
							</div>
							<div class="form-group">
								<div id="filediv">
									<input class="form-control" name="file[]" type="file" id="file" />
								</div>
								<br/>
								<input type="button" id="add_more" class="btn btn-primary" value="{{trans('product.add_more_files')}}"/>
							</div>
							<div class="form-group">
								<label>
									{{trans('product.upload_quotation')}}
								</label>
								{{Form::file('quotation', array('class' => 'form-control'))}}
							</div>
							<hr />
							<div class="form-group">
								<label>{{trans('product.contact_name')}}</label>
								{{ Form::text('contactName', null, array('class' => 'form-control'))}}
							</div>
							<div class="form-group">
								<label>{{trans('product.email')}}</label>
								{{ Form::text('contactEmail', null, array('class' => 'form-control'))}}
							</div>
							<div class="form-group">
								<label>{{trans('product.hp')}}</label>
								{{ Form::text('contactHP', null, array('class' => 'form-control'))}}
							</div>
							<div class="form-group">
								<label>{{trans('product.location')}}</label>
								{{ Form::text('contactLocation', null, array('class' => 'form-control'))}}
							</div>
							<div class="form-group">
								{{ Form::submit(trans('product.save_product_ads'), array('class' => 'btn btn-primary', 'name'=>'btnAddProduct'))}}
							</div>
						</div>
					</div>
				</div>
			</div>
		{{Form::close()}}
	</div>
@endsection
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection