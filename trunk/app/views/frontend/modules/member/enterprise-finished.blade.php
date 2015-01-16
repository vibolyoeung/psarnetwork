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
								<li>
									<a href="javascript:;">Persional Info</a>
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
								<li class="active">
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
												<center>
													<div style="width:80%;border: 1px solid #ccc;padding:10px;">
														<h4>
															Congratulation !
														</h4>
														<br />
														<b>
															Your Page site Address : www.phsarnetwork.com/PC24
														</b>
														<br />
														<b>
															Your Account Name : Sokdara
														</b>
													</div>
													<img src="{{Config::get('app.url')}}/frontend/images/member/strug.png" style="width: 100%"/>
												</center>
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-6">
											<div class="pro-detail" style="padding-right: 10px;">
												<h3>
													Review  of your page policy
												</h3>
												<div class="alert alert-warning" role="alert">
													1. Your Page free for any user to access for 3 months only . After, it will be required you to pay for this page if you want to contifnue .
												</div>
                                                <div class="alert alert-warning" role="alert">
													2. Your page will contain with PIONT TO function automatically, for free in 3 months. 
												</div>
                                                <div class="alert alert-warning" role="alert">
													3. All your products post on your page will view on the main page of phsarnetwork.com and your connetor pages as well.  
												</div>
                                                <div class="alert alert-warning" role="alert">
													4. Review  of your page policy
												</div>
                                                <div class="alert alert-warning" role="alert">
													5. Review  of your page policy
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
					<button id="summit" type="submit" class="btn btn-default pull-right choosenuser">
						Finish
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
    
    $('#myButton1').on('click', function () {
        var $btn = $(this).button('loading');
        // business logic...
        //$btn.button('reset');
      });
});
function addConnect(){
    var $btn = $(this).button('loading');
}

</script>
<div class="clear">
</div>
@endsection