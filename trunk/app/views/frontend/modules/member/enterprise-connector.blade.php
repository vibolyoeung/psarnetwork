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
                                <li class="active">
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
													Your Connector
												</h3>
                                                <center>
                                                <div style="width:80%;border: 1px solid #ccc;padding:10px;">
                                                    It is your first time to join phsar network !! <br/>Now you don't have any connectors. <br/>
                                                    <b>You need to add some connectors which is sugested to you now or later at the right panel .</b>
                                                </div>
                                				<img src="{{Config::get('app.url')}}/frontend/images/member/strug.png" style="width: 100%"/>
                                			</center>
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
												<h3>
													Your Contact
												</h3>
                                                <div id="connectorF">
                                                    <div class="thumb"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ1LjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+" alt="..." class="img-thumbnail"></div>
                                                    Khmer Shop smart phone 23
                                                    <button type="button" id="myButton" onclick="addConnect();" data-loading-text="Loading..." class="btn btn-primary pull-right" autocomplete="off">Add</button>
                                                    <div style="clear: both;"></div>
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
                    <a id="chooseuser" class="btn btn-warning pull-right choosenuser" href="#">Skip</a>
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
<div class="clear"></div>
@endsection