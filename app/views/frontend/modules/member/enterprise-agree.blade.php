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
				<form action="{{Config::get('app.url')}}" id="AgreeForm">
					<div class="form-group">
						<label for="inputType" style="display: block;">
							Choose Your Seller Type
						</label>
						<select id="inputType" style="max-width:300px">
							<option>
								Super market
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
					<div class="form-group">
						<p>
							Enterprise Seller (
							<span style="color: red;">
								3 months free only
							</span>
							)
						</p>
					</div>
					<div class="checkbox">
						<label>
							<input name="agreement" type="checkbox" id="agreement" required />
							Do you agree with this agreement
						</label>
					</div>
                    <button id="summit" type="submit" class="btn btn-default pull-right choosenuser" disabled="disabled">Next</button>
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