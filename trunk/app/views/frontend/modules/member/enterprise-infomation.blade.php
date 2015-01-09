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
				<form action="{{Config::get('app.url')}}" id="PersonalForm" class="form-horizontal">
					<div class="category-tab shop-details-tab" style="margin: 0;">
						<!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#personal" data-toggle="tab">Persional Info</a>
								</li>
								<li>
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
									<div class="row">
										<!--product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
												<h3>
													Your Page Information
												</h3>
												<div class="form-group">
													<label for="FullName" class="col-sm-4 control-label">
														Full Name
													</label>
													<div class="col-sm-8">
														<input name="FullName" type="text" class="form-control" id="FullName" placeholder="Full Name" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="AccountName" class="col-sm-4 control-label">
														Account Name
													</label>
													<div class="col-sm-8">
														<input name="AccountName" type="text" class="form-control" id="AccountName" placeholder="Account Name" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="Password" class="col-sm-4 control-label">
														Password
													</label>
													<div class="col-sm-8">
														<input name="password" type="password" class="form-control" id="Password" placeholder="Password" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="RetypePassword" class="col-sm-4 control-label">
														Retype Password
													</label>
													<div class="col-sm-8">
														<input name="RetypePassword" type="password" class="form-control" id="RetypePassword" placeholder="Retype Password" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="BirthofDate" class="col-sm-4 control-label">
														Birth of Date
													</label>
													<div class="col-sm-8">
														<input name="BirthofDate" type="text" class="form-control" id="BirthofDate" placeholder="Birth of Date" required/>
													</div>
												</div>
												<div class="form-group">
													<label for="gender" class="col-sm-4 control-label">
														Gender
													</label>
													<div class="col-sm-8">
														<select class="form-control" name="gender" id="gender" required>
															<option value="">
																Gender
															</option>
                                                            <option value="male">
																Male
															</option>
															<option value="female">
																Female
															</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="Location" class="col-sm-4 control-label">
														Location
													</label>
													<div class="col-sm-8">
														<input name="Location" type="text" class="form-control" id="Location" placeholder="Location" required/>
													</div>
												</div>
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
												<h3>
													Your Contact
												</h3>
												<div class="form-group">
													<label for="EmailAddress" class="col-sm-4 control-label">
														Email Address
													</label>
													<div class="col-sm-8">
														<input name="EmailAddress" type="email" class="form-control" id="EmailAddress" placeholder="Email Address" required/>
													</div>
												</div>
                                                <div class="form-group">
													<label for="PhoneNumber" class="col-sm-4 control-label">
														Phone Number
													</label>
													<div class="col-sm-8">
														<input name="PhoneNumber" type="text" class="form-control" id="PhoneNumber" placeholder="Phone Number" required/>
													</div>
												</div>
                                                <div class="form-group">
													<label for="secrit" class="col-sm-4 control-label">
														Type Picture
													</label>
													<div class="col-sm-8">
                                                        <img id="captcha" src="{{Config::get('app.url')}}/securimage/securimage_show.php" alt="CAPTCHA Image" /><a href="#" onclick="document.getElementById('captcha').src = '{{Config::get('app.url')}}/securimage/securimage_show.php?' + Math.random(); return false"> <i style="font-size: 20px;" class="glyphicon glyphicon-refresh"></i></a>
														<input type="text" class="form-control" name="captcha_code" size="10" maxlength="6" required/>
                                                        <!-- https://www.phpcaptcha.org/documentation/quickstart-guide/ -->
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
                    <div class="clear"></div>
					<button id="summit" type="submit" class="btn btn-default pull-right choosenuser">
						Next
					</button>
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
      FullName: {
         required : true
      }
  },
  messages:{
      FullName: {
        required : "This Full Name is required."
      }
  }
    });
});
</script>
<div class="clear"></div>
@endsection