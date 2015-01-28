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
<div class="home">
    <div class="rigister">
	<div class="col-sm-8">
        <div class="r-menu">
            <span class="r-menu-text">Try It Today .....</span>
            <a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-cart.png" alt="" style="width: 40px;" class="r-menu-thumb" /></a>
            <a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-market.png" alt="" style="width: 40px;" class="r-menu-thumb" /> Tracking The Store</a>
            <a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-connect.png" alt="" style="width: 40px;" class="r-menu-thumb" /> Seller connect with  buyer</a>
            <a class="btn btn-default no-border" href="#" role="button"><img src="{{Config::get('app.url')}}/frontend/images/icons/icon-cart1.png" alt="" style="width: 40px;" class="r-menu-thumb" /> Checking & Compare Products</a>
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
                    <img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" /> <span> Join Free</span>
                    <p>Every thing is free  for register....!  To show your bussiness  to out side.</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="r-body">
                    <img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" /> <span> Create Page for Bussiness sale</span>
                    <p>Create  your bussiness  page  store to spreat and advertise  your bussiness product without wasting your time and money to build website.</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="r-body">
                    <img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" /> <span> Create Page for persional sale</span>
                    <p>Create  your persional  page to sell your own persional things and manage your  profile.</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="r-body">
                    <img src="{{Config::get('app.url')}}/frontend/images/icons/icon-user-group.png" alt="" class="r-menu-thumb" /> <span> Posting ads for Free</span>
                    <p>Your product will be free to show on our website while you  post from your page</p>
                </div>
            </div>
        </div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-primary registerform">
			<div class="panel-heading">
				<h3 class="panel-title">
					Register Form
				</h3>
			</div>
			<div class="panel-body">
				<form action="{{Config::get('app.url')}}/member/register/enterprise/agree" id="registerForm">
					<div class="well well-sm">
						<div class="form-group">
							<label class="radio-inline">
								<input type="radio" name="accounttype" id="freeAccount" value="freeAccount"/>
								Free Account
							</label>
							<label class="radio-inline">
								<input type="radio" name="accounttype" id="interpriseAccount" value="interpriseAccount"/>
								Interprise Account
							</label>
						</div>
						<div class="form-horizontal">
							<div class="form-group">
								<label for="WhoAreYou" class="col-sm-4 control-label">
									Who Are You
								</label>
								<div class="col-sm-8">
									<select class="form-control">
										<option>
											Manufaturure
										</option>
										<option>
											2
										</option>
										<option>
											3
										</option>
										<option>
											4
										</option>
										<option>
											5
										</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="BusinessSite" class="col-sm-4 control-label">
									Your Business Site
								</label>
								<div class="col-sm-8">
									<select class="form-control">
										<option>
											Private Company
										</option>
										<option>
											2
										</option>
										<option>
											3
										</option>
										<option>
											4
										</option>
										<option>
											5
										</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!-- end well -->
					<div class="form-group">
						<label for="YourName">
							Your Name
						</label>
						<input type="text" name="YourName" class="form-control" id="YourName" placeholder="Your Name" aria-describedby="YourNameStatus" required />
						<span data="YourName" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
						</span>
						<span id="YourNameStatus" class="sr-only">
							(error)
						</span>
					</div>
					<div class="form-group">
						<label for="eMail">
							Email
						</label>
						<input type="email" name="eMail" class="form-control" id="eMail" placeholder="Your email" aria-describedby="eMailStatus" required />
						<span data="eMail" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
						</span>
						<span id="eMailStatus" class="sr-only">
							(error)
						</span>
					</div>
					<div class="form-group">
						<label for="Password">
							Password
						</label>
						<input type="password" name="Password" class="form-control" id="Password" placeholder="Your Password" aria-describedby="PasswordStatus" required />
						<span data="Password" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
						</span>
						<span id="PasswordStatus" class="sr-only">
							(error)
						</span>
					</div>
					<div class="form-group">
						<label for="ComfirmPassword">
							Comfirm Password
						</label>
						<input type="password" name="ComfirmPassword" class="form-control" id="ComfirmPassword" placeholder="Comfirm Password" aria-describedby="ComfirmPasswordStatus" required />
						<span data="ComfirmPassword" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
						</span>
						<span id="ComfirmPasswordStatus" class="sr-only">
							(error)
						</span>
					</div>
					<div class="form-group">
						<label for="PhoneNumber">
							Phone Number
						</label>
						<input type="text" name="PhoneNumber" class="form-control" id="PhoneNumber" placeholder="Phone Number" aria-describedby="PhoneNumberStatus" required />
						<span data="PhoneNumber" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
						</span>
						<span id="PhoneNumberStatus" class="sr-only">
							(error)
						</span>
					</div>
					<div class="form-group">
						<label for="Location">
							Location
						</label>
						<select class="form-control" id="Location" name="Location" required>
							<option value="">
							</option>
							<option value="Location">
								Location
							</option>
						</select>
						<span data="Location" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true" style="right: 15px;">
						</span>
						<span id="LocationStatus" class="sr-only">
							(error)
						</span>
					</div>
					<div class="form-group">
						<label for="MappingAddressHere">
							Mapping Address Here
						</label>
						<input type="text" name="MappingAddressHere" class="form-control" id="MappingAddressHere" placeholder="Mapping Address Here" aria-describedby="MappingAddressHereStatus" required />
						<span data="MappingAddressHere" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
						</span>
						<span id="MappingAddressHereStatus" class="sr-only">
							(error)
						</span>
					</div>
                    <div class="form-group">
                        <label for="TypeText">
							Type Text
						</label>
    					<div class="form-inline">
    						<div class="form-group">
    							<input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
    						</div>
    						<div class="form-group">
    							<input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
    						</div>
    					</div>
                    </div>
					<button type="submit" id="summit" class="btn btn-primary pull-right">
						Start
					</button>
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