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
						{{trans('register.agree_Title')}}
					</h3>
				</div>
				<div class="panel-body">
					<form action="{{URL::to('member/agreement')}}/{{Request::segment(3)}}" id="AgreeForm" method="post" enctype="multipart/form-data">
						<div class="well well-sm">
							<div class="a-body">
								{{trans('register.agree_body_free_1')}}
								<span>
									{{trans('register.agree_body_free_2')}}
								</span>
								{{trans('register.agree_body_free_3')}}
								<br/>
								{{trans('register.agree_body_free_6')}}
								<span>
									{{trans('register.agree_body_free_7')}}
								</span>
								{{trans('register.agree_body_free_8')}}
								<span>
									{{trans('register.agree_body_free_9')}}
								</span>
								{{trans('register.agree_body_free_10')}}
								<span>
									{{trans('register.agree_body_free_11')}}
								</span>
								{{trans('register.agree_body_free_12')}}
								<span>
									{{trans('register.agree_body_free_13')}}
								</span>
								{{trans('register.agree_body_free_14')}}
							</div>
							<div style="clear: both;">
							</div>
						</div>
						<!-- end well -->
						<div class="checkbox">
							<label>
								<input type="checkbox" name="skipdetail" id="skipDetail" value="1"/>
								{{trans('register.agree_skip')}}
							</label>
						</div>
						<div class="well well-sm" id="bodyDetail">
							<div class="form-horizontal">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="PageTitle" class="col-sm-4 control-label">
											{{trans('register.agree_head_title')}}
										</label>
										<div class="col-sm-8">
											<input type="text" name="titleen" class="form-control" id="PageTitle" placeholder="{{trans('register.agree_head_title')}}" aria-describedby="PageTitleStatus" required />
										</div>
									</div>
									<div class="form-group">
										<label for="BusinessSite" class="col-sm-4 control-label">
											{{trans('register.agree_head_Logo')}} <span class="label label-danger" style="color:#fff">{{trans('register.agree_logo_size')}}</span>
										</label>
										<div class="col-sm-8">
											<input type="file" id="exampleInputFile" name="file" class="form-control"/>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
                                    <div class="form-group">
										<label for="PageUrl" class="col-sm-4 control-label">
											{{trans('register.agree_head_url')}}
										</label>
										<div class="col-sm-8">
											{{URL::to('/')}}/<div id="urlAdd" class="has-feedback"
														style="display: inline-block;"><input 
											style="width:150px;display: inline-block;" 
											type="text" name="sto_url" 
											class="form-control" 
											id="PageUrl" 
											placeholder="{{trans('register.agree_head_url_placeholder')}}" 
											aria-describedby="PageTitleStatus" required />
											<span
												class="glyphicon glyphicon-remove form-control-feedback"
												aria-hidden="false"></span></div>
                                            <?php if($errors->first('sto_url')):?>
                                                <label class="error"><?php echo $errors->first('sto_url');?></label>
                                            <?php endif;?>
										</div>
										<style>
										.has-error .form-control{  border-color: #a94442!important;}
										.has-error .form-control-feedback{color:#a94442!important;}
										.has-success .form-control-feedback {color: #3c763d!important;}
										</style>
									</div>
                                    <div class="form-group">
										<label for="PageTitle" class="col-sm-4 control-label">
											{{trans('register.agree_head_banner')}} <span class="label label-danger" style="color:#fff">{{trans('register.agree_banner_size')}}</span>
										</label>
										<div class="col-sm-8">
											<input type="file" name="PageBanner" class="form-control" id="PageTitle" placeholder="{{trans('register.agree_head_banner')}}" aria-describedby="PageTitleStatus" required />
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
								 {{trans('register.agree_acept')}}
							</label>
						</div>
                        <input type="hidden" name="uid" value="{{Input::get('uid')}}"/>
                        <input type="hidden" name="sid" value="{{Input::get('sid')}}"/>
                        <input type="submit" id="summit" class="btn btn-primary pull-right" name="btnSubmit" value="{{trans('register.agree_btn_submit')}}"/>
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
            $("#PageTitle").removeAttr("required");
            $("#PageUrl").removeAttr("required");
            $("#PageBanner").removeAttr("required");
        } else {
            $("#bodyDetail").slideDown();
            $("#PageTitle").attr('required',true);
            $("#PageUrl").attr('required',true);
            $("#PageBanner").attr('required',true);
        }
    });    
    $("#AgreeForm").validate({
          rules: {
      btnagree: {
         required : true
      }
  },
  messages:{
      btnagree: {
        required : "check the checbox"
      }
  }
    });
  $("#AgreeForm").validate();

	//Url Address btnSaveUrl
  $('#PageUrl').blur(function () {
      if($(this).val()) {
          $.ajax({
      		url: homePage + "member/geturladress?type=checkaddURL&id="+$(this).val(),
      		type: "get",
      		dataType: "json",
      		async: false,
      		success: function(data) {
      			$("#btnSaveUrl").show();
          		if(data.result == 1) {
              		$("#urlAdd").addClass('has-error').removeClass('has-success');
              		$(".glyphicon").addClass('glyphicon-remove').removeClass('glyphicon-ok').show();
              		$(".alert-danger").show();
          		} else {
          			$("#urlAdd").removeClass('has-error').addClass('has-success');
          			$(".glyphicon").addClass('glyphicon-ok').removeClass('glyphicon-remove').show();
          			$(".alert-success").show();
          		}
          	}
          });
      }
  });
  
});
</script>
@endsection