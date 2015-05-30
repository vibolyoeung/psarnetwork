@extends('frontend.nosidebar') @section('title') Register for Enterprise Seller Page @endsection @section('breadcrumb')
<ol class="breadcrumb">
	<li>
		<a href="#">Home</a>
	</li>
	<li>
		<a href="#">Library</a>
	</li>
	<li class="active">
		Data
	</li>
</ol>
@endsection @section('frontend.partials.left') @endsection @section('content')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css"/>
{{HTML::script('frontend/js/jquery-upload/jquery.form.js')}}
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type='text/javascript'>
		
var homePage = "{{Config::get('app.url')}}";

</script>
@if($dataStore)
<div class="memberlogin">
	<div class="col-sm-3">
		@include('frontend.modules.member.layout.sidebar')
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<div class="conent">
				<div class="alert alert-success fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
					<strong>
						{{trans('register.con_alert_header')}}
					</strong>
					   {{trans('register.con_alert_text')}}
				</div>
				<div class="category-tab shop-details-tab" style="margin: 0;">
					<div class="tab-content">
						<div class="tab-pane fade active in" id="personal">
							<div class="col-sm-12">
								<div class="row">
									<div style="border-top: 1px solid #ccc; clear: both; display:block;margin-top:15px">
									</div>
									<!-- create menu -->
									<div class="col-sm-6 hidden-sm" style="border-right: 1px solid #ccc;">
										<div class="pro-detail">
											<div class="col-sm-12" id="sitePreview">
												<div class="row" style="margin: 0;">
													<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;display:block">
														<h3>
															{{trans('register.TAB_Your_Site_page_Preview')}}
														</h3>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4">
														<div id='logo-preview' style="margin: 10px 0 0 0;width: 100px; height: 100px;">
															@if($dataStore->image)
															<img src="{{Config::get('app.url')}}/upload/store/thumb/{{$dataStore->image}}" />
															@else
															<img src="http://placehold.it/100x100&text=Logo" />
															@endif
														</div>
													</div>
													<div class="col-sm-8">
														<div id='banner-preview' style="margin: 10px 0 0 0;width: 100%; height: 100px;">
															@if($dataStore->sto_banner)
															<img src="{{Config::get('app.url')}}/upload/store/thumb/{{$dataStore->sto_banner}}" style="width: 100%;height:100px" />
															@else
															<img src="http://placehold.it/500x100&text=Banner here" style="width: 100%;height:100px" />
															@endif
														</div>
													</div>
												</div>
												<div class="row" style="margin: 10px 0 0 0;">
													<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin:0">
														<div id="navbar" class="navbar-collapse collapse">
															<ul class="nav navbar-nav" id="menu_results" style="margin:0">
																<li class="active">
																	<a href="javascript:;">Home</a>
																</li>
															</ul>
														</div>
														<!--/.nav-collapse -->
													</nav>
													<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin:0;z-index:1">
														<div id="navbar" class="navbar-collapse collapse">
															<ul class="nav navbar-nav navbar-nav-a" id="Dmenu_results_a" style="margin:0;background:#eee">
															</ul>
														</div>
														<!--/.nav-collapse -->
													</nav>
												</div>
												<div class="row">
													<div class="col-sm-3">
														<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;">
															{{trans('register.TAB_Left')}}
														</div>
													</div>
													<div class="col-sm-6">
														<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0" id="costomLayout">
															<ul id="sortable">
																@if($dataPageWidget) @foreach ($dataPageWidget as $pageWidget)
																<li class="ui-state-default" id="{{$pageWidget->id}}">
																	{{($pageWidget->title!='undefined' ? $pageWidget->title : $pageWidget->title_en)}}
																	<div class="editVB">
																		<input type="checkbox" class="page-{{$pageWidget->id}}" value="{{$pageWidget->id}}" onclick="enableBox({{$pageWidget->id}});" {{($pageWidget->
																		status) ? 'checked':''}}/>
																	</div>
																</li>
																@endforeach @endif
															</ul>
														</div>
													</div>
													<div class="col-sm-3">
														<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;">
															{{trans('register.TAB_Right')}}
														</div>
													</div>
												</div>
											</div>
											<!-- end site preview -->
										</div>
									</div>
									<!--end product describe-->
									<div class="col-sm-6">
										<div class="pro-detail">
											<h3>
												{{trans('register.TAB_Your_content_design')}}
											</h3>
                                            <div class="col-sm-12">
												<fieldset>
													<legend>
														{{trans('register.TAB_headerText')}}:
													</legend>
													<div id="titleFxt" class="titleFxt" onclick="edit_title_txt();">
														<?php $headerTitle = @$dataStore->{'title_'.app::getLocale()};?>
														@if($headerTitle)
															{{$headerTitle}}
														@else
															{{trans('register.TAB_headerText_desc')}}
														@endif
													</div>
													<div id="editTileTxt" style="display: none;">
                                                    	<textarea id="textTitle" class="form-control" rows="2" placeholder="{{trans('register.headerText')}}">{{$headerTitle}}</textarea>
														<button id="btnSaveTitle" type="button" class="btn btn-default btn-xs pull-right " style="margin-top:5px;margin-bottom:5px;">
															Save
														</button>
													</div>
												</fieldset>
											</div>
											<div class="col-sm-12">
												<form id="imageLogo" method="post" enctype="multipart/form-data" action='{{Config::get('app.url')}}/member/ajaxupload'>
													<fieldset>
														<legend>
															{{trans('register.agree_head_Logo')}}:
														</legend>
														<div class="form-group">
															<input type="hidden" value="logoupload" name="page"/>
															<input type="file" id="logoFile" name="file" accept="image/*"/>
															<p class="help-block">
																{{trans('register.TAB_Your_your_logo_here')}}
															</p>
														</div>
													</fieldset>
												</form>
											</div>
											<div class="col-sm-12">
												<form id="imageBanner" method="post" enctype="multipart/form-data" action='{{Config::get('app.url')}}/member/ajaxupload'>
													<fieldset>
														<legend>
															{{trans('register.TAB_Your_banner_header')}}:
														</legend>
														<div class="form-group">
															<input type="hidden" value="bannerupload" name="page"/>
															<input type="file" id="bannerFile" name="file" accept="image/*"/>
															<p class="help-block">
																{{trans('register.TAB_Your_banner_upload')}}
															</p>
														</div>
													</fieldset>
												</form>
											</div>
											<div class="col-sm-12">
												<fieldset>
													<legend>
														{{trans('register.TAB_Layout_Color')}}:
													</legend>
                                                    <?php 
                                                        $userOption = json_decode($dataStore->sto_value);
                                                        $userLayout = @$userOption->layout;
                                                        $userFooter = @$userOption->footer_text;
                                                        $layoutOne = ($userLayout == Config::get('constants.LAYOUT.layout1'))? true :false;
                                                        $layoutTwo = ($userLayout == Config::get('constants.LAYOUT.layout2'))? true :false;
                                                        $layoutThree = ($userLayout == Config::get('constants.LAYOUT.layout3'))? true :false;
                                                    ?>
													<!--<a href="#" onclick="costomizeLayout();">Costumize layout</a>-->
													<div class="radio">
														<label>
                                                            {{Form::radio('costomizeLayout', Config::get('constants.LAYOUT.layout1'), $layoutOne, array('id'=>'optionsRadios1','class'=>'costomizeLayout'))}}
															{{trans('register.TAB_Layout_one')}}
														</label>
													</div>
													<div class="radio">
														<label>
                                                            {{Form::radio('costomizeLayout', Config::get('constants.LAYOUT.layout2'), $layoutTwo, array('id'=>'optionsRadios2','class'=>'costomizeLayout'))}}
															{{trans('register.TAB_Layout_two')}}
														</label>
													</div>
                                                    <div class="radio">
														<label>
                                                            {{Form::radio('costomizeLayout', Config::get('constants.LAYOUT.layout3'), $layoutThree, array('id'=>'optionsRadios3','class'=>'costomizeLayout'))}}
															{{trans('register.TAB_Layout_three')}}
														</label>
													</div>
												</fieldset>
											</div>
											<div class="col-sm-12">
												<fieldset>
													<legend>
														{{trans('register.TAB_Layout_footer')}}:
													</legend>
													<div id="foottxt" class="foottxt" onclick="edit_foot_txt();">
														@if($userFooter)
															{{$userFooter}}
														@else
															{{trans('register.TAB_Layout_footer_desc')}}
														@endif
													</div>
													<div id="editfootertxt" style="display: none;">
                                                    	<textarea id="textFooter" class="form-control" rows="2" placeholder="{{trans('register.TAB_Layout_footer_placeholder')}}">{{$userFooter}}</textarea>
														<button id="btnsaveFoot" type="button" class="btn btn-default btn-xs pull-right " style="margin-top:5px;margin-bottom:5px;">
															Save
														</button>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<!-- end MainMenu Tab -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end product detail-->
				<div class="clear">
				</div>
				</form>
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
@endif {{HTML::script('frontend/js/jquery.validate.js')}}
<script type='text/javascript'>
	
	
	
var is_modal_opened = 0;		
$(document).ready(function(){
    
    /*logo upload*/
    $('#logoFile').change(function(){
        $("#logo-preview").html('<img src="{{Config::get('app.url')}}frontend/images/upload_progress.gif" alt="Uploading...."/>');
    	$("#imageLogo").ajaxForm({
            success: function(data) {
                //console.log(data);
            var obj = JSON.parse(data);
                if (!obj.error) {
                    $('.message-success').show();
                    $('#logo-preview').html('<img src="{{Config::get('app.url')}}upload/store/' + obj.image + '" style="height:100px" class="img-thumbnail"/>');
                }
            }
        }).submit();
   	});
    
     /*banner upload*/
    $('#bannerFile').change(function(){
        $("#banner-preview").html('<img src="{{Config::get('app.url')}}frontend/images/upload_progress.gif" alt="Uploading...."/>');
    	$("#imageBanner").ajaxForm({
            success: function(data) {
                //console.log(data);
            var obj = JSON.parse(data);
                if (!obj.error) {
                    $('.message-success').show();
                    $('#banner-preview').html('<img src="{{Config::get('app.url')}}upload/store/' + obj.image + '" style="height:100px" class="img-thumbnail"/>');
                }
            }
        }).submit();
   	});  
        
    $('#agreement').click(function () {
        if($(this).is(":checked")) {
            $("#summit").removeAttr("disabled");
        } else {
            $("#summit").attr('disabled',true);
        }
    }); 
 
    $('#textFooter').blur(function () {
        var text = $( this ).val();
        $.ajax({
    		url: homePage + "member/getsubmenu?type=userLayoutFooter&id="+text,
    		type: "get",
    		success: function(data) {$('.message-success').show();}
        });
    });
     
 //textFooter  
 $('#btnSaveTitle').click(function () {
        var text = $('#textTitle').val();
        if(text) {
        	$.ajax({
        		url: homePage + "member/getsubmenu?type=userHeaderTitle&id="+text,
        		type: "get",
        		error: function (request, error) {
        	        
        	    },
        		success: function(data) {$('.message-success').show();
        		$('#foottxt').show().html(text);
        		$('#editfootertxt').hide();
        		}
            });
        }
    });
 	//btnSaveTitle 
    $('.costomizeLayout').click(function () {
        //alert(1111);
        if($(this).is(":checked")) {
            $('.message-success').show();
            var styles = $(this).val();
            $.ajax({
        		url: homePage + "member/getsubmenu?type=userLayout&id="+styles,
        		type: "get",
        		dataType: "json",
        		async: false,
        		success: function(data) {}
            });
            //$('.message-loading').hide();
            var userLayout = $( "link" ).hasClass( "user-layout" );
            if(userLayout) {
                $(".user-layout").attr("href", "{{Config::get('app.url')}}frontend/css/" + styles);
            } else {
                $( ".main-stylesheet" ).after( '<link class="user-layout" media="all" type="text/css" rel="stylesheet" href="{{Config::get('app.url')}}frontend/css/' + styles+'"/>' );
            }
            
            //
        } else {
            //$("#summit").attr('disabled',true);
        }
    });
    
       
    $("#PersonalForm").validate({
          rules: {
      FullName: {
         required : true
      }
    },
      messages:{
          FullName: {
            required : "This Full Name is required."
          }
      }
    });
    
    $( "#sortable" ).sortable({
        revert: true,
        update: function (event, ui) {
            var stringDiv = "";
            $('.message-success').show();
            $( this ).children().each(function(i) {
                var num = i + 1;
                var id = $(this).attr("id");
                $.ajax({
            		url: homePage + "member/getsubmenu?type=userPage&id="+id+"&order="+num,
            		type: "get",
            		dataType: "json",
            		async: false,
            		success: function(data) {}
                });
                //stringDiv += " "+li + '=' + i + '&';
            });
            //console.log(stringDiv);
        }
    });
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();

    
});
function costomizeLayout(){
    dynamicModal('loading');
    modalClose();
    
    $('#costomizeLayout').modal('show');
} 
function enableBox(id){
    var checks = $('.page-' + id).is(':checked');
    if (checks) {
        $('.message-success').show();
        $.ajax({
    		url: homePage + "member/getsubmenu?type=userPageStatus&id="+id+"&st=1",
    		type: "get",
    		success: function(data) {}
        });
        //$('.page-' + id).attr('checked','checked');
    } else {
        $('.message-success').show();
        $.ajax({
    		url: homePage + "member/getsubmenu?type=userPageStatus&id="+id+"&st=0",
    		type: "get",
    		success: function(data) {}
        });
        //$('.page-' + id).removeAttr('checked','checked');
    }
    //dynamicModal('loading');
    //modalClose();
    
    //$('#Enablebox').modal('show');
}
function costomizeFooter(){
    dynamicModal('loading');
    modalClose();
    
    $('#costomizeFooter').modal('show');
} 
function edit_foot_txt () {
	if ($('#foottxt').is(':visible')){
		$('#foottxt').hide();
		$('#editfootertxt').show();
	} 
}
function edit_title_txt () {
	if ($('#titleFxt').is(':visible')){
		$('#titleFxt').hide();
		$('#editTileTxt').show();
	} 
}
</script>
<div class="clear">
</div>
<!-- Modal costomize Layout -->
<div class="modal fade" id="costomizeLayout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Costomize Layout
				</h4>
			</div>
			<div class="modal-body">
				costomizeLayout
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Visiter Box -->
<div class="modal fade" id="Enablebox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Enable your Vistor box
				</h4>
			</div>
			<div class="modal-body">
				Enable your Vistor box
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Footer -->
<div class="modal fade" id="costomizeFooter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Costomize Footer
				</h4>
			</div>
			<div class="modal-body">
				Costomize Footer
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>
@endsection