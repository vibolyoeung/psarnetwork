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
	<div class="col-sm-3">
		@include('frontend.modules.member.layout.sidebar-setting')
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<h2>
				{{trans('register.gen_Summary_All')}}
			</h2>
			<div class="conent">
				<form action="" id="PersonalForm" class="form-horizontal" method="post">
								<div class="col-sm-12">
									<div class="row">
										<!--product describe-->
										<div class="col-sm-4">
											<div class="pro-detail">
												<div class="alert alert-info" role="alert">
                                                    {{trans('register.gen_User_Profile')}}
                                                </div>
                                                <div class="form-group">
                        							<label for="YourName" class="col-sm-4 control-label">
                        								{{trans('register.Input_Your_Name_Label')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="text" id="YourName" class="form-control" value="{{$userData->name}}" readonly/>
                                                    </div>
                        						</div>
                                                
                                                <div class="form-group">
                        							<label for="email" class="col-sm-4 control-label">
                        								{{trans('register.Input_Email')}}
                        							</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="email" class="form-control" value="{{$userData->email}}" readonly/>
                									</div>
                        						</div>
                                                
                                                <div class="form-group">
                									<label for="telephone" class="col-sm-4 control-label">
                										{{trans('register.Input_Phone_Number')}}
                									</label>
                									<div class="col-sm-8">
                                                        <input type="text" id="telephone" class="form-control" value="{{$userData->telephone}}" readonly/>
                									</div>
                								</div>
                								<div class="form-group" id="marketType">
                									<label for="Market_Type" class="col-sm-4 control-label">
                										{{trans('register.Input_Location')}}
                									</label>
                									<div class="col-sm-8">
                                                        <?php $userAddress = json_decode($userData->address);
                                                        if(!empty($userAddress->province)) {
                                                            $userAddr = $userAddress->province;
                                                        } else {
                                                            $userAddr = '';
                                                        }
                                                        ?>
                                                        <input type="text" id="telephone" class="form-control" value="{{$userAddr}}" readonly/>
                									</div>
                								</div>
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-4">
                                            <div class="alert alert-info" role="alert">
                                                {{trans('register.gen_Registration_Information')}}
                                            </div>
											<div class="form-group">
            									<label for="telephone" class="col-sm-4 control-label">
            										{{trans('register.gen_Registration_Date')}}
            									</label>
            									<div class="col-sm-8">
                                                    <input type="text" id="telephone" class="form-control" value="{{$userData->create_at}}" readonly/>
            									</div>
            								</div>
                                            <div class="form-group">
            									<label for="telephone" class="col-sm-4 control-label">
            										{{trans('register.gen_Account_Type')}}
            									</label>
            									<div class="col-sm-8">
                                                    @if(Session::get('currentUserAccountType') == 1)
                                                        <input type="text" id="telephone" class="form-control" value="{{trans('register.Free_Account')}}" readonly/>
                                                    @else
                                                        <input type="text" id="telephone" class="form-control" value="{{trans('register.Interprise_Account')}}" readonly/>
                                                    @endif
                                                    
            									</div>
            								</div>
                                            <div class="form-group">
            									<label for="telephone" class="col-sm-4 control-label">
            										{{trans('register.gen_Account_Role')}}
            									</label>
            									<div class="col-sm-8">
                                                    <?php
                                                        $roleSelectd = !empty($userData->account_role) ? $userData->account_role : '';
                                                        $RolArr = array(''=>trans('register.Manufaturure_label'));
                                                         foreach($accountRole as $Rol) {
                                                            $RolArr[$Rol->rol_id] = $Rol->rol_name;
                                                        }
                                                    ?>
                                                    {{Form::select('accountRole', $RolArr, $roleSelectd,array('class' => 'form-control disabled'))}}
            									</div>
            								</div>
                                            <div class="form-group">
            									<label for="WhoAreYou" class="col-sm-4 control-label">
            										{{trans('register.Your_Business_Site')}}
            									</label>
            									<div class="col-sm-8">
                                                    <?php
                                                    $clientSelectd = !empty($userData->client_type) ? $userData->client_type : '';
                                                    $cTypeArr = array(''=>trans('register.Manufaturure_select'));
                                                     foreach($clientType as $cType) {
                                                        $cTypeArr[$cType->id] = $cType->name;
                                                    }
                                                    ?>
                                                    {{Form::select('client_type', $cTypeArr, $clientSelectd,array('class' => 'form-control','id'=>'clientType'))}}
            									</div>
            								</div>
                                            <div class="form-group" id="marketType">
            									<label for="Market_Type" class="col-sm-4 control-label">
            										{{trans('register.gen_Category_Business')}}
            									</label>
            									<div class="col-sm-8">
                                                    <input type="text" id="telephone" class="form-control" value="{{$userCategory->name_en}}" readonly/>
            									</div>
            								</div>
										</div>
                                        <!--end product describe-->
										<div class="col-sm-4">
                                            <div class="alert alert-info" role="alert">
                                                {{trans('register.gen_Page_Information')}}
                                            </div>
											<div class="form-group">
                    							<label for="email" class="col-sm-4 control-label">
                    								{{trans('register.gen_Total_Products')}}
                    							</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email" class="form-control" value="{{$ProductsCount}}" readonly/>
            									</div>
                    						</div>
                                            <div class="form-group">
                    							<label for="email" class="col-sm-4 control-label">
                    								{{trans('register.gen_Total_Banner')}}
                    							</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email" class="form-control" value="150" readonly/>
            									</div>
                    						</div>
                                            <div class="form-group">
                    							<label for="email" class="col-sm-4 control-label">
                    								{{trans('register.gen_AdsTotal_Banner')}}
                    							</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email" class="form-control" value="110" readonly/>
            									</div>
                    						</div>
                                            <div class="form-group">
                    							<label for="email" class="col-sm-4 control-label">
                    								{{trans('register.gen_Total_User')}}
                    							</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email" class="form-control" value="110" readonly/>
            									</div>
                    						</div>
                                            <div class="form-group">
                    							<label for="email" class="col-sm-4 control-label">
                    								{{trans('register.gen_Total_Log')}}
                    							</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email" class="form-control" value="100" readonly/>
            									</div>
                    						</div>
                                            <div class="form-group">
                    							<label for="email" class="col-sm-4 control-label">
                    								{{trans('register.gen_Last_Login')}}
                    							</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="email" class="form-control" value="19-5-2015" readonly/>
            									</div>
                    						</div>
										</div>

						</div>
					</div>
					<!--end product detail-->
                    <div class="clear"></div>
                    <input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnInfo" value="{{trans('register.BTN_SAVE')}}"/>
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
    $("#clientType").change(function()
        {
            var id = $(this).val();
            var cName = $('option:selected', this).text();
            if(id == {{Config::get('constants.CLIENT_TYPE_ID.INDIVIDUAL')}} || id == {{Config::get('constants.CLIENT_TYPE_ID.HOMESHOP')}}) {
                $('#marketType').hide();
                $('.ghide').show();
                //$('#Location').hide();
                loadMap();
            } else {
                $('#marketType').show();
                $('#mapWrapper').html('');
                $('.ghide').hide();
                if(id) {
                   if(id != {{Config::get('constants.CLIENT_TYPE_ID.INDIVIDUAL')}} || id != {{Config::get('constants.CLIENT_TYPE_ID.HOMESHOP')}}) {
                        $('#loadingmarketType').show();
                        $('#marketTypes').hide();
                        $.ajax
                        ({
                            type: "get",
                            url: "{{Config::get('app.url')}}member/getmarkettype/"+id,
                            cache: false,
                            success: function(html)
                            {
                                console.log(html);
                                var selects = '<option value="">{{trans('register.Market_Type')}}</option>';
                                $("#marketTypes").html(selects + html).removeAttr("disabled");
                                $('#loadingmarketType').hide();
                                $('#marketTypes').show();
                            }
                        });
                   } 
                }
            }
            //var dataString = 'pro_id=' + id;
            //var gid = $('option:selected', this).attr('data-lat');
            //$('#loading').show();
            //$('#District').hide();
    });
});
</script>
<div class="clear"></div>
@endsection