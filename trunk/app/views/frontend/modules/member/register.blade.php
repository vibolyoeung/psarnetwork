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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
{{HTML::script('frontend/js/map.js')}}
<div class="home">
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
					<form action="{{URL::to('member/register')}}" id="registerForm" method="post">
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
										<select class="form-control" name="client_type">
											<option value="">
												{{trans('register.Manufaturure_label')}}
											</option>
											<?php $i=1;?>
												@foreach($marketType as $mk_t)
												<option value="{{$mk_t->id}}">
													{{$mk_t->name}}
												</option>
												<?php $i++;?>
													@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="BusinessSite" class="col-sm-4 control-label">
										{{trans('register.Your_Business_Site')}}
									</label>
									<div class="col-sm-8">
										<select class="form-control">
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
							<span class="class-error">
								{{$errors->first('email')}}
							</span>
							<span data="eMail" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="eMailStatus" class="sr-only">
								(error)
							</span>
						</div>
						<div class="form-group">
							<label for="Password">
								{{trans('register.Input_Password')}}
							</label>
							<input type="password" name="password" class="form-control" id="Password" placeholder="{{trans('register.Input_Password_Placeholder')}}" aria-describedby="PasswordStatus" required />
							<span class="class-error">
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
							<span data="PhoneNumber" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="PhoneNumberStatus" class="sr-only">
								(error)
							</span>
						</div>
						<div class="form-group">
							<label for="Location">
								{{trans('register.Input_Location')}}
							</label>
							<select class="form-control" id="Location" name="address" required>
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
							<span data="Location" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" style="right: 15px;">
							</span>
							<span id="LocationStatus" class="sr-only">
								(error)
							</span>
						</div>
                        <div class="form-group">
							<label for="Location">
								{{trans('register.Input_Disctrict')}}
							</label>
							<select class="form-control" id="District" name="address" disabled required>
								<option value="">
									{{trans('register.Input_Select_Disctrict')}}
								</option>
							</select>
							<span data="Location" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" style="right: 15px;">
							</span>
							<span id="LocationStatus" class="sr-only">
								(error)
							</span>
                            <div id="loading" style="display: none;"><img style="width: 40px;" src="{{Config::get('app.url')}}frontend/images/upload_progress.gif"/></div>
						</div>
						<div class="form-group">
							<label for="MappingAddressHere">
								{{trans('register.Mapping_Address_Here')}}
							</label>
							<input type="text" name="MappingAddressHere" class="form-control" id="latbox" placeholder="{{trans('register.Mapping_Address_Here_Placeholder')}}" aria-describedby="MappingAddressHereStatus" required />
							<span data="MappingAddressHere" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
							</span>
							<span id="MappingAddressHereStatus" class="sr-only">
								(error)
							</span>
						</div>
                        <div id="mapWrapper">
                            <div id="gmap" style="width: 100%; height: 375px"></div>
                        </div>
						<div class="form-group">
							<label for="TypeText">
								{{trans('register.Input_Type_Text')}}
							</label>
							<div class="form-inline">
								<div class="form-group">
									<img id="captcha" src="{{Config::get('app.url')}}/securimage/securimage_show.php" alt="CAPTCHA Image" />
									<a href="#" onclick="document.getElementById('captcha').src = '{{Config::get('app.url')}}/securimage/securimage_show.php?' + Math.random(); return false"> <i style="font-size: 20px;" class="glyphicon glyphicon-refresh"></i></a>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="captcha_code" size="10" maxlength="6" required/>
								</div>
							</div>
						</div>
						<input type="submit" id="summit" class="btn btn-primary pull-right" name="btnSubmit" value="{{trans('register.Input_Start')}}"/>
					</form>
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
                        $("#District").html(selects);
                        $("#District").append(html);
                        $("#District").removeAttr("disabled");
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

</script>
@endsection