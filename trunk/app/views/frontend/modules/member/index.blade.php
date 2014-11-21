@extends('frontend.nosidebar') 
@section('title') 
Member login
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li class="active">Data</li>
</ol>
@endsection
@section('frontend.partials.left')
@endsection
@section('content')
<div class="memberlogin">
    <div class="col-sm-8">
        <div class="advertise">
            <div class="col-sm-12">
                <img src="{{Config::get('app.url')}}/upload/banner/banner728.png" alt="" style="width:100%" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="constug">
            <center><img src="{{Config::get('app.url')}}/frontend/images/member/strug.png" style="width: 100%"/></center>
        </div>
        <div class="clear"></div>
    </div>
    <div class="col-sm-4">
        <div class="login-form"><!--login form-->
            <h2>Login to your account</h2>
            <form action="#">
                <input type="text" placeholder="Your: Email / Acount name / phone number">
                <input type="password" placeholder="Password">
                <span>
                    <input type="checkbox" class="checkbox" name="rememberme" id="rememberme"> 
                    <label for="rememberme">Remember Your Password?</label>
                </span><br/>
                <a href="#">Forget Password</a><br/>
                Dont  have an account?  <a href="{{Config::get('app.url')}}/member/register">Register Free</a>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div><!--/login form-->
    </div>
    <div class="clear"></div>
</div>
@endsection