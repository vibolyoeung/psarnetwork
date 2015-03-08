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
		{{Form::open(array('class'=>'form-horizontal'))}}
			<div class="row">
				<div class="col-md-12 ">
					<div class="col-md-6">
						<div class="well">
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.category')}}
								</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
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
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.condition')}}
								</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									{{trans('product.status')}}
								</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
									</select>
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
									<select name="isPublic" class="form-control">
										<option>Select</option>
									</select>
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
									<input class="form-control" name="file[]" type="file" id="file"/>
								</div>
								<br/>
								<input type="button" id="add_more" class="btn btn-primary" value="{{trans('product.add_more_files')}}"/>
							</div>
							<div class="form-group">
								<label>
									{{trans('product.upload_quotation')}}
								</label>
								<input type="file" name="quotation" class="form-control"/>
							</div>
							<hr />
							<div class="form-group">
								<label>{{trans('product.contact_name')}}</label>
								<input type="text" name="contactName" class="form-control" />
							</div>
							<div class="form-group">
								<label>{{trans('product.email')}}</label>
								<input type="text" name="contactEmail" class="form-control" />
							</div>
							<div class="form-group">
								<label>{{trans('product.hp')}}</label>
								<input type="text" name="contactHP" class="form-control" />
							</div>
							<div class="form-group">
								<label>{{trans('product.location')}}</label>
								<input type="text" name="contactLocation" class="form-control" />
							</div>
							<div class="form-group">
								<input type="submit" name="btnSubmitAds" class="btn btn-primary"  value="{{trans('product.save_product_ads')}}"/>
							</div>
							<!-- App::make('FeProductController')->someAction(['parameter' => $value])-->
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