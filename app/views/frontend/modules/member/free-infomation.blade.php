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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
{{HTML::script("frontend/js/map.js")}}
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
				Your are registering
				<span style="color:orange">
					As Seller
				</span>
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
												<h3>
													Your Page Information
												</h3>
                                                <div class="form-group">
                        							<label for="YourName" class="col-sm-4 control-label">
                        								{{trans('register.Input_Your_Name_Label')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="text" value="{{$userData->name}}" name="name" class="form-control" id="YourName" placeholder="{{trans('register.Input_Your_Name_Placeholder')}}" aria-describedby="YourNameStatus" required />
                            							<span data="YourName" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="YourNameStatus" class="sr-only">
                            								(error)
                            							</span>
                                                    </div>
                        						</div>
                                                <div class="form-group">
                        							<label for="eMail" class="col-sm-4 control-label">
                        								{{trans('register.Input_Email')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="email" value="{{$userData->email}}" name="email" class="form-control" id="eMail" placeholder="{{trans('register.Input_Email_Placeholder')}}" aria-describedby="eMailStatus" required />
                            							<span data="eMail" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="eMailStatus" class="sr-only">
                            								(error)
                            							</span>
                                                        <?php if($errors->first('email')):?>
                                                            <label class="error">{{trans('register.Input_Email_Error')}}</label>
                                                        <?php endif;?>
                                                    </div>
                        						</div>
                                                <div class="form-group">
                        							<label for="PhoneNumber" class="col-sm-4 control-label">
                        								{{trans('register.Input_Phone_Number')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="text" value="{{$userData->telephone}}" name="telephone" class="form-control" id="PhoneNumber" placeholder="{{trans('register.Input_Phone_Number_Placeholder')}}" aria-describedby="PhoneNumberStatus" required />
                            							<span class="error">
                            								{{$errors->first('telephone')}}
                            							</span>
                                                        <span data="PhoneNumber" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="PhoneNumberStatus" class="sr-only">
                            								(error)
                            							</span>
                                                    </div>
                        						</div>
												<!--<div class="form-group">
													<label for="Location" class="col-sm-4 control-label">
														Location
													</label>
													<div class="col-sm-8">
														<input name="Location" value="{{$userData->address}}" type="text" class="form-control" id="Location" placeholder="Location" required/>
													</div>
												</div>-->
                                                <div class="form-group ghide">
                        							<label for="MappingAddressHere" class="col-sm-4 control-label">
                        								{{trans('register.Mapping_Address_Here')}}
                        							</label>
                                                    <div class="col-sm-8">
                                                        <?php
                                                            $locationArr = json_decode($userData->address);
                                                            if ($locationArr === null) {
                                                              $locationArr = [
                                                                'g_latitude_longitude' => '11.5500, 104.9167',
                                                              ];
                                                              $locationArr = json_encode($locationArr);
                                                              $locationArr = json_decode($locationArr);
                                                            }
                                                        ?>
                            							<input type="text" value="{{$locationArr->g_latitude_longitude}}" name="gLatitudeLongitude" class="form-control" id="latbox" placeholder="{{trans('register.Mapping_Address_Here_Placeholder')}}" aria-describedby="MappingAddressHereStatus" required />
                                                        <span data="MappingAddressHere" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="MappingAddressHereStatus" class="sr-only">
                            								(error)
                            							</span>
                                                    </div>
                        						</div>
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
                                                <div id="mapWrapper" style=""><div id="gmap" style="width: 100%; height: 375px"></div></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end product detail-->
                    <div class="clear"></div>
                    <input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnInfo" value="{{trans('register.BTN_NEXT')}}"/>
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
              name:"required",
              eMail: {
                 required : true,
                 email: true
              },
               telephone: {
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
              name: {
                required : "This Full Name is required."
              },
              telephone: {
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
var idLat = '{{$locationArr->g_latitude_longitude}}';
showAddress(idLat);
</script>
<div class="clear"></div>
@endsection