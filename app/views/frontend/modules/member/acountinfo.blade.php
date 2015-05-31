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
				Account Information
			</h2>
			<div class="conent">
				<form action="" id="PersonalForm" class="form-horizontal" method="post">
					<div class="category-tab shop-details-tab" style="margin: 0;">
						<!--category-tab-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="personal">
								<div class="col-sm-12">
											<div class="pro-detail">
												<h3>
													Your Page Information
												</h3>
                                                <div class="form-group">
                        							<label for="YourName" class="col-sm-4 control-label">
                        								{{trans('register.acc_Current_Acount')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<div class="radio">
                                                          <label>
                                                            @if(Session::get('currentUserAccountType') == 1)
                                                                {{trans('register.Free_Account')}}
                                                            @else
                                                                {{trans('register.Interprise_Account')}}
                                                            @endif
                                                          </label>
                                                        </div>
                                                    </div>
                        						</div>
                                                <div class="alert alert-info" role="alert">
                                                    <p>
                                                         @if(Session::get('currentUserAccountType') == 1)
                                                            {{trans('register.Free_Account_desc')}}
                                                        @else
                                                            {{trans('register.Interprise_Account_desc')}}
                                                        @endif
                                                    </p>
                                                </div>
                                                <hr />
                                                
                                                <div class="form-group">
                        							<label for="YourName" class="col-sm-4 control-label">
                        								{{trans('register.acc_I_want_to')}}
                        							</label>
                                                    <div class="col-sm-8">
                                                        <?php
                                                        $roleSelectd = !empty($userData->account_role) ? $userData->account_role : '';
                                                        $RolArr = array(''=>trans('register.Manufaturure_label'));
                                                         foreach($accountRole as $Rol) {
                                                            $RolArr[$Rol->rol_id] = $Rol->rol_name;
                                                        }
                                                        ?>
                                                        {{Form::select('accountRole', $RolArr, $roleSelectd,array('class' => 'form-control'))}}
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
                										{{trans('register.Market_Type')}}
                									</label>
                									<div class="col-sm-8">
                                                        <?php
                                                        $marketTypeSelected = !is_null($dataStore->sup_id) ? $dataStore->sup_id : '';
                                                        $mkArr = array(''=>trans('register.Market_Type'));
                                                         foreach($markets as $mk) {
                                                            $mkArr[$mk->id] = $mk->title_en;
                                                        }
                                                        ?>
                                                        @if($marketTypeSelected)
                                                        {{Form::select('marketType', $mkArr, $marketTypeSelected,array('class' => 'form-control','id'=>'marketTypes'))}}
                                                        @endif
                                                        <div 
                                                        id="loadingmarketType" 
                                                        style="display: none;background:#fff;width:100%;text-align:center;padding:2px;border:1px solid #eee;">
                                                        <img style="width: 30px;" src="{{Config::get('app.url')}}frontend/images/upload_progress.gif"/>
                                                        </div>
                									</div>
                								</div>
										<!--end product describe-->
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