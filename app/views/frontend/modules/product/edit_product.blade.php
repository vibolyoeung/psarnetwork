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
<link href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' id='font-awesome-css' media='all' rel='stylesheet' type='text/css'/>
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
                         	<li role="productTag gettab" class="active presentation">
                                <a href="#productTag" aria-controls="productTag" role="tab" data-toggle="tab">{{trans('product.category')}}</a>
                            </li>
                            <li role="productInfo gettab" class="productInfo product-info">
                                <a href="#productInfo" aria-controls="productInfo" role="tab" data-toggle="tab">Product Info</a>
                            </li>
                            <li class="picture gettab pictures" role="presentation">
                                <a href="#pictures" aria-controls="pictures" role="tab" data-toggle="tab">Picture</a>
                            </li>
                            <li class="quotation gettab" role="presentation">
                                <a href="#quotation" aria-controls="quotation" role="tab" data-toggle="tab">Quotation</a>
                            </li>
                            <li class="contactInfo gettab" role="presentation">
                                <a href="#contactInfo" aria-controls="contactInfo" role="tab" data-toggle="tab">Contact Info</a>
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
                                        				<input id='tags' type='hidden' class='tags' style="height: 35px;width:100%" name="s_category" value="{{@$category}}"/>
		                                       
		                                        	</div>
		                                        	@else
		                                        	<div class="row">
		                                        		<input id='tags' type='hidden' class='tags' style="height: 35px;width:100%" name="s_category" value=""/>
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
                                                'class' => 'btn btn-primary pull-right', 
                                                'name'=>'btnAddProduct'
                                            )
                                        )
                                    }}
                                    <a
                                        style="margin-right: 10px;" 
                                        class="btn btn-primary pull-right" 
                                        href="#productInfo" 
                                        aria-controls="productInfo" 
                                        role="tab" 
                                        onclick="is_active_tab('product-info')" 
                                        data-toggle="tab">Next</a>
                                </div>
                            </div>
                      		</div>
                      	</div>
                      	<!-- end category -->
                      	
                        <div role="tabpanel" class="tab-pane" id="productInfo">
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
                    
                                                </table>
                                            
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
                    var homePage = "{{Config::get('app.url')}}";
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
    					  	$("." + id).addClass('active');
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

    					  function getsub(id,byLevel) {
        					  var nextLevel = byLevel + 1;
        					  $("#cat-sub-"+byLevel+" .list-group-item").removeClass('active');
        					  $("#cat-list-" + id).addClass('active');
        					  if(id) {
        						  $.ajax({
        							    url: homePage + "products/ajax?p=getprocat&id="+id + "&level=" + nextLevel,
        							    type: "GET",
        							    dataType: "json",
        							    timeout: 3600,
        							    success: function(response) {
            							    if(response.html != '') {
            							    	$("#cat-sub-"+byLevel+" .list-group-item").removeClass('has-sub');
            							    	$("#cat-list-" + id).addClass('has-sub');
                							    $("#cat-sub-" + response.level).html(response.html);

                							    /*empty low level*/
                							    if(nextLevel == 2) {
                							    	$("#cat-sub-3").html('');
                							    	$("#cat-sub-4").html('');
                							    	$("#cat-sub-5").html('');
                							    	$("#cat-sub-6").html('');
                							    }
                							    if(nextLevel == 3) {
                							    	$("#cat-sub-4").html('');
                							    	$("#cat-sub-5").html('');
                							    	$("#cat-sub-6").html('');
                							    }
                							    if(nextLevel == 4) {
                							    	$("#cat-sub-5").html('');
                							    	$("#cat-sub-6").html('');
                							    }
                							    if(nextLevel == 5) {
                							    	$("#cat-sub-6").html('');
                							    }
                							    
            							    }

            							    /*add to tag*/
            							    var tagHmtl = [];
            							    $('#category-list .active').each(function (index, element) {
                							    var num = index + 1;
                							    var text = $('#category-list #cat-sub-'+num+' .active').text();
                							    var id = $('#category-list #cat-sub-'+num+' .active').attr('data-id');
                							    tagHmtl.push(id);
            							    });
            							    $("#tags").val(tagHmtl);
            							    /*End add to tag*/
            							},
        							    error: function(x, t, m) {
        							        if(t==="timeout") {
        							            alert("got timeout");
        							        } else {
        							            alert(t);
        							        }
        							    }
        							});
        					  }
    					  }                     
                    </script>
                            
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
  #category-list .list-group {max-height:300px;overflow-y:auto;padding:1px}
  #category-list .list-group .has-sub::after { content: "»";float:right}
</style>    
@endsection
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection