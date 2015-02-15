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
		<div class="panel panel-primary LoginForm">
			<div class="panel-heading">
				<h3 class="panel-title">
					{{trans('login.User_Login')}}
				</h3>
			</div>
			<div class="panel-body">
				@if(Session::has('INVALID_LOGIN'))
					<div class="alert alert-block alert-danger fade in">
						<button
							data-dismiss="alert"
							class="close"
							type="button"
							data-original-title=""
						>x</button>
						<p>{{Session::get('INVALID_LOGIN')}}</p>
					</div>
				@endif
				<form action="{{URL::to('/member/login')}}" method="post" id="LoginForm">
					<div class="well well-sm">
						<div class="form-horizontal">
							<div class="form-group">
								<label for="WhoAreYou" class="col-sm-4 control-label">
									{{trans('login.Login_By_Name_Email_Phone')}}
								</label>
								<div class="col-sm-8">
									<input
										type="text"
										name="loginName"
										class="form-control"
										id="eMail"
										placeholder="{{trans('login.by_name_email_phone_number')}}"
										aria-describedby="eMailStatus"
										required
									/>
								</div>
							</div>
							<div class="form-group">
								<label for="BusinessSite" class="col-sm-4 control-label">
									{{trans('login.Password')}}
								</label>
								<div class="col-sm-8">
									<input
										type="password"
										name="password"
										class="form-control"
										id="Password"
										placeholder="{{trans('login.Your_Password')}}"
										aria-describedby="PasswordStatus"
										required
									/>
								</div>
							</div>
						</div>
					</div>
					<input
						type="submit"
						id="summit"
						class="btn btn-primary pull-right",
						value="{{trans('login.Login')}}",
						name="BtnLogin"
					/>
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