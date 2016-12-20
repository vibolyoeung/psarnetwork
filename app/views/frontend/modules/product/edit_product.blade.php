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
		{{Form::open(array('url'=>'products/edit/'.$product->id,'enctype'=>'multipart/form-data','file' => true, 'class'=>'form-horizontal', 'id'=>'addNewProduct'))}}
                <div class="col-md-12">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <div id="errorMessage"></div>
                         <ul class="nav nav-tabs pro-tab" role="tablist">
                         	<li role="productTag gettab" class="active presentation">
                                <a href="#productTag" aria-controls="productTag" role="tab" data-toggle="tab">{{trans('product.category')}}</a>
                            </li>
                            <li role="productInfor gettab" class="productInfor product-info">
                                <a href="#productInfor" aria-controls="productInfor" role="tab" data-toggle="tab">{{trans('product.tabproinfo')}}</a>
                            </li>
                            <li class="picture gettab pictures" role="presentation">
                                <a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">{{trans('product.tab_pro_picture')}}</a>
                            </li>
                            <li class="quotation gettab" role="presentation">
                                <a href="#quotation" aria-controls="quotation" role="tab" data-toggle="tab">{{trans('product.tab_pro_quotation')}}</a>
                            </li>
                            <li class="contactInfo gettab" role="presentation">
                                <a href="#contactInfo" aria-controls="contactInfo" role="tab" data-toggle="tab">{{trans('product.tab_pro_contact')}}</a>
                            </li>
                         </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      	<div role="tabpanel" class="tab-pane active" id="productTag">
                      		<div class="col-md-12">

                      			<div class="form-group">
                                        <label class="col-sm-1 control-label">
                                            {{trans('product.category')}}
                                        </label>
                                        <div class="col-sm-11">
                                        	<!-- <input id='tags_3' type='text' class='tags' style="height: 35px" name="s_category" value="{{@$category}}"/> -->
                                        	<div class="row" id="category-list">
                                        		<div class="well well-sm" style="padding:15px 0">
                                        			@if($category)
                                        			<div class="row">
                                        				{{@$editCategory}}
                                        				<input id='tags' type='text' id="categories" class='tags' style="height: 0;width:100%;border:none;" name="s_category" value="{{@$category}}" required/>

		                                        	</div>
		                                        	@else
		                                        	<div class="row">
		                                        		<input id='tags' type='text' id="categories" class='tags' style="height: 0;width:100%;border:none;" name="s_category" value="" required/>
		                                        		<div class="col-lg-2 col-md-4 col-sm-6">
		                                        			<div class="list-group" id="cat-sub-1">
															  {{@$chooseCategory}}
															</div>
		                                        		</div>

		                                        		<div class="col-lg-2 col-md-4 col-sm-6">
		                                        			<div class="list-group" id="cat-sub-2">
															</div>
		                                        		</div>

		                                        		<div class="col-lg-2 col-md-4 col-sm-6">
		                                        			<div class="list-group" id="cat-sub-3">
															</div>
		                                        		</div>

		                                        		<div class="col-lg-2 col-md-4 col-sm-6">
		                                        			<div class="list-group" id="cat-sub-4">
															</div>
														</div>

		                                        		<div class="col-lg-2 col-md-4 col-sm-6">
		                                        			<div class="list-group" id="cat-sub-5">
															</div>
		                                        		</div>

		                                        		<div class="col-lg-2 col-md-4 col-sm-6">
		                                        			<div class="list-group" id="cat-sub-6">
															</div>
		                                        		</div>
	                                        		</div>
	                                        		@endif
	                                        		<div class="clear"></div>
                                        		</div>
                                        	</div>
                                        </div>
                                        <div class="clear"></div>
                                        @if(empty($chooseCategory))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
										  <strong>Warning!</strong> Cateory require!, please {{ HTML::link('member/userinfo/menu', 'add categories')}} first!
										</div>
										@endif
                                    </div>


                             <div class="form-group">
                                <div class="col-sm-12">
                                    {{
                                        Form::submit(
                                            trans('product.save_product_ads'),
                                            array(
                                                'class' => 'btn btn-primary pull-right btnAddProduct',
                                                'id'=>'btnAddProduct',
                                                'name'=>'btnAddProduct'
                                            )
                                        )
                                    }}
                                    <a
                                        style="margin-right: 10px;"
                                        class="btn btn-primary pull-right"
                                        href="#productInfor"
                                        aria-controls="productInfor"
                                        role="tab"
                                        onclick="is_active_tab('product-info')"
                                        data-toggle="tab">{{trans('product.next')}}</a>
                                    <a
                                        style="margin-right: 10px;background:#333"
                                        class="btn btn-primary pull-right"
                                        href="{{URL::to('products/list')}}">{{trans('product.btn_back')}}</a>
                                </div>
                            </div>
                      		</div>
                      	</div>
                      	<!-- end category -->

                        <div role="tabpanel" class="tab-pane" id="productInfor">
                            <div class="col-md-12">

                                    <div class="form-group">
                                <label class="col-sm-1 control-label">
                                    {{trans('product.product_title')}}
                                </label>
                                <div class="col-sm-11">
                                    {{Form::text(
                                        'productTitle',
                                        @$product->title,
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
                                        @$product->pro_transfer_type_id,
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
                                        @$product->pro_condition_id,
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
                                        @$product->pro_status,
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
                                        @$product->price,
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
                                        @$product->description,
                                        array(
                                            'required'=> 'required',
                                            'class'=>'form-control',
                                            'id' => 'ckeditor',
                                            'placeholder'=>'Enter description'
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
                                        @$product->is_publish,
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
                                    <?php
                                    if(is_null($product->publish_date)){
                                        echo '<input type="text" name="date_post" class="form-control product_datepicker" value="'.date('Y-m-d').'"/>';
                                    }else{
                                    ?>
                                        {{Form::text(
                                            'date_post',
                                            @$product->publish_date,
                                            array(
                                                'class'=>'form-control product_datepicker'
                                            )
                                        )}}
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{
                                        Form::submit(
                                            trans('product.save_product_ads'),
                                            array(
                                                'class' => 'btn btn-primary pull-right btnAddProduct',
                                                'name'=>'btnAddProduct'
                                            )
                                        )
                                    }}
                                    <a
                                        style="margin-right: 10px;"
                                        class="btn btn-primary pull-right"
                                        href="#pictures"
                                        aria-controls="pictures"
                                        role="tab"
                                        onclick="is_active_tab('picture')"
                                        data-toggle="tab">{{trans('product.next')}}</a>
                                    <a
                                        style="margin-right: 10px;background:#333"
                                        class="btn btn-primary pull-right"
                                        href="{{URL::to('products/list')}}">{{trans('product.btn_back')}}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="pictures">
                        	<div class="row">
					    		<div class="col-md-12">
					    		<center>
									<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="background: none;padding:40px;border:5px dashed #ddd;">
									  <img alt="" src="{{Config::get('app.url')}}frontend/images/file-transfer-dropshare.png"/>

									</button>
								</center>
					    		</div>
					    	</div>

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
                                    <?php $imgArr = @json_decode(@$product->pictures, true);
                                    $i=0;
                                    $totalImage = count(@$imgArr);
                                    $totalImg = ($totalImage ==0)? '' : $totalImage;
                                    ?>
                                    <div style="text-align:center">
                                    <input value="{{@$totalImg}}" id="totalImage" required style="height:0;width:0;border:none;" />
                                    </div>
                                    @if(!empty($imgArr))
                        			@foreach(@$imgArr as $productImg)
                                        <?php $i++;?>
                        				<tr id="image-id-{{$i}}">
                        					<td>
                                            <?php $img = $productImg['pic'];?>
                        						{{HTML::image("image/phpthumb/$img?p=product&amp;h=100&amp;w=100",'test',array('class' => 'img-rounded','width'=>'100'))}}
                        					</td>
                                            <td>
                                                {{@$img}}
                                                <input id="file-id-{{$i}}"
                                                    type="hidden"
                                                    name="hiddenFiles[]"
                                                    value='{{$img}}'
                                                />
                                            </td>
                        					<td>
                    							<a
                    								onclick="removeImg('{{$i}}');"
                    								href="javascript:;">
                    								Delete
                    							</a>
                        					</td>
                        				</tr>
                        			@endforeach
                        			@endif
                        			</tbody>
                        		</table>
                            </div>
                            <!-- end image list -->

                            <div class="col-md-12">
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
                                                        {{
                                                            Form::submit(
                                                                trans('product.save_product_ads'),
                                                                array(
                                                                    'class' => 'btn btn-primary pull-right btnAddProduct',
                                                                    'name'=>'btnAddProduct'
                                                                )
                                                            )
                                                        }}
                                                        <a
                                                            style="margin-right: 10px;"
                                                            class="btn btn-primary pull-right"
                                                            href="#quotation"
                                                            aria-controls="quotation"
                                                            onclick="is_active_tab('quotation')"
                                                            role="tab" data-toggle="tab">{{trans('product.next')}}</a>
                                                        <a
                                        style="margin-right: 10px;background:#333"
                                        class="btn btn-primary pull-right"
                                        href="{{URL::to('products/list')}}">{{trans('product.btn_back')}}</a>
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
                                            {{
                                                Form::submit(
                                                    trans('product.save_product_ads'),
                                                    array(
                                                        'class' => 'btn btn-primary pull-right btnAddProduct',
                                                        'name'=>'btnAddProduct'
                                                    )
                                                )
                                            }}
                                            <a
                                                style="margin-right: 10px;"
                                                class="btn btn-primary pull-right"
                                                href="#contactInfo"
                                                aria-controls="contactInfo"
                                                onclick="is_active_tab('contactInfo')"
                                                role="tab" data-toggle="tab">
                                                {{trans('product.next')}}
                                                </a>
                                            <a
                                        style="margin-right: 10px;background:#333"
                                        class="btn btn-primary pull-right"
                                        href="{{URL::to('products/list')}}">{{trans('product.btn_back')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="contactInfo">
                            <div class="col-md-12">
                                <div class="well">
                                    <div class="form-group">
                                        <?php
                                            $contactInfo = @json_decode(@$product->contact_info, true);
                                            $contactLocation = @$contactInfo['contactLocation'];
                                            $contactHP = @$contactInfo['contactHP'];
                                            $contactEmail = @$contactInfo['contactEmail'];
                                            $contactName = @$contactInfo['contactName'];
                                        ?>
                                        <label>{{trans('product.contact_name')}}</label>
                                        @if(!$contactName)
                                        <?php
                                        	$contactName = Session::get('currentUserName');
                                        ?>
                                        @endif
                                        {{
                                            Form::text(
                                                'contactName',
                                                $contactName,
                                                array(
                                                    'required'=> 'required',
                                                    'class' => 'form-control'
                                                )
                                            )
                                        }}
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('product.email')}}</label>
                                        @if(!$contactEmail)
                                         <?php
                                        	$contactEmail = Session::get('currentUserEmail');
                                        ?>
                                        @endif
                                        {{
                                            Form::text(
                                                'contactEmail',
                                                $contactEmail,
                                                array(
                                                    'required'=> 'required',
                                                    'class' => 'form-control'
                                                )
                                            )
                                        }}
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('product.hp')}}</label>
                                        @if(!$contactHP)
                                        <?php
                                        	$contactHP = Session::get('currentUserPhone');
                                        ?>
                                        @endif
                                        {{
                                            Form::text(
                                                'contactHP',
                                                $contactHP,
                                                array(
                                                    'required'=> 'required',
                                                    'class' => 'form-control'
                                                )
                                            )
                                        }}
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('product.location')}}</label>
                                        @if(!$contactLocation)
                                        <?php
											if (Session::has('currentUserAddress')) {
												$location = json_decode(Session::get('currentUserAddress'), true);
												$provinceId = $location['province'];
												if (!empty($provinceId)) {
													$contactLocation = Product::findProvinceById($provinceId);
												} else {
													$contactLocation = '';
												}

											} else {
												$contactLocation = '';
											}
										?>
                                        @endif
                                        {{
                                            Form::text(
                                                'contactLocation',
                                                $contactLocation,
                                                array(
                                                    'required'=> 'required',
                                                    'class' => 'form-control'
                                                )
                                            )
                                        }}
                                    </div>

                                    <div class="form-group">
                                        <label >{{trans('product.contact-address')}}</label>
                                           {{Form::textarea(
                                                'contact_address',
                                                @$product->contact_address,
                                                array(
                                                    'required'=> 'required',
                                                    'class'=>'form-control',
                                                    'id' => 'ckeditor-address',
                                                    'placeholder'=>'Enter Your full address here!'
                                                )
                                            )}}
                                    </div>

                                    <div class="form-group">
                                        <a
                                        style="margin-right: 10px;background:#333"
                                        class="btn btn-primary"
                                        href="{{URL::to('products/list')}}">{{trans('product.btn_back')}}</a>
                                        {{
                                            Form::submit(
                                                trans('product.save_product_ads'),
                                                array(
                                                    'class' => 'btn btn-primary btnAddProduct',
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
                  </div>
{{HTML::script('/frontend/autocomplete/scripts/jquery-1.8.2.min.js')}}
<script>
var homePage = "{{Config::get('app.url')}}";
var errorArr =[];
var errorOnID=[];
var totalImg = "{{$totalImage}}";
var limitUpload = 8;
$(function(){
    jQuery(".btnAddProduct").click(function(){
        var category = jQuery("#tags").val();
        var productTitle = jQuery("input[name='productTitle']").val();
        var productPrice = jQuery("input[name='productPrice']").val();
        var desc = jQuery("textarea[name='desc']").val();
        var contactLocation = jQuery("input[name='contactLocation']").val();
        var proImage = $("#totalImage").val();


        var mCate = "{{trans('product.category')}}";
        var pTitle = "{{trans('product.product_title')}}";
        var pPrice = "{{trans('product.price')}}";
        var pDescription = "{{trans('product.description')}}";
        var pContactLocation = "{{trans('product.location')}}";
        var pImage = "{{trans('product.tab_pro_picture')}}";
        var idTag = 'productTag';
        var productTag = 'productTag';
        var productInfor = 'productInfor';
        var contactInfo = 'contactInfo';
        var proImgDiv = 'pictures';

        if(!proImage || proImage==0) {
            errorArr.push(pImage);
            errorOnID.push(proImgDiv);
        } else {
            errorArr = jQuery.grep(errorArr, function(value) {
              return value != pImage;
            });
            errorOnID = jQuery.grep(errorOnID, function(value) {
              return value != pImage;
            });
        }

        if(!category) {
            errorArr.push(mCate);
            errorOnID.push(idTag);
        } else {
            errorArr = jQuery.grep(errorArr, function(value) {
              return value != mCate;
            });
            errorOnID = jQuery.grep(errorOnID, function(value) {
              return value != productTag;
            });
        }

        if(!productTitle) {
            errorArr.push(pTitle);
            errorOnID.push(productInfor);
        } else {
            errorArr = jQuery.grep(errorArr, function(value) {
              return value != pTitle;
            });
            errorOnID = jQuery.grep(errorOnID, function(value) {
              return value != productInfor;
            });
        }

        if(!productPrice) {
            errorArr.push(pPrice);
            errorOnID.push(productInfor);
        } else {
            errorArr = jQuery.grep(errorArr, function(value) {
              return value != pPrice;
            });
            errorOnID = jQuery.grep(errorOnID, function(value) {
              return value != productInfor;
            });
        }

        if(!desc) {
            errorArr.push(pDescription);
            errorOnID.push(productInfor);
        } else {
            errorArr = jQuery.grep(errorArr, function(value) {
              return value != pDescription;
            });
            errorOnID = jQuery.grep(errorOnID, function(value) {
              return value != productInfor;
            });
        }

        if(!contactLocation) {
            errorArr.push(pContactLocation);
        } else {
            errorArr = jQuery.grep(errorArr, function(value) {
              return value != pContactLocation;
            });
            errorOnID = jQuery.grep(errorOnID, function(value) {
              return value != contactInfo;
            });
        }
        var getTextUnigue = unique(errorArr);
        var getUnigue = unique(errorOnID);
        if(getTextUnigue.length>0) {
            var errorS = '<ul>';
            for (var i = 0; i < getTextUnigue.length; ++i) {
                errorS += '<li>' + getTextUnigue[i] + '</li>';
            }
            errorS += '</ul>';
            var htmlDiv = '<div class="alert alert-danger"><strong>Oh snap! you got error on:</strong>'+errorS+'</div>';
            jQuery("#errorMessage").html(htmlDiv);
        } else {
            jQuery("#errorMessage").html('');
        }
    });

	$("a[role='tab']").click(function(e){
		pageurl = $(this).attr('href');
		$("ul.nav-tabs li").removeClass('active');
        $(this).parent().addClass('active');
        $(".tab-content .tab-pane").removeClass('active');
        $(".tab-content " + pageurl).addClass('active');
		if(pageurl!=window.location){
			window.history.pushState({path:pageurl},'',pageurl);
		}
		return false;
	});


	$("#multiUpload").dropzone(
			 {
				 url: "{{Config::get('app.url')}}member/ajaxupload?page=imgproduct&id={{$product->id}}",
				 dataType: "json",
				 success: function(data){
					 var x = JSON.parse(data.xhr.responseText);
					 if(x.message == 'uploadSuccess') {
						 var imgFile = imgReult(x.file);
						 $('#imgResult').append(imgFile);
	                     if(totalImg==0) {
	                        setImage = '';
	                    } else {
	                        setImage = totalImg;
	                    }
	                    $("#totalImage").val(setImage);
					 }
			            //$('#result').html(data.status +':' + data.message);
			      },
			      error:function(){
			          //$("#result").html('There was an error updating the settings');
			      },
			      maxFiles: limitUpload,
			      maxfilesexceeded: function(file) {
			    	  alert("No more files please!");
			          //this.removeAllFiles();
			          //this.addFile(file);
			      },
			   init: function() {
			    	this.on("addedfile", function(file) {
					if(limitUpload > totalImg) {
						totalImg++;
					} else {
						alert("Accept only 8 files only, No more files please!");
				        // Create the remove button
				        // Capture the Dropzone instance as closure.
				        var _this = this;
				        // Listen to the click event
				        removeButton.addEventListener("click", function(e) {
				          // Make sure the button click doesn't submit the form:
				          e.preventDefault();
				          e.stopPropagation();
				        });
					}
			      });
			    }
			      /**/
			 }
		);
});
  </script>

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
         <form action="{{Config::get('app.url')}}member/ajaxupload?page=imgproduct&id={{$product->id}}" class="dropzone" id="multiUpload">
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
  #category-list .list-group {max-height:300px;overflow-y:auto;padding:1px}
  #category-list .list-group .has-sub::after { content: "»";float:right}
</style>
@endsection
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection