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
<div class="register">
	<div class="agree">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary registerform">
				<div class="panel-heading">
					<h3 class="panel-title">
						Comfirm Agreement
					</h3>
				</div>
				<div class="panel-body">
					<form action="{{Config::get('app.url')}}" id="registerForm">
						<div class="well well-sm">
							<div class="a-body">
								Now , You are registered as
								<span>
									Interprise Account type
								</span>
								. You are Offered
								<span>
									30 days
								</span>
								for a trial period with Khmer Abba shoping . After a Trial Peroid Offering ,Your account will be disabled temporarily .
								<br/>
								So you may contact to Khmer Abba shoping in order continue your
								<span>
									Interprise Page Offering
								</span>
								by
								<span>
									charging 20$/month
								</span>
								through number
								<span>
									010393938 / 0975555515
								</span>
								or By Clicking
								<span>
									Confirm Upgrading Accountype
								</span>
								then Khmer Abba shoping will contact to you directly.
								<button type="button" id="under-summit" class="btn btn-primary pull-right">
									understand
								</button>
								<button type="button" id="not-under-summit" class="btn btn-primary pull-right" style="margin-right: 10px;">
									Not understand
								</button>
							</div>
							<div style="clear: both;">
							</div>
						</div>
						<!-- end well -->
						<div class="checkbox">
							<label>
								<input type="checkbox" name="skipdetail" id="skipDetail" value="1"/>
								Skip it . You can do next time after completing your register .
							</label>
						</div>
						<div class="well well-sm" id="bodyDetail">
							<div class="form-horizontal">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="PageTitle" class="col-sm-4 control-label">
											Page Title
										</label>
										<div class="col-sm-8">
											<input type="text" name="PageTitle" class="form-control" id="PageTitle" placeholder="Page Title" aria-describedby="PageTitleStatus" required />
										</div>
									</div>
									<div class="form-group">
										<label for="BusinessSite" class="col-sm-4 control-label">
											Logo
										</label>
										<div class="col-sm-8">
											<input type="file" id="exampleInputFile"/>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
                                    <div class="form-group">
										<label for="PageTitle" class="col-sm-4 control-label">
											Page Address
										</label>
										<div class="col-sm-8">
											<input type="text" name="PageTitle" class="form-control" id="PageTitle" placeholder="www.khmerabba.com/dara shop" aria-describedby="PageTitleStatus" required />
										</div>
									</div>
                                    <div class="form-group">
										<label for="PageTitle" class="col-sm-4 control-label">
											Banner-Header
										</label>
										<div class="col-sm-8">
											<input type="text" name="PageTitle" class="form-control" id="PageTitle" placeholder="Banner-Header" aria-describedby="PageTitleStatus" required />
										</div>
									</div>
								</div>
							</div>
							<div style="clear: both;">
							</div>
						</div>
                        <div class="checkbox">
							<label>
								<input type="checkbox" name="btnagree" id="btnagree" value="1"/>
								 I agree to the term and condiction of Khmer Abba shoping
							</label>
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
    $('#skipDetail').click(function () {
        if($(this).is(":checked")) {
            $("#bodyDetail").slideUp();
        } else {
            $("#bodyDetail").slideDown();
        }
    });    
    $("#AgreeForm").validate({
          rules: {
      agreement: {
         required : true
      }
  },
  messages:{
      agreement: {
        required : "check the checbox"
      }
  }
    });
    //$("#AgreeForm").validate();

});




</script>
@endsection