@extends('backend/layout') 
@section('title') Free Store @endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>Stores</li>
    </ul>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
            <h3 class="panel-title">Free Stores List</h3>
            </div>
            <div class="panel-body">
            @if(Session::has('SECCESS_MESSAGE'))
                <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button"
                    data-original-title="">x</button>
                <p>{{Session::get('SECCESS_MESSAGE')}}</p>
                </div>
            @endif
        <div class="table-responsive">
        <table class="table table-bordered no-margin">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Store</th>
                    <th>Create Date</th>
                    <th>Action</th>
                </tr>
            </thead>
    <tbody>
        
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
 @endsection
