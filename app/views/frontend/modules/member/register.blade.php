@extends('frontend.nosidebar') 
@section('title') 
Register Page
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
        <div class="register-form"><!--login form-->
            <h2>Register Form</h2>
            <div class="conent">
                <h3>Choose One Of  Your User Type </h3>
                <form action="{{Config::get('app.url')}}">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Free Seller/Buyer
                        </label>
                        <div class="clear"></div>
                        <div class="des">How to register as Free  Seller /  Buyer ?</div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Enterprise Seller
                        </label>
                        <div class="clear"></div>
                        <div class="des">How to register as Enterprise Seller ?</div>
                    </div>
                    <button type="submit" class="btn btn-default pull-right">Start</button>
                </form>
                <div class="clear"></div>
            </div>
        </div><!--/login form-->
    </div>
</div>
@endsection