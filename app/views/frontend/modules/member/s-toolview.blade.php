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
		@include('frontend.modules.member.layout.sidebar-setting')
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<h2>
				{{trans('register.tool_vivew')}}
			</h2>
			<div class="conent">
				<form action="" id="PersonalForm" class="form-horizontal" method="post">
					<div class="category-tab shop-details-tab" style="margin: 0;">
						<!--category-tab-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="personal">
								<div class="col-sm-12">
									<div class="row">
										<!--product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
                                            @if(count($toolView)>0)
                                                @foreach($toolView as $tool)
												<div class="checkbox">
													<label>
                                                    <?php $checks = ($tool->status==1)? true : false;?>
                                                        {{Form::checkbox('tooview[]', $tool->id, $checks)}}
                                                        {{$tool->title}}
													</label>
												</div>
                                                @endforeach
                                            @endif
                                                <!--
<div class="checkbox">
													<label>
                                                        {{Form::checkbox('status_box', 'value', false)}}
                                                        {{trans('register.tool_status_box')}}
													</label>
												</div>
                                                
                                                <div class="checkbox">
													<label>
                                                        {{Form::checkbox('facebook_box', 'value', false)}}
                                                        {{trans('register.tool_facebook_box')}}
													</label>
												</div>
                                                
                                                <div class="checkbox">
													<label>
                                                        {{Form::checkbox('category_limit', 'value', false)}}
                                                        {{trans('register.tool_category_limit')}}
													</label>
												</div>
-->
                                                                                                
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
												<div id="mapWrapper" style="">
													<div id="gmap" style="width: 100%; height: 375px">
													</div>
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
					<input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnInfo" value="{{trans('register.BTN_SAVE')}}"/>
				</form>
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
<div class="clear">
</div>
@endsection