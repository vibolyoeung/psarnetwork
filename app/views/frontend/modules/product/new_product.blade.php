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
	{{HTML::style('backend/css/jquery-ui.css')}}
	{{HTML::script('frontend/js/product.js')}}
	<div class="container">
		{{Form::open(array('url'=>'products/create','enctype'=>'multipart/form-data','file' => true, 'class'=>'form-horizontal'))}}
			<div class="row">
				<div class="col-md-12 ">
					<div role="tabpanel">
		  				<!-- Nav tabs -->
						 <ul class="nav nav-tabs pro-tab" role="tablist">
						    <li role="presentation" class="active productInfo">
						    	<a href="#productInfo" aria-controls="productInfo" role="tab" data-toggle="tab">Product Info</a>
						    </li>
						    <li class="picture" role="presentation">
						    	<a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">Picture</a>
						    </li>
						    <li class="quotation" role="presentation">
						    	<a href="#quotation" aria-controls="quotation" role="tab" data-toggle="tab">Quotation</a>
						    </li>
						    <li class="contactInfo" role="presentation">
						    	<a href="#contactInfo" aria-controls="contactInfo" role="tab" data-toggle="tab">Contact Info</a>
						    </li>
						 </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="productInfo">
					    	<div class="col-md-12">
								<div class="well">
							    	<div class="form-group">
										<label class="col-sm-1 control-label">
											{{trans('product.category')}}
											
										</label>
										<div class="col-sm-11">
											<select required="required" class="form-control" name="s_category">
												@if(1 === (int)Session::get('currentUserAccountType'))
													@foreach($categoryTree as $category)
														<option value="{{$category['id']}}">
															{{$category['name_'.Session::get('lang')]}}
														</option>
													@endforeach
												@else 
													{{$categoryTree}}
												@endif
											</select>
										</div>
									</div>
									<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.product_title')}}
								</label>
								<div class="col-sm-11">
									{{Form::text('productTitle',null, array('required'=> 'required','class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.transfer_as')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select('proTransferType',$proTransferType, null, array('required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.condition')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select('productCondition',$productCondition, null, array('required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.status')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select('productStatus',Product::$PRODUCT_STATUS, null, array('required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.price')}}
								</label>
								<div class="col-sm-11">
									{{Form::text('productPrice', null, array('required'=> 'required', 'class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.description')}}
								</label>
								<div class="col-sm-11">
									{{Form::textarea('desc', null, array('required'=> 'required', 'class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.publish')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select('isPublish',Product::$PRODUCT_IS_PUBLISH, null, array( 'required'=> 'required', 'class' => 'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.date_post')}}
								</label>
								<div class="col-sm-11">
									{{Form::text('date_post', null, array('class'=>'form-control datepicker'))}}
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<a 
										class="btn btn-primary pull-right" 
										href="#pictures" 
										aria-controls="pictures" 
										role="tab" 
										onclick="is_active_tab('picture')" 
										data-toggle="tab">Next</a>
								</div>
							</div>
							</div>
							</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="pictures">
					    	<div class="col-md-12">
								<div class="well">
									<div class="row" id="upload-preview">
										<div class="col-md-12">
											<div class="well">
												<div class="form-group">
													<label>
														{{trans('product.upload_file')}}
													</label>
												</div>


												<table id="picture-table">
													<thead>
														<tr>
															<th
																width="10%"
																id="tableColumnPicture"
																data-prototype="<div class='form-group'><input type='file' name='file[]'  class='form-control' />"
															>
															</th>
															<th></th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>
																<div class="form-group">
																	<input 
																		required = 'required'
																		type="file" 
																		name="file[]" 
																		class="form-control" 
																	/>
																</div>
															</td>
															<td></td>
														</tr>
													</tbody>
												</table>
												<div class="form-group">
													<input 
														onClick="Upload.append_multiple_upload()"
														type="button"
														id="add_more" 
														class="btn btn-primary" 
														value="{{trans('product.add_more_files')}}"
													/>
												</div>
												<div class="form-group">
													<div class="col-sm-12">
														<a 
															class="btn btn-primary pull-right" 
															href="#quotation" 
															aria-controls="quotation" 
															onclick="is_active_tab('quotation')"
															role="tab" data-toggle="tab">Next</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					    	</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="quotation">
					    	<div class="col-md-12">
					    		<div class="well">
					    			<div class="form-group">
										<label>
											{{trans('product.upload_quotation')}}
										</label>
										{{Form::file('quotation', array('class' => 'form-control'))}}
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<a 
												class="btn btn-primary pull-right" 
												href="#contactInfo" 
												aria-controls="contactInfo"
												onclick="is_active_tab('contactInfo')" 
												role="tab" data-toggle="tab">Next</a>
										</div>
									</div>
					    		</div>
					    	</div>
					    </div>
					    <div role="tabpanel" class="tab-pane" id="contactInfo">
					    	<div class="col-md-12">
					    		<div class="well">
							    	<div class="form-group">
										<label>{{trans('product.contact_name')}}</label>
										{{ 
											Form::text(
												'contactName', 
												Session::get('currentUserName'), 
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
												Session::get('currentUserEmail'),
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
												Session::get('currentUserPhone'), 
												array(
													'required'=> 'required', 
													'class' => 'form-control'
												)
											)
										}}
									</div>
									<div class="form-group">
										<label>{{trans('product.location')}}</label>
										<?php 
											if (Session::has('currentUserAddress')) {
												$location = json_decode(Session::get('currentUserAddress'), true);
												$provinceId = $location['province'];
												if (!empty($provinceId)) {
													$location = Product::findProvinceById($provinceId);
												} else {
													$location = '';
												}
												
											} else {
												$location = '';
											}
										?>
										{{ 
											Form::text(
												'contactLocation', 
												$location,
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
					</div>
					<script>
					  $(function () {
					    $('#myTab a:last').tab('show')
					  });

					  function is_active_tab (id) {
					  	$('.pro-tab li').removeClass('active');
					  	$('.' + id).addClass('active');
					  }	

					</script>
							
						</div>
					</div>
				</div>
			</div>
		{{Form::close()}}
	</div>
	{{HTML::script('backend/js/jquery-ui.js')}}
    {{HTML::script('backend/js/custom.js')}}
@endsection
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection