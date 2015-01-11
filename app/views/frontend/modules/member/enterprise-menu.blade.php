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
									<div class="row">
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
												<div role="tabpanel" class="tab-pane fade active in" id="MainMenu">
													<!--product describe-->
                                                    <form action="{{Config::get('app.url')}}" id="StartCatAdd" class="form-horizontal">
                                                    <div class="form-inline cmenuf">
													<div class="form-group">
														<label for="Main-Menu" class="col-sm-6 control-label">
															Main Menu
														</label>
														<div class="col-sm-6">
															<select class="form-control Main-Menu" name="MainMenu" id="Main-Menu">
                                                              <option value="">Main Menu</option>
                                                              <option value="Electric">Electric</option>
                                                            </select>
														</div>
													</div>
                                                    <div class="form-group">
														<label for="Category" class="col-sm-6 control-label">
															Category
														</label>
														<div class="col-sm-6">
															<select class="form-control" id="Category" name="Category">
                                                              <option value="">Category</option>
                                                              <option value="Phone">Phone</option>
                                                              <option value="Tablet">Tablet</option>
                                                            </select>
														</div>
													</div>
                                                    <div class="form-group">
														<label for="SubCategory" class="col-sm-6 control-label">
															Sub Category
														</label>
														<div class="col-sm-6">
															<select class="form-control" id="SubCategory" name="SubCategory">
                                                              <option value="">Sub Category</option>
                                                              <option value="Samsung">Samsung</option>
                                                              <option value="Iphone">Iphone</option>
                                                            </select>
														</div>
													</div>
													<button id="submitcat" type="buttom" class="btn btn-default" style="margin-left: 30px;" onclick="StartAddCat();this.form.submit();">
														Add
													</button>
												</div>
                                                </form>
                                                <div style="border-top: 1px solid #ccc; clear: both; display:block;margin-top:15px"></div>
												<!-- create menu -->
                                                <form action="{{Config::get('app.url')}}" id="PersonalForm">
													<div class="col-sm-6 hidden-sm" style="border-right: 1px solid #ccc;">
														<div class="pro-detail">
															<div class="col-sm-12" id="sitePreview">
                                                                <div class="row" style="margin: 0;">
                                                                    <div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;display:block">
                                                                        <h3>Your Site page Preview</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="margin: 10px 0 0 0;">
                                                                    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin:0">
                                                                        <div id="navbar" class="navbar-collapse collapse">
                                                                          <ul class="nav navbar-nav" id="menu_results" style="margin:0">
                                                                            <li class="active"><a href="javascript:;">Home</a></li>
                                                                          </ul>
                                                                        </div><!--/.nav-collapse -->
                                                                    </nav>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;">Left</div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0">Content</div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0;">Right</div>
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
															<div id="result"></div>
														</div>
													</div>
												</div>
												<div role="tabpanel" class="tab-pane" id="DefualtMenu">
													222222222222222
												</div>
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
{{HTML::script('frontend/js/jquery.validate.js')}}
<script type='text/javascript'>	
$(document).ready(function(){
    $('#agreement').click(function () {
        if($(this).is(":checked")) {
            $("#summit").removeAttr("disabled");
        } else {
            $("#summit").attr('disabled',true);
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
    
    $("#StartCatAdd").submit(function(event) {

        /* Stop form from submitting normally */
        event.preventDefault();
    
        /* Clear result div*/
        //$("#result").html('');
    
        /* Get some values from elements on the page: */
        var values = $(this).serialize();
    
        /* Send the data using post and put the results in a div */
        $.ajax({
            url: "{{Config::get('app.url')}}/member/addmenuajax",
            type: "post",
            data: values,
            success: function(datas){
                //alert("success");
                var msg = $.parseJSON(datas);
                var MainMenu = msg.MainMenu;
                var Category = msg.Category;
                var SubCategory = msg.SubCategory;
                var duplicate = [];
				$('#CategoryAjaxAdd'+Category).each(function () {
					if ($('#CategoryAjaxAdd'+Category).val() == Category) {
						duplicate.push(Category);
					}
				});
                var SubDuplicate = [];
				$('#sub_'+Category+SubCategory).each(function () {
					if ($('#sub_'+Category+SubCategory).val() == SubCategory) {
						SubDuplicate.push(Category+SubCategory);
					}
				});
                
                
                if (!duplicate[0]) {
                    var cate = '<div><div class="row input_fields_wrap subCatAjax"><div class="col-md-12"><button type="button" class="btn btn-danger removeMainCat  pull-right" dataid="'+Category+'"><i class="glyphicon glyphicon-remove"></i></button>'+
                                                                '<div id="id_'+Category+'" name="Category">'+
                                                                '<input  style="max-width:80%;margin-right:5px" type="text" value="'+Category+'" class="form-control id_'+Category+'" id="CategoryAjaxAdd'+Category+'" readonly=""/>'+
                                                                '</div>'+
                                                              '</div></div>';
                    var sub_cate = '<div class="row input_fields_wrap subCatAjax"><div class="col-md-12"><button type="button" class="btn btn-danger remove_field  pull-right" id="removeCat" dataid="'+Category+SubCategory+'" onclick="removes();"><i class="glyphicon glyphicon-trash"></i></button>'+
                                                                '<div id="id_'+Category+'" name="Category">'+
                                                                '<input style="max-width:100px;margin-right:5px" type="text" value="'+SubCategory+'" class="form-control  pull-right" id="sub_'+Category+SubCategory+'" readonly=""/>'+
                                                                '</div>'+
                                                              '</div></div><div id="sub_result'+Category+'"></div></div>';                                          
                    $("#result").append(cate+sub_cate); 
                    /*preview site menu*/
                    var addToMenu = '<li class="dropdown" id="m_r'+Category+'">'+
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'+Category+' <span class="caret"></span></a>'+
                    '<ul class="dropdown-menu" role="menu" id="menuAddsub'+Category+'">'+
                    '<li id="ms_r'+Category+SubCategory+'"><a href="javascript:;">'+SubCategory+'</a></li>'+
                    '</ul>'+
                    '</li>';
                    $('#menu_results').append(addToMenu);
                } else{
                    if (!SubDuplicate[0]) {
                        var content = '<div class="row input_fields_wrap subCatAjax"><div class="col-md-12"><button type="button" class="btn btn-danger remove_field  pull-right" id="removeCat" dataid="'+Category+SubCategory+'" onclick="removes();"><i class="glyphicon glyphicon-trash"></i></button>'+
                                                                '<div id="id_'+Category+'" name="Category">'+
                                                                '<input style="max-width:100px;margin-right:5px" type="text" value="'+SubCategory+'" class="form-control  pull-right" id="sub_'+Category+SubCategory+'" readonly=""/>'+
                                                                '</div>'+
                                                              '</div></div>';
                    $('#sub_result'+Category).append(content); 
                    var addToMenus = '<li id="ms_r'+Category+SubCategory+'"><a href="javascript:;">'+SubCategory+'</a></li>';
                    $('#menuAddsub'+Category).append(addToMenus);
                    } else {
                        alert('This sub is arealy added!');
                    }
                }
                
            },
            error:function(){
                alert("failure");
                $("#result").html('There is error while submit');
            }
        });
    });


});
// dataid="'+Category+SubCategory+'"
$(document).on('click','.remove_field',function() {
 	$(this).parent('div').parent('div').remove();
    var remove_mSId = $(this).attr('dataid');
    $('#ms_r'+remove_mSId).remove();
});
$(document).on('click','.removeMainCat',function() {
    if (confirm("Do you want to delete all in this category!") == true) {
        var removeId = $(this).attr('dataid');
        $('#m_r'+removeId).remove();
     	$(this).parent('div').parent('div').parent('div').remove();
    }

});
</script>
<div class="clear">
</div>
@endsection