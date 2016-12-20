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
@if(Session::get('currentUserAccountType') == 2)
<div class="memberlogin">
	{{Form::open(array('url'=>'member/userinfo/2/menu','enctype'=>'multipart/form-data','file' => true, 'id'=>'PersonalForm'))}}
	<div class="col-sm-3">
        @include('frontend.modules.member.layout.sidebar')
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<h2>
				{{trans('register.c_Your_are_registering')}}
				<span style="color:orange">
					{{trans('register.c_Your_As_Seller')}}
				</span>
			</h2>
			<div class="conent">
				@if (Session::get('MESSAGE_NOT_ENOUGH_DATA'))
				<div class="alert alert-danger fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
					<h4 id="oh-snap!-you-got-an-error!">
						{{trans('register.MESSAGE_header')}}
						<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a>
					</h4>
					<p>
						{{trans('register.'.Session::get('MESSAGE_NOT_ENOUGH_DATA'))}}
					</p>
				</div>
				@endif
				<!--<div class="alert alert-success fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
					<strong>
						{{trans('register.c_Your_are_registering')}}
					</strong>
					<span style="color: red;">
						{{trans('register.MESSAGE_b_a')}}
					</span>
					<strong>
						{{trans('register.MESSAGE_b_b')}}
					</strong>
					{{trans('register.MESSAGE_b_c')}}
					<span style="color: red;">
						{{trans('register.MESSAGE_b_d')}}
					</span>
				</div>-->
				<div class="category-tab shop-details-tab" style="margin: 0;">
					<!--category-tab-->
					<div class="tab-content">
						<div>
							{{Session::get('INVALID_LOGIN')}}
						</div>
						<div class="tab-pane fade active in" id="personal">
							<div class="col-sm-12">
								<div class="row" style="margin: 0;">
									<div role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs subtab" role="tablist">
											<li role="presentation" class="active">
												<a href="#MainMenu" aria-controls="MainMenu" role="tab" data-toggle="tab">{{trans('register.TAB_Main_Menu')}}</a>
											</li>
											<li role="presentation">
												<a href="#DefualtMenu" aria-controls="DefualtMenu" role="tab" data-toggle="tab">{{trans('register.TAB_Defualt_Menu')}}</a>
											</li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade active in" id="MainMenu" style="padding:0 10px 0 10px">
												<!--product describe-->
												<form action="{{Config::get('app.url')}}" id="StartCatAdd" class="form-horizontal">
													<div class="user-menu">
														<div class="col-sm-2">
															<div class="form-group">
																<label for="Main-Menu">
																	{{trans('register.TAB_Main_Menu')}}
																</label>
																<select class="form-control Main-Menu" name="MainMenu" id="Main-Menu">
																	<option value="">
																		{{trans('register.TAB_Select_one')}}
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
																	{{trans('register.TAB_Category')}}
																</label>
																<select class="form-control" id="Category" name="Category" disabled>
																</select>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="form-group">
																<label for="SubCategory">
																	{{trans('register.TAB_Sub_Category')}}
																</label>
																<select class="form-control" id="SubCategory" name="SubCategory" disabled>
																</select>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="form-group">
																<label for="SSubCategory">
																	{{trans('register.TAB_Sub_Sub_Category')}}
																</label>
																<select class="form-control" id="SSubCategory" name="SSubCategory" disabled>
																</select>
															</div>
														</div>
                                                        <div class="col-sm-1">
                                                            <label for="submitcat" style="display: block;">
																 <span>&nbsp;</span>
															</label>
    														<button id="submitcat" type="button" class="btn btn-default choosenuser" style="">
    															{{trans('register.TAB_Add')}}
    														</button>
                                                        </div>
													</div>
												</form>
												<div style="border-bottom: 1px solid #ccc; clear: both; display:block;padding-top:15px">
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
																	<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0">
																		{{trans('register.TAB_Content')}}
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
													<div class="pro-detail form-inline">
														<h3>
															{{trans('register.TAB_Your_Default_menu_you_have_chosen')}}
														</h3>
														<textarea id="nestable3-output" name="jsonCategory" style="display: none;">
														</textarea>
														<div class="dd" id="nestable3">
															{{$userCategory}}
														</div>
													</div>
												</div>
											</div>
											<!-- end MainMenu Tab -->
											<div role="tabpanel" class="tab-pane" id="DefualtMenu">
												<!--product describe-->
												<div>
													<div class="cmenuf">
														<div class="col-sm-6">
															<div class="form-group">
																<label for="Main-Menu">
																	{{trans('register.TAB_Position')}}
																</label>
																<select class="form-control Main-Menu" name="DMainMenu" id="DMain-Menu">
																	<option value="">
																		{{trans('register.TAB_Position')}}
																	</option>
																	<option value="1">
																		{{trans('register.TAB_Stay_on_Main_bar')}}
																	</option>
																	<option value="2">
																		{{trans('register.TAB_Stay_on_Sub_bar')}}
																	</option>
																</select>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="DCategory">
																	{{trans('register.TAB_Category')}}
																</label>
																<div style="clear: both;">
																</div>
																<select class="form-control" id="DCategory" name="DCategory" style="width: 78%;float:left;margin-right: 5px;">
																	<option value="">
																		{{trans('register.TAB_Select_one')}}
																	</option>
                                                                    @if($getMainPage)
    																	@foreach ($getMainPage as $pages)
    																	<option value="{{$pages->id}}">
    																		<?php echo $pages->
    																			{'title_'.app::getLocale()}; ?>
    																	</option>
    																	@endforeach
                                                                    @endif
																</select>
																<button id="addDefaultPage" type="button" class="btn btn-default choosenuser" style="width:18%">
																	{{trans('register.TAB_Add')}}
																</button>
															</div>
														</div>
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
																		{{trans('register.TAB_Your_Site_page_Preview')}}
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
																		{{trans('register.TAB_Left')}}
																	</div>
																</div>
																<div class="col-sm-6">
																	<div style="border: 1px solid #ccc;display:block;margin: 10px 0 0 0">
																		{{trans('register.TAB_Content')}}
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
													<div class="pro-detail form-inline">
														<h3>
															{{trans('register.TAB_Your_menu_category_you_have_chosen')}}
														</h3>
														<div class="form-inline">
															<div id="Dresult">
                                                                @if($getUserPages)
    																@foreach ($getUserPages as $userPages)
    																<div class="row input_fields_wrap subCatAjax" style="margin-bottom:5px">
    																	<div id="Did_{{$userPages->position}}" name="DCategory" class="form-group" style="margin-right:5px">
    																		<input type="text" value="{{$userPages->position}}" class="form-control id_{{$userPages->position}}" id="DCategoryAjaxAdd1" readonly="">
    																	</div>
    																	<div id="Did_{{$userPages->position}}" name="DCategory" class="form-group" style="margin-right:5px">
    																		<input type="text" value="{{$userPages->m_page_id}}" class="form-control" id="Dsub_{{$userPages->m_page_id}}" readonly="">
    																	</div>
    																	<button type="button" class="btn btn-danger DremoveMainCat" dataid="{{$userPages->id}}">
    																		<i class="glyphicon glyphicon-remove">
    																		</i>
    																	</button>
    																</div>
    																@endforeach
                                                                @endif
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
				<!--
<input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnStepNext" value="{{trans('register.BTN_SAVE')}}"/>
-->
				{{Form::close()}}
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
@else
<div class="memberlogin">
	<div class="col-sm-12">
        Sorry you have no permission for this page
    </div>
</div>
@endif
<div class="clear">
</div>
@endsection