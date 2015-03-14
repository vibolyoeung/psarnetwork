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
<script type='text/javascript'>
var homePage = "{{Config::get('app.url')}}";
</script>
<div class="memberlogin">
    {{Form::open(array('url'=>'member/userinfo/2/menu','enctype'=>'multipart/form-data','file' => true, 'id'=>'PersonalForm'))}}
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
																</select>
															</div>
														</div>
                                                        <div class="col-sm-3">
    														<div class="form-group">
    															<label for="SubCategory">
    																Sub Category
    															</label>
    																<select class="form-control" id="SubCategory" name="SubCategory" disabled>
    																</select>
    														</div>
														</div>
                                                        <div class="col-sm-3">
    														<div class="form-group">
    															<label for="SSubCategory">
    																Sub Category
    															</label>
    																<select class="form-control" id="SSubCategory" name="SSubCategory" disabled>
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
														<textarea id="nestable3-output" name="jsonCategory" style="display: none;"></textarea>
														<div class="dd" id="nestable3">
                                                            {{$userCategory}}
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
																		Select one
																	</option>
																	@foreach ($getMainPage as $pages)
                                                                    <option value="{{$pages->id}}">
                                                                        <?php 
                                                                        echo app::getLocale();
                                                                            //echo $pages->{'title_'.Session::get('lang')};
                                                                        ?>
                                                                        
                                                                    </option>
                                                                    @endforeach
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
				<input id="summit" type="submit"  class="btn btn-default pull-right choosenuser" name="btnStepNext" value="Next"/>
				<a id="chooseuser" class="btn btn-warning pull-right choosenuser" href="#">Back</a>
				<a id="chooseuser" class="btn btn-danger pull-right choosenuser" href="#">Cancel</a>
				{{Form::close()}}
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
{{HTML::script('frontend/js/jquery.validate.js')}} {{HTML::script('frontend/js/Nestable-master/jquery.nestable.js')}} {{HTML::style('frontend/css/nestble.css')}}

{{HTML::script('frontend/js/member/functions.js')}}
<div class="clear">
</div>
@endsection