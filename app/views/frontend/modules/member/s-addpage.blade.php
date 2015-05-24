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
		@include('frontend.modules.member.layout.sidebar')
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<h2>
				{{trans('register.acc_page_title')}}
			</h2>
			<div class="conent">
				<form action="" id="vaildateForm" class="form-horizontal" method="post">
					<div class="" style="margin: 0;">
						<!--category-tab-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="personal">
								<div class="col-sm-12">
									<div class="pro-detail">
                                        <div class="form-group">
                							<label for="TitleTxt" class="col-sm-4 control-label">
                								{{trans('register.acc_page_name')}}
                							</label>
                                            <div class="col-sm-8">
                    							<input type="text" value="" name="name" class="form-control" id="TitleTxt" placeholder="{{trans('register.acc_page_name')}}" aria-describedby="TitleTxtStatus" required />
                    							<span data="TitleTxt" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                    							</span>
                    							<span id="TitleTxtStatus" class="sr-only">
                    								(error)
                    							</span>
                                            </div>
                						</div>
                                        <div class="form-group">
                							<label for="bodyTxt" class="col-sm-4 control-label">
                								{{trans('register.acc_page_body')}}
                							</label>
                                            <div class="col-sm-8">
                    							<textarea name="body" class="form-control" id="bodyTxt" placeholder="{{trans('register.acc_page_body')}}" aria-describedby="bodyTxtStatus"></textarea>
                    							<span data="bodyTxt" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                    							</span>
                    							<span id="bodyTxtStatus" class="sr-only">
                    								(error)
                    							</span>
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
					<input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnInfo" value="{{trans('register.BTN_SAVE')}}"/>
				</form>
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
<div class="clear">
</div>
{{HTML::script('frontend/js/jquery.validate.js')}}
<script type='text/javascript'>
$(document).ready(function(){
    $("#vaildateForm").validate({
          rules: {
      name: {
         required : true
      }
    },
      messages:{
          name: {
            required : "This Title is required."
          }
      }
    });
});
</script>
@endsection