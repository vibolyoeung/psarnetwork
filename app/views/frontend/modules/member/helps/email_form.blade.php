@extends('frontend.layout')
@section('title')
Reset password
@endsection
@section('content')
<style>
html{
	min-height: 100%;
	position:relative;
	padding:0;
	margin:0;
}
footer#footer{
	position: absolute;
	bottom:0;
	width:100%;
}
.form-forgetpassword{
	margin-top:18%;
}
</style>
<div class="container form-forgetpassword">
   <div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3">
   
   
   		<div class="panel panel-primary LoginForm">
  			<div class="panel-heading">
  				<h3 class="panel-title">
  					{{trans('login.Forget_Password')}}
  				</h3>
  			</div>
  			<div class="panel-body">
  				<form action="{{URL::to('/member/help/forget')}}" method="post" id="LoginForm" class="login-container">
			        @if(Session::has('hasError'))
			            <p style="color: red;">{{trans('login.Incorrect_Email')}}</p>
			        @endif
			        @if(Session::has('hasErrorSendMail'))
			            <p style="color: red;">
			                {{trans('login.Email_Not_Send')}}
			            </p>
			        @endif
			        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
			            <input type="email" name="foregetEmail" class="form-control" required="required" placeholder="{{trans('login.Email_Here')}}" />
			        </div>
			        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			        	  <input 
			                type="submit" 
			                name="btnSubmitEmail" 
			                value="{{trans('login.Send')}}" 
			                class="btn btn-warning btn-md"
			            />
			        </div>
		      </form>
  			</div>
  		</div>
   </div>
</div>
@endsection