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
    {{HTML::style('frontend/plugin/dropzone/dist/dropzone.css')}}
    {{HTML::script('frontend/plugin/dropzone/dist/dropzone.js')}}
    {{HTML::script('frontend/js/product.js')}}
	<div class="container">
		{{Form::open(array('url'=>'products/edit/'.$product->id,'enctype'=>'multipart/form-data','file' => true, 'class'=>'form-horizontal'))}}
                <div class="col-md-12 ">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                         <ul class="nav nav-tabs pro-tab" role="tablist">
                            <li role="presentation gettab" class="active productInfo">
                                <a href="#productInfo" aria-controls="productInfo" role="tab" data-toggle="tab">Product Info</a>
                            </li>
                            <li class="picture gettab pictures" role="presentation">
                                <a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">Picture</a>
                            </li>
                            <li class="quotation gettab quotation" role="presentation">
                                <a href="#quotation" aria-controls="quotation" role="tab" data-toggle="tab">Quotation</a>
                            </li>
                            <li class="contactInfo gettab contactInfo" role="presentation">
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
                                    {{Form::text(
                                        'date_post', 
                                        @$product->publish_date, 
                                        array(
                                            'class'=>'form-control datepicker'
                                        )
                                    )}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {{ 
                                        Form::submit(
                                            trans('product.save_product_ads'), 
                                            array(
                                                'class' => 'btn btn-primary pull-right', 
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
                                        data-toggle="tab">Next</a>
                                </div>
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
                                    ?>
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
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input 
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
                                                        {{ 
                                                            Form::submit(
                                                                trans('product.save_product_ads'), 
                                                                array(
                                                                    'class' => 'btn btn-primary pull-right', 
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
                                                            role="tab" data-toggle="tab">Next</a>
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
                                                        'class' => 'btn btn-primary pull-right', 
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
                    var totalImg = {{$totalImage}};
                    var limitUpload = 8;
                      $(function () {
                        $('#myTab a:last').tab('show')
                      });

                      function is_active_tab (id) {
                        $('.pro-tab li').removeClass('active');
                        $('.' + id).addClass('active');
                      } 
                      
                      function removeImg($id) {
                            var txt;
                            var r = confirm("are you sure to delete this image?");
                            if (r == true) {
                                $("#image-id-" + $id).hide();
                                $("#file-id-" + $id).attr('name','delimag[]');
                                totalImg = totalImg - 1;
                            } else {
                                //txt = "You pressed Cancel!";
                            }
                            //document.getElementById("demo").innerHTML = txt;
                        }
                        
                        /*set current active page*/
                        if(window.location.hash) {
                              var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
                              $("ul.nav-tabs li").removeClass('active');
                              $("ul.nav-tabs li." + hash).addClass('active');
                              
                              $(".tab-content .tab-pane").removeClass('active');
                              $(".tab-content #" + hash).addClass('active');
                          } else {
                              // No hash found
                          }
                          
                        $(function(){
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
											totalImg = totalImg + 1;
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

                        function is_active_tab (id) {
    					  	$('.pro-tab li').removeClass('active');
    					  	$('.' + id).addClass('active');
    					  }

    					  function imgReult(file) {
    						  var newImg = file.trim();
    						  var res = newImg.split(".");
    						  var bodyImg = '<tr id="image-id-'+res[0]+'">'+
              					'<td>'+
    			                          '<img src="{{Config::get('app.url')}}image/phpthumb/'+file+'?p=product&h=100&w=100" class="img-rounded" width="100" alt="test">'+
    			  					'</td>'+
    			                      '<td>'+file+
    			                          '<input id="file-id-'+res+'" type="hidden" name="hiddenFiles[]" value="'+file+'">'+
    			                      '</td>'+
    			  					'<td>'+
    										'<a onclick="removeImg(&#39;'+res[0]+'&#39;);" href="javascript:;">Delete</a>'+
    			  					'</td>'+
    			  				'</tr>';
    			  				return bodyImg;
    					  }                        
                    </script>
                            
                        </div>
                    </div>
                </div>
		{{Form::close()}}
	</div>
    {{HTML::script('backend/js/jquery-ui.js')}}
    {{HTML::script('backend/js/custom.js')}}
    
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
</style>    
@endsection
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection