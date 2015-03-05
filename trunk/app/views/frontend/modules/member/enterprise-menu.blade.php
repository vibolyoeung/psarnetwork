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
<div class="memberlogin">
	<div class="col-sm-3">
		<div class="advertise">
			<div class="col-sm-12">
				<img src="{{Config::get('app.url')}}/upload/banner/banner728.png" alt="" style="width:100%" />
			</div>
			<div class="clear">
			</div>
		</div>
		<div class="constug">
			<center>
				<img src="{{Config::get('app.url')}}/frontend/images/member/strug.png" style="width: 100%"/>
			</center>
		</div>
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<h2>
				Your are registering
				<span style="color:orange">
					As Seller
				</span>
			</h2>
			<div class="conent">
				<div class="alert alert-success fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
					<strong>
						You Are Registering As
					</strong>
					<span style="color: red;">
						Interprise Seller , Type
					</span>
					<strong>
						Super Market.
					</strong>
					This Account will be free only for 3 months for your page site control.
					<span style="color: red;">
						Contact !
					</span>
				</div>
				<div class="category-tab shop-details-tab" style="margin: 0;">
					<!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li>
								<a>Persional Info</a>
							</li>
							<li class="active">
								<a href="javascript:;">Menu</a>
							</li>
							<li>
								<a href="javascript:;">Content Page</a>
							</li>
							<li>
								<a href="javascript:;">Your Page info</a>
							</li>
							<li>
								<a href="javascript:;">Add Connector</a>
							</li>
							<li>
								<a href="javascript:;">Finish</a>
							</li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="personal">
							<div class="col-sm-12">
								<div class="row" style="margin: 0;">
									<div role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs subtab" role="tablist">
											<li role="presentation" class="active">
												<a href="#MainMenu" aria-controls="MainMenu" role="tab" data-toggle="tab">Main  Menu</a>
											</li>
											<li role="presentation">
												<a href="#DefualtMenu" aria-controls="DefualtMenu" role="tab" data-toggle="tab">Defualt  Menu</a>
											</li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade active in" id="MainMenu"  style="padding:0 10px 0 10px">
												<!--product describe-->
												<form action="{{Config::get('app.url')}}" id="StartCatAdd" class="form-horizontal">
													<div class="user-menu">
														<div class="col-sm-3">
															<div class="form-group">
																<label for="Main-Menu">
																	Main Menu
																</label>
																<select class="form-control Main-Menu" name="MainMenu" id="Main-Menu">
																	<option value="">
																		Select one
																	</option>
																	<?php $subcategoriesobj=new MCategory(); $sub=$subcategoriesobj->
																		getSubCategories(0); if(count($sub) > 0){ foreach ($sub as $row){ echo '
																		<option value="'.$row->id.'">
																			'.$row->{'name_en'}.'
																		</option>
																		'; } } ?>
																</select>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="form-group">
																<label for="Category">
																	Category
																</label>
																<select class="form-control" id="Category" name="Category" disabled>
																	<option value="">
																		Category
																	</option>
																	<option value="Phone">
																		Phone
																	</option>
																	<option value="Tablet">
																		Tablet
																	</option>
																</select>
															</div>
														</div>
                                                        <div class="col-sm-3">
    														<div class="form-group">
    															<label for="SubCategory">
    																Sub Category
    															</label>
    																<select class="form-control" id="SubCategory" name="SubCategory" disabled>
    																	<option value="">
    																		Sub Category
    																	</option>
    																	<option value="Samsung">
    																		Samsung
    																	</option>
    																	<option value="Iphone">
    																		Iphone
    																	</option>
    																</select>
    														</div>
														</div>
                                                        <div class="col-sm-3">
    														<div class="form-group">
    															<label for="SSubCategory">
    																Sub Category
    															</label>
    																<select class="form-control" id="SSubCategory" name="SSubCategory" disabled>
    																	<option value="">
    																		Sub Category
    																	</option>
    																	<option value="Samsung">
    																		Samsung
    																	</option>
    																	<option value="Iphone">
    																		Iphone
    																	</option>
    																</select>
    														</div>
														</div>
														<button id="submitcat" type="button" class="btn btn-default" style="margin-left: 30px;">
															Add
														</button>
													</div>
												</form>
												<div style="border-top: 1px solid #ccc; clear: both; display:block;margin-top:15px">
												</div>
												<!-- create menu -->
												<div class="col-sm-6 hidden-sm" style="border-right: 1px solid #ccc;">
													<div class="pro-detail">
														<div class="col-sm-12" id="sitePreview">
															<div class="row" style="margin: 0;">
																<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;display:block">
																	<h3>
																		Your Site page Preview
																	</h3>
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
																		Left
																	</div>
																</div>
																<div class="col-sm-6">
																	<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0">
																		Content
																	</div>
																</div>
																<div class="col-sm-3">
																	<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;">
																		Right
																	</div>
																</div>
															</div>
														</div>
														<!-- end site preview -->
													</div>
												</div>
												<!--end product describe-->
												<div class="col-sm-6">
													<div class="pro-detail form-inline">
														<h3>
															Your Default menu you have chosen
														</h3>
														<textarea id="nestable3-output">
														</textarea>
														<div class="dd" id="nestable3">
															<ol id="result" class="dd-list">
															</ol>
														</div>
													</div>
												</div>
											</div>
											<!-- end MainMenu Tab -->
											<div role="tabpanel" class="tab-pane" id="DefualtMenu">
												<!--product describe-->
												<div class="form-horizontal">
													<div class="form-inline cmenuf">
														<div class="form-group">
															<label for="Main-Menu" class="col-sm-6 control-label">
																Position
															</label>
															<div class="col-sm-6">
																<select class="form-control Main-Menu" name="DMainMenu" id="DMain-Menu">
																	<option value="">
																		Position
																	</option>
																	<option value="MainBar">
																		Stay on Main bar
																	</option>
																	<option value="SubBar">
																		Stay on Sub bar
																	</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label for="DCategory" class="col-sm-6 control-label">
																Category
															</label>
															<div class="col-sm-6">
																<select class="form-control" id="DCategory" name="DCategory">
																	<option value="">
																		Category
																	</option>
																	<option value="Announcement">
																		Announcement
																	</option>
																	<option value="Aboutus">
																		About us
																	</option>
																	<option value="Contactus">
																		Contact us
																	</option>
																	<option value="HotPromotion">
																		Hot Promotion
																	</option>
																	<option value="NewArrival">
																		New Arrival
																	</option>
																	<option value="Second Hand">
																		Second Hand
																	</option>
																</select>
															</div>
														</div>
														<button id="Dsubmitcat" type="buttom" class="btn btn-default" style="margin-left: 30px;" onclick="DStartAddCat();this.form.submit();">
															Add
														</button>
													</div>
												</div>
												<div style="border-top: 1px solid #ccc; clear: both; display:block;margin-top:15px">
												</div>
												<!-- create menu -->
												<form action="{{Config::get('app.url')}}" id="PersonalForm">
													<div class="col-sm-6 hidden-sm" style="border-right: 1px solid #ccc;">
														<div class="pro-detail">
															<div class="col-sm-12" id="sitePreview">
																<div class="row" style="margin: 0;">
																	<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;display:block">
																		<h3>
																			Your Site page Preview
																		</h3>
																	</div>
																</div>
																<div class="row" style="margin: 10px 0 0 0;">
																	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin:0">
																		<div id="navbar" class="navbar-collapse collapse">
																			<ul class="nav navbar-nav" id="Dmenu_results" style="margin:0">
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
																			Left
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0">
																			Content
																		</div>
																	</div>
																	<div class="col-sm-3">
																		<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;">
																			Right
																		</div>
																	</div>
																</div>
															</div>
															<!-- end site preview -->
														</div>
													</div>
													<!--end product describe-->
													<div class="col-sm-6">
														<div class="pro-detail form-inline">
															<h3>
																Your menu category you have chosen
															</h3>
															<div class="form-inline">
																<div id="Dresult">
																</div>
															</div>
														</div>
													</div>
											</div>
											<!-- end Defualt Page -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end product detail-->
				<div class="clear">
				</div>
				<button id="summit" type="submit" class="btn btn-default pull-right choosenuser">
					Next
				</button>
				<a id="chooseuser" class="btn btn-warning pull-right choosenuser" href="#">Back</a>
				<a id="chooseuser" class="btn btn-danger pull-right choosenuser" href="#">Cancel</a>
				</form>
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
{{HTML::script('frontend/js/jquery.validate.js')}} {{HTML::script('frontend/js/Nestable-master/jquery.nestable.js')}} {{HTML::style('frontend/css/nestble.css')}}
<script type='text/javascript'>
	
		
$(document).ready(function(){
    /**/
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    $('#nestable3').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable3').data('output', $('#nestable3-output')));
    
        
    $('#Main-Menu').change(function () {
        $("#Category").html('<option value="">Select one</option>').attr("disabled","selected");
        $("#SubCategory").html('<option value="">Select one</option>').attr("disabled","selected");
        var selected = $("#Main-Menu option:selected").val();
        if(selected) {
            /* Send the get using post and put the results in a div */
        $.ajax({
            url: "{{Config::get('app.url')}}/member/getsubmenu?id="+selected,
            type: "get",
            success: function(datas){
                $("#Category").html(datas).removeAttr("disabled","disabled");
            }
            });
        } else {
            alert('please select one');
        }
    });
    $('#Category').change(function () {
        var selectedG = $("#Category option:selected").val();
        if(selectedG) {
            $("#SubCategory").html('<option value="">Select one</option>').attr("disabled","selected");
        /* Send the data using get and put the results in a div */
        $.ajax({
            url: "{{Config::get('app.url')}}/member/getsubmenu?id="+selectedG,
            type: "get",
            success: function(datas){
                $("#SubCategory").html(datas).removeAttr("disabled","disabled");
            }
            });
        } else {
            alert('please select one');
        }
    });
    $('#SubCategory').change(function () {
        var selectedG = $("#SubCategory option:selected").val();
        if(selectedG) {
            $("#SSubCategory").html('<option value="">Select one</option>').attr("disabled","selected");
        /* Send the data using get and put the results in a div */
        $.ajax({
            url: "{{Config::get('app.url')}}/member/getsubmenu?id="+selectedG,
            type: "get",
            success: function(datas){
                $("#SSubCategory").html(datas).removeAttr("disabled","disabled");
            }
            });
        } else {
            alert('please select one');
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
 
 $('#submitcat').click(function () {
    //var selectedG = $("#Category option:selected").val();
    var mainMenu = $('#Main-Menu option:selected').val();
    var mainCategory = $('#Category option:selected').val();
    var mainCategoryText = $('#Category option:selected').text();
    var mainSubCategory = $('#SubCategory option:selected').val();
    var mainSubCategoryText = $('#SubCategory option:selected').text();
    
    var mainSubSubCategory = $('#SSubCategory option:selected').val();
    var mainSubSubCategoryText = $('#SSubCategory option:selected').text();
    
    /*check duplicatae Category data*/
    var Dduplicate = [];
	$('#result .dd-item').each(function () {
		if ($(this).attr('data-id') == mainCategory) {
		  Dduplicate.push(mainCategory);
		}
	});
    /*end check duplicatae Category data*/
    
     /*check duplicatae SubCategory data*/
    var Sduplicate = [];
	$('#result li.dd-item ol.dd-list .dd-item').each(function () {
		if ($(this).attr('data-id') == mainSubCategory) {
		  Sduplicate.push(mainSubCategory);
		}
	});
    /*end check duplicatae SubCategory data*/
 
      /*check duplicatae Sub SubCategory data*/
    var Subduplicate = [];
	$('#result li.dd-item ol.dd-list .dd-item').each(function () {
		if ($(this).attr('data-id') == mainSubCategory) {
		  Subduplicate.push(mainSubCategory);
		}
	});
    /*end check duplicatae sub SubCategory data*/      
    if(mainMenu && mainCategory) {
        if(mainCategory && !mainSubCategory) {
            var MlistMenu = '<li class="dd-item dd3-item" data-id="'+mainCategory+'" id="item-'+mainCategory+'">'+
                '<div class="dd-handle dd3-handle">Drag</div>'+
                '<div class="dd3-content item-'+mainCategory+'">'+mainCategoryText+'</div>'+
                '</li>';
           if (!Dduplicate[0]) {
                $('#result').append(MlistMenu);  
           }
        } else if (mainCategory && mainSubCategory){
            
            var FistList = '<li class="dd-item dd3-item" data-id="'+mainCategory+'" id="item-'+mainCategory+'">'+
                '<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-'+mainCategory+'">'+mainCategoryText+'</div>'+
                '<ol class="dd-list">'+
                    '<li class="dd-item dd3-item" data-id="'+mainSubCategory+'">'+
                        '<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-'+mainSubCategory+'">'+mainSubCategoryText+'</div>'+
                    '</li>'+
                '</ol>';
            var listMenu = '<li class="dd-item dd3-item" data-id="'+mainSubCategory+'" id="item-'+mainSubCategory+'">'+
                '<div class="dd-handle dd3-handle">Drag</div>'+
                '<div class="dd3-content">'+mainSubCategoryText+'</div>'+
                '</li>';
            var addChild = '<ol class="dd-list">'+
                    '<li class="dd-item dd3-item" data-id="'+mainSubCategory+'" id="item-'+mainSubCategory+'">'+
                        '<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-'+mainSubCategory+'">'+mainSubCategoryText+'</div>'+
                    '</li>'+
                '</ol>';
        }
        if (!Dduplicate[0]) {
            $('#result').append(FistList);
        } else if (Dduplicate[0] && !Sduplicate[0]) {
            var countListExist = $('#result #item-' + Dduplicate[0] + ' .dd-item').length;
            if(countListExist>0) {
                $('#result #item-' + Dduplicate[0] + ' .dd-list').append(listMenu);
            } else {
                $(addChild).insertAfter('#result #item-' + Dduplicate[0] + ' .item-' + Dduplicate[0]);
            }
        } else {
            if (!Sduplicate[0]) {
                $('#result .dd-item ol.dd-list').append(listMenu);
            }
        }
        updateOutput($('#nestable3').data('output', $('#nestable3-output')));
    }
 });   


    /*Default Menu*/
    $('#Dsubmitcat').click(function () {
        var mposition = $('#DMain-Menu').val();
        var mDCategory = $('#DCategory').val();
        var Dduplicate = [];
		$('#DCategoryAjaxAdd'+mposition).each(function () {
			if ($('#DCategoryAjaxAdd'+mposition).val() == mposition) {
				Dduplicate.push(mposition);
			}
		});
         var DSubDuplicate = [];
		$('#Dsub_'+mposition+mDCategory).each(function () {
			if ($('#Dsub_'+mposition+mDCategory).val() == mDCategory) {
				DSubDuplicate.push(mposition+mDCategory);
			}
		});        
        if(mDCategory && mposition) {
            if(!DSubDuplicate[0]) {
                var Mpost = '<div class="row input_fields_wrap subCatAjax" style="margin-bottom:5px">'+
                                                                '<div id="Did_'+mposition+'" name="DCategory" class="form-group" style="margin-right:5px">'+
                                                                '<input type="text" value="'+mposition+'" class="form-control id_'+mposition+'" id="DCategoryAjaxAdd'+mposition+'" readonly=""/>'+
                                                                '</div>'+
                                                                '<div id="Did_'+mposition+'" name="DCategory" class="form-group" style="margin-right:5px">'+
                                                                '<input type="text" value="'+mDCategory+'" class="form-control" id="Dsub_'+mposition+mDCategory+'" readonly=""/>'+
                                                                '</div><button type="button" class="btn btn-danger DremoveMainCat" dataid="'+mposition+mDCategory+'"><i class="glyphicon glyphicon-remove"></i></button>'+
                                                              '</div>';                                         
                    $("#Dresult").append(Mpost); 
                    //$("#Dmenu_results").append(Mpost);
                    var DaddToMenus = '<li id="msrM'+mposition+mDCategory+'"><a href="javascript:;">'+mDCategory+'</a></li>';
                    if(mposition =='MainBar') {
                        $('#menu_results').append(DaddToMenus);
                        $('#DefualtMenu #Dmenu_results').append(DaddToMenus);
                    } else if (mposition =='SubBar') {
                        $("#Dmenu_results_a").append(DaddToMenus);
                        $('#DefualtMenu #Dmenu_results_a').append(DaddToMenus);
                    }
                    
                    
            } else {
                alert('is alread added!');
            }
        }
    });

});
// dataid="'+Category+SubCategory+'"
$(document).on('click','.remove_field',function() {
 	$(this).parent('div').parent('div').remove();
    var remove_mSId = $(this).attr('dataid');
    $('#ms_r'+remove_mSId).remove();
    $('#DefualtMenu #ms_r'+remove_mSId).remove();
});
$(document).on('click','.removeMainCat',function() {
    if (confirm("Do you want to delete all in this category!") == true) {
        var removeId = $(this).attr('dataid');
        $('#m_r'+removeId).remove();
        $('#DefualtMenu #m_r'+removeId).remove();
     	$(this).parent('div').parent('div').parent('div').remove();
    }

});
$(document).on('click','.DremoveMainCat',function() {
        var removeId = $(this).attr('dataid');
        $('#Dm_r'+removeId).remove();
        $('#DefualtMenu #Dm_r'+removeId).remove();
        $('#MainMenu #msrM'+removeId).remove();
        $('#DefualtMenu #msrM'+removeId).remove();
     	$(this).parent('div').remove();
});

</script>
<div class="clear">
</div>
@endsection