@extends('frontend.nosidebar') 
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
		{{Form::open(array('url'=>'products/edit/$product->id','enctype'=>'multipart/form-data','file' => true, 'class'=>'form-horizontal'))}}
			<div class="row">
				<div class="col-md-12 ">
					<div class="col-md-6">
						<div class="well">
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.category')}}
								</label>
								<div class="col-sm-10">
									<select required="required" class="form-control" name="s_category">
										<?php foreach($categoryTree as $cl) : ?>
											<option
												@if($product->s_category_id === $cl['id'])
													selected
												@endif 
												value="{{$cl['id']}}"
											>
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
									{{Form::text('productTitle',$product->title, array('required'=> 'required','class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.transfer_as')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('proTransferType',$proTransferType, $product->pro_transfer_type_id, array('required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.condition')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('productCondition',$productCondition, $product->pro_condition_id, array('required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.status')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('productStatus',Product::$PRODUCT_STATUS, $product->pro_status, array('required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.price')}}
								</label>
								<div class="col-sm-10">
									{{Form::text('productPrice', $product->price, array('required'=> 'required', 'class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.description')}}
								</label>
								<div class="col-sm-10">
									{{Form::textarea('desc', $product->description, array('required'=> 'required', 'class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.publish')}}
								</label>
								<div class="col-sm-10">
									{{ Form::select('isPublish',Product::$PRODUCT_IS_PUBLISH, $product->is_publish, array( 'required'=> 'required', 'class' => 'form-control'))}}
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
									<input required = 'required' class="form-control" name="file[]" type="file" id="file" />
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
							<?php $contactInfo = json_decode($product->contact_info, true)?>
							<div class="form-group">
								<label>{{trans('product.contact_name')}}</label>
								{{ 
									Form::text(
										'contactName', 
										$contactInfo['contactName'], 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)
								}}
							</div>
							<div class="form-group">
								<label>{{trans('product.email')}}</label>
								{{ 
									Form::text(
										'contactEmail', 
										$contactInfo['contactEmail'], 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)
								}}
							</div>
							<div class="form-group">
								<label>{{trans('product.hp')}}</label>
								{{ 
									Form::text(
										'contactHP', 
										$contactInfo['contactHP'], 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)
								}}
							</div>
							<div class="form-group">
								<label>{{trans('product.location')}}</label>
								{{ 
									Form::text(
										'contactLocation', 
										$contactInfo['contactLocation'], 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)
								}}
							</div>
							<div class="form-group">
								{{ 
									Form::submit(
										trans('product.save_product_ads'), 
										array(
											'class' => 'btn btn-primary', 
											'name'=>'btnAddProduct'
										)
									)
								}}
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