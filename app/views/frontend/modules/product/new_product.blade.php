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
	{{HTML::style('frontend/plugin/dropzone/dist/dropzone.css')}}
	{{HTML::style('backend/css/jquery-ui.css')}}
	{{HTML::script('frontend/js/product.js')}}
	{{HTML::script('frontend/plugin/dropzone/dist/dropzone.js')}}
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
									{{Form::text(
										'productTitle',
										null, 
										array(
											'required'=> 'required',
											'class'=>'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.transfer_as')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select(
										'proTransferType',
										$proTransferType, 
										null, 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.condition')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select(
										'productCondition',
										$productCondition, 
										null, 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.status')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select(
										'productStatus',
										Product::$PRODUCT_STATUS, 
										null, 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.price')}}
								</label>
								<div class="col-sm-11">
									{{Form::text(
										'productPrice', 
										null, 
										array(
											'required'=> 'required', 
											'class'=>'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.description')}}
								</label>
								<div class="col-sm-11">
									{{Form::textarea(
										'desc', 
										null, 
										array(
											'required'=> 'required', 
											'class'=>'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.publish')}}
								</label>
								<div class="col-sm-11">
									{{ Form::select(
										'isPublish',
										Product::$PRODUCT_IS_PUBLISH, 
										null, 
										array(
											'required'=> 'required', 
											'class' => 'form-control'
										)
									)}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">
									{{trans('product.date_post')}}
								</label>
								<div class="col-sm-11">
									{{Form::text(
										'date_post', 
										null, 
										array(
											'class'=>'form-control datepicker'
										)
									)}}
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
					    	<div class="row">
					    		<div class="col-md-12">
					    			<table class="table">
                        			<thead>
                        				<tr>
                        					<th width="60px" style="width: 100px;">Picture</th>
                                            <th>File name</th>
                        					<th style="width: 80px;">Action</th>
                        				</tr>
                        			</thead>
                        			<tbody id="imgResult">
                        				<tr id="image-id-1">
                        					<td>
                                                <img src="http://localhost/psarnetwork/public/upload/product/thumb/9a9e23bfecfbbdc298f093784ccab55135c8ddb2.jpg" class="img-rounded" width="100" alt="test">
                        					</td>
                                            <td>
                                                9a9e23bfecfbbdc298f093784ccab55135c8ddb2.jpg
                                                <input id="file-id-1" type="hidden" name="hiddenFiles[]" value="9a9e23bfecfbbdc298f093784ccab55135c8ddb2.jpg">
                                            </td>
                        					<td>
                    							<a onclick="removeImg('1');" href="javascript:;">
                    								Delete
                    							</a>
                        					</td>
                        				</tr>
                        			 </tbody>
                        		</table>
					    		</div>
					    		<div class="col-md-12">
					    		<center>
									<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="background: none;padding:40px;border:5px dashed #ddd;">
									  <img alt="" src="{{Config::get('app.url')}}frontend/images/file-transfer-dropshare.png"/>
									</button>
								</center>
					    		</div>
					    	</div>
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
												</table>
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
						    $('#myTab a:last').tab('show');
						    
						    $("#multiUpload").dropzone(
								 { 
									 url: "{{Config::get('app.url')}}member/ajaxupload?page=imgproduct",
									 dataType: "json",
									 success: function(data){
										 var x = JSON.parse(data.xhr.responseText);
										 if(x.message == 'uploadSuccess') {
											 var imgFile = imgReult(x.file);
											 $('#imgResult').append(imgFile);
										 }
								            //$('#result').html(data.status +':' + data.message);          
								      },
								      error:function(){
								          //$("#result").html('There was an error updating the settings');
								      },
								      maxFiles: 2,
								      maxfilesexceeded: function(file) {
								    	  alert("No more files please!");
								          //this.removeAllFiles();
								          //this.addFile(file);
								      },
								      /**/
								 }
							);
					  });

					  function is_active_tab (id) {
					  	$('.pro-tab li').removeClass('active');
					  	$('.' + id).addClass('active');
					  }

					  function imgReult(file) {
						  console.log(file);
						  var res = file.split(".");
						  var bodyImg = '<tr id="image-id-1">'+
          					'<td>'+
			                          '<img src="{{Config::get('app.url')}}image/phpthumb/'+file+'?p=product&h=100&w=100" class="img-rounded" width="100" alt="test">'+
			  					'</td>'+
			                      '<td>'+file+
			                          '<input id="file-id-'+res+'" type="hidden" name="hiddenFiles[]" value="'+file+'">'+
			                      '</td>'+
			  					'<td>'+
										'<a onclick="removeImg('+res+');" href="javascript:;">Delete</a>'+
			  					'</td>'+
			  				'</tr>';
			  				return bodyImg;
					  }
					</script>
							
						</div>
					</div>
				</div>
			</div>
		{{Form::close()}}
	</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
         <form action="{{Config::get('app.url')}}member/ajaxupload?page=imgproduct" class="dropzone" id="multiUpload">
		  <div class="fallback">
		    <input name="userfile" type="file" multiple />
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
	.dropzone .dz-processing.dz-complete .dz-success-mark{  opacity: 1!important;}
  #multiUpload .dz-default.dz-message {background: url({{Config::get('app.url')}}frontend/images/file-transfer-dropshare.png) center center no-repeat;height:100px}
  #multiUpload .dz-default.dz-message span{padding-top: 100px;display: block;}
</style>	
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection

{{HTML::script('backend/js/jquery-ui.js')}}
    {{HTML::script('backend/js/custom.js')}}
@endsection