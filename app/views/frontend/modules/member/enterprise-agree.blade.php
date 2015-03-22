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
								{{trans('register.agree_body_1')}}
								<span>
									{{trans('register.agree_body_2')}}
								</span>
								{{trans('register.agree_body_3')}}
								<br/>
								{{trans('register.agree_body_6')}}
								<span>
									{{trans('register.agree_body_7')}}
								</span>
								{{trans('register.agree_body_8')}}
								<span>
									{{trans('register.agree_body_9')}}
								</span>
								{{trans('register.agree_body_10')}}
								<span>
									{{trans('register.agree_body_11')}}
								</span>
								{{trans('register.agree_body_12')}}
								<span>
									{{trans('register.agree_body_13')}}
								</span>
								{{trans('register.agree_body_14')}}
								<button type="button" id="under-summit" class="btn btn-primary pull-right">
									{{trans('register.agree_understand')}}
								</button>
                                <a  id="not-under-summit" class="btn btn-primary pull-right" style="margin-right: 10px;" href="{{Config::get('app.url')}}" role="button">{{trans('register.agree_not_understand')}}</a>
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
											{{trans('register.agree_head_Logo')}}
										</label>
										<div class="col-sm-8">
											<input type="file" id="exampleInputFile" name="file"/>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
                                    <div class="form-group">
										<label for="PageUrl" class="col-sm-4 control-label">
											{{trans('register.agree_head_url')}}
										</label>
										<div class="col-sm-8">
											<input type="text" name="sto_url" class="form-control" id="PageUrl" placeholder="{{trans('register.agree_head_url_placeholder')}}" aria-describedby="PageTitleStatus" required />
                                            <?php if($errors->first('sto_url')):?>
                                                <label class="error"><?php echo $errors->first('sto_url');?></label>
                                            <?php endif;?>
										</div>
									</div>
                                    <div class="form-group">
										<label for="PageBanner" class="col-sm-4 control-label">
											{{trans('register.agree_head_banner')}}
										</label>
										<div class="col-sm-8">
											<input type="text" name="PageBanner" class="form-control" id="PageBanner" placeholder="{{trans('register.agree_head_banner')}}" aria-describedby="PageTitleStatus" required />
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
  $("#AgreeForm").validate();

});




</script>
@endsection