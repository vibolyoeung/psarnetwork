@extends('frontend.nosidebar') @section('title') Register Page @endsection @section('breadcrumb')
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
{{HTML::script("frontend/js/postscribe-master/postscribe.js")}}
{{HTML::script("frontend/js/postscribe-master/htmlParser/htmlParser.js")}}
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
{{HTML::script('frontend/js/map.js')}}
<div class="home" id="loadmaps">
	<div class="rigister">
		<div class="col-sm-8">
			<div class="r-menu">
				<span class="r-menu-text">
					{{trans('register.Try_It_Today')}} .....
				</span>
				<a class="btn btn-default no-border" href="#" role="button">
				<img 
				src="{{Config::get('app.url')}}/frontend/images/icons/icon-cart.png"                            
				style="width: 40px;" class="r-menu-thumb" /></a>
				<a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-market.png" alt="" style="width: 40px;" class="r-menu-thumb" /> {{trans('register.Tracking_The_Store')}}</a>
				<a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-connect.png" alt="" style="width: 40px;" class="r-menu-thumb" /> {{trans('register.Seller_connect_with_buyer')}}</a>
				<a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-cart1.png" alt="" style="width: 40px;" class="r-menu-thumb" /> {{trans('register.Checking_Compare_Products')}}</a>
			</div>
			<div class="constug">
				<center>
					<img src="{{Config::get('app.url')}}/frontend/images/member/strug.png" style="width: 100%"/>
				</center>
			</div>
			<div class="clear">
			</div>
			<div class="row r-user-type">
				<div class="col-sm-3">
					<div class="r-body">
						<img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" />
						<span>
							{{trans('register.Join_Free')}}
						</span>
						<p>
							{{trans('register.Join_Free_Desc')}}
						</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="r-body">
						<img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" />
						<span>
							{{trans('register.Create_Page_for_Bussiness_sale')}}
						</span>
						<p>
							{{trans('register.Create_Page_for_Bussiness_sale_Desc')}}
						</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="r-body">
						<img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" />
						<span>
							{{trans('register.Create_Page_for_persional_sale')}}
						</span>
						<p>
							{{trans('register.Create_Page_for_persional_sale_Desc')}}
						</p>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="r-body">
						<img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" />
						<span>
							{{trans('register.Posting_ads_for_Free')}}
						</span>
						<p>
							{{trans('register.Posting_ads_for_Free_Desc')}}
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-primary registerform">
				<div class="panel-heading">
					<h3 class="panel-title">
						{{trans('register.Register_Header')}}
					</h3>
				</div>
				<div class="panel-body">
                {{Form::open(array(URL::to('member/register'),'id'=>'registerForm'))}}
                <form action="{{URL::to('member/register')}}" id="registerForm" method=""
						<div class="well well-sm">
							<div class="form-group">
								<label class="radio-inline">
									<input type="radio" name="accounttype" id="freeAccount" value="1"/>
									{{trans('register.Free_Account')}}
								</label>
								<label class="radio-inline">
									<input type="radio" name="accounttype" id="interpriseAccount" value="2"/>
									{{trans('register.Interprise_Account')}}
								</label>
							</div>
							<div class="form-horizontal">
								<div class="form-group">
									<label for="WhoAreYou" class="col-sm-4 control-label">
										{{trans('register.Who_Are_You')}}
									</label>
									<div class="col-sm-8">
										<select class="form-control" name="accountRole">
											<option value="">
												{{trans('register.Manufaturure_label')}}
											</option>
											<?php $i=1;?>
												@foreach($accountRole as $Rol)
												<option value="{{$Rol->rol_id}}">
													{{$Rol->rol_name}}
												</option>
												<?php $i++;?>
													@endforeach
										</select>
									</div>
								</div>
                                <div class="form-group">
									<label for="WhoAreYou" class="col-sm-4 control-label">
										{{trans('register.Your_Business_Site')}}
									</label>
									<div class="col-sm-8">
										<select class="form-control" name="client_type" id="clientType">
                                            <option value="">
												{{trans('register.Manufaturure_select')}}
											</option>
                                            <?php $i=1;?>
												@foreach($clientType as $cType)
												<option value="{{$cType->id}}">
													{{$cType->name}}
												</option>
												<?php $i++;?>
													@endforeach
										</select>
									</div>
								</div>
								<div class="form-group" id="marketType">
									<label for="Market_Type" class="col-sm-4 control-label">
										{{trans('register.Market_Type')}}
									</label>
									<div class="col-sm-8">
										<select class="form-control" name="marketType" id="marketTypes">
											<option value="">
												{{trans('register.Market_Type')}}
											</option>
											<?php $i=1;?>
												@foreach($markets as $mk)
												<option value="{{$mk->id}}">
													{{$mk->title_en}}
												</option>
												<?php $i++;?>
													@endforeach
										</select>
                                        <div 
                                        id="loadingmarketType" 
                                        style="display: none;background:#fff;width:100%;text-align:center;padding:2px;border:1px solid #eee;">
                                        <img style="width: 30px;" src="{{Config::get('app.url')}}frontend/images/upload_progress.gif"/>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<!-- end well -->
						<div class="form-group">
							<label for="YourName">
								{{trans('register.Input_Your_Name_Label')}}
							</label>
							<input type="text" name="name" class="form-control" id="YourName" placeholder="{{trans('register.Input_Your_Name_Placeholder')}}" aria-describedby="YourNameStatus" required />
							<span data="YourName" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="YourNameStatus" class="sr-only">
								(error)
							</span>
						</div>
						<div class="form-group">
							<label for="eMail">
								{{trans('register.Input_Email')}}
							</label>
							<input type="email" name="email" class="form-control" id="eMail" placeholder="{{trans('register.Input_Email_Placeholder')}}" aria-describedby="eMailStatus" required />
							<span data="eMail" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="eMailStatus" class="sr-only">
								(error)
							</span>
                            <?php if($errors->first('email')):?>
                                <label class="error">{{trans('register.Input_Email_Error')}}</label>
                            <?php endif;?>
						</div>
						<div class="form-group">
							<label for="Password">
								{{trans('register.Input_Password')}}
							</label>
							<input type="password" name="password" class="form-control" id="Password" placeholder="{{trans('register.Input_Password_Placeholder')}}" aria-describedby="PasswordStatus" required />
							<span class="error">
								{{$errors->first('password')}}
							</span>
							<span data="Password" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="PasswordStatus" class="sr-only">
								(error)
							</span>
						</div>
						<div class="form-group">
							<label for="ComfirmPassword">
								{{trans('register.Input_Comfirm_Password')}}
							</label>
							<input type="password" name="password_confirm" class="form-control" id="ComfirmPassword" placeholder="{{trans('register.Input_Comfirm_Password_Placeholder')}}" aria-describedby="ComfirmPasswordStatus" required />
							<span data="ComfirmPassword" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="ComfirmPasswordStatus" class="sr-only">
								(error)
							</span>
						</div>
						<div class="form-group">
							<label for="PhoneNumber">
								{{trans('register.Input_Phone_Number')}}
							</label>
							<input type="text" name="telephone" class="form-control" id="PhoneNumber" placeholder="{{trans('register.Input_Phone_Number_Placeholder')}}" aria-describedby="PhoneNumberStatus" required />
							<span class="error">
								{{$errors->first('telephone')}}
							</span>
                            <span data="PhoneNumber" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="PhoneNumberStatus" class="sr-only">
								(error)
							</span>
						</div>
						<div class="form-group ghide" style="display: none;">
							<label for="Location">
								{{trans('register.Input_Location')}}
							</label>
							<select class="form-control" id="Location" name="province" required>
								<option value="">
									{{trans('register.Input_Select_Location')}}
								</option>
								<?php $i=1;?>
									@foreach($provinces as $locat)
									<option value="{{$locat->province_id}}" data-lat="{{$locat->province_lat_long}}">
										{{$locat->province_name}}
									</option>
									<?php $i++;?>
										@endforeach
							</select>
                            <span class="error">
								{{$errors->first('province')}}
							</span>
							<span data="Location" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" style="right: 15px;">
							</span>
							<span id="LocationStatus" class="sr-only">
								(error)
							</span>
						</div>
                        <div class="form-group ghide" style="display: none;">
							<label for="Location">
								{{trans('register.Input_Disctrict')}}
							</label>
							<select class="form-control" id="District" name="district" disabled required>
								<option value="">
									{{trans('register.Input_Select_Disctrict')}}
								</option>
							</select>
                            <span class="error">
								{{$errors->first('district')}}
							</span>
							<span data="Location" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" style="right: 15px;">
							</span>
							<span id="LocationStatus" class="sr-only">
								(error)
							</span>
                            <div id="loading" style="display: none;"><img style="width: 40px;" src="{{Config::get('app.url')}}frontend/images/upload_progress.gif"/></div>
						</div>
						<div class="form-group ghide" style="display: none;">
							<label for="MappingAddressHere">
								{{trans('register.Mapping_Address_Here')}}
							</label>
							<input type="text" name="gLatitudeLongitude" class="form-control" id="latbox" placeholder="{{trans('register.Mapping_Address_Here_Placeholder')}}" aria-describedby="MappingAddressHereStatus" required />
                            <span data="MappingAddressHere" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="MappingAddressHereStatus" class="sr-only">
								(error)
							</span>
						</div>
                        <div id="mapWrapper" style="">
                            
                        </div>
						<div class="form-group">
							<label for="TypeText">
								{{trans('register.Input_Type_Text')}}
							</label>
							<div class="form-inline">
								<div class="form-group">
                                {{HTML::image(Captcha::img(), 'Captcha image') }}
								</div>
								<div class="form-group">
                                    {{Form::text('captcha',null, array('class'=>'form-control', 'size'=>'10', 'maxlength'=>'6','required'=>'required'))}}
                                    {{$errors->first('captcha')}}
								</div>
							</div>
						</div>
						<input type="submit" id="summit" class="btn btn-primary pull-right" name="btnSubmit" value="{{trans('register.Input_Start')}}"/>
					{{Form::close()}}
				</div>
			</div>
			<!--/login form-->
		</div>
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
    $('#freeAccount').click(function () {
        if($(this).is(":checked")) {
            //alert($(this).val());
            //getAccountType($(this).val());
        } else {
            //$("#summit").attr('disabled',true);
        }
    });
    $('#interpriseAccount').click(function () {
        if($(this).is(":checked")) {
            //alert($(this).val());
            //getAccountType($(this).val());
        } else {
            //$("#summit").attr('disabled',true);
        }
    });   
    function getAccountType(id){
        $('#clientType').hide();
        $('#loadingClientType').show();
        $.ajax
        ({
            type: "POST",
            url: "{{Config::get('app.url')}}member/getclienttype/" + id,
            cache: false,
            success: function(html)
            {
                var selects = '<option value="">{{trans('register.Manufaturure_select')}}</option>';
                $("#clientType").html(selects + html).show();
                $('#loadingClientType').hide();
            }
        });
    }
    
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
        
    $("#Location").change(function()
        {
            var id = $(this).val();
            var dataString = 'pro_id=' + id;
            var gid = $('option:selected', this).attr('data-lat');
            showAddress(gid);
            $('#loading').show();
            $('#District').hide();
            $.ajax
                ({
                    type: "POST",
                    url: "{{Config::get('app.url')}}member/getdistrict",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        console.log(html);
                        var selects = '<option value="">{{trans('register.Input_Select_Disctrict')}}</option>';
                        //$("#District").html(selects);
                        $("#District").html(selects + html).removeAttr("disabled");
                        $('#loading').hide();
                        $('#District').show();
                        $('#mapWrapper').show();
                    }
                });
    });

    $("#District").change(function() {
            var gid = $('option:selected', this).attr('data-gps');
            showAddress(gid);
    });
                   
    $("#registerForm").validate({
          rules: {
              YourName:"required",
              eMail: {
                 required : true,
                 email: true
              },
              Password: {
                 required : true,
                 minlength: 8
              },
               ComfirmPassword: {
                 required : true,
                 minlength: 8,
                 equalTo : "#Password"
              },
               PhoneNumber: {
                 required : true,
              },
               Location: {
                 required : true,
              },
               MappingAddressHere: {
                 required : true,
              }
          },
          messages:{
              YourName: {
                required : "This Full Name is required."
              },
              Password: {
                required : "Please provide a password",
                minlength : "At least 8 characters required"
              },
              ComfirmPassword: {
                required : "Please provide a password",
                minlength : "At least 8 characters required",
                equalTo: "Password do not macth, please try again"
              },
              PhoneNumber: {
                required : "Please provide a Phone Number"
              },
              Location: {
                required : "Please provide a Location"
              }
          },
       invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          //$("#summit").attr('disabled',true);
        } else {
          //$("#summit").attr('disabled',true); MappingAddressHere
        }
       },
       highlight: function(element, errorClass, validClass) {
        $(element).parent().removeClass('has-success').addClass('has-error has-feedback').removeClass(validClass);
        $(element.form).find("span[data=" + element.id + "]").removeClass('glyphicon-ok').addClass('glyphicon-remove');
      },
      unhighlight: function(element, errorClass, validClass) {
        //$(element).removeClass(errorClass).addClass(validClass);
        $(element).parent().removeClass('has-error has-feedback').addClass(validClass);
        $(element).parent().addClass('has-success has-feedback').removeClass(validClass);
        $(element.form).find("span[data=" + element.id + "]").removeClass('glyphicon-remove').addClass('glyphicon-ok');
      }
    });

});
function loadMap() {
    $(function () {
        postscribe('#mapWrapper','<div id="gmap" style="width: 100%; height: 375px"><\/div>');
        xz();
    });
}
</script>
@endsection