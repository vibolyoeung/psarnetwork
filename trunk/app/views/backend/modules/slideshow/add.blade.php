@extends('backend/layout')
@section('title')
    Create
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li><a href="{{URL::to('admin/pages')}}">Pages</a></li>
        <li>Create</li>
    </ul>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">Slideshows</h3>
            </div>
            <div class="panel-body">
             {{Form::open(array('url'=>'admin/create_slideshow','enctype'=>'multipart/form-data','file' => true))}}
             	<div class="form-group">
                  <label>Title<span class="class-required">*</span></label>
                 {{ Form::text('title',null, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
                 <span class="class-error">{{$errors->first('title')}}</span>
                </div>
                
                <div class="form-group">
                  <label>Link URL<span class="class-required">*</span></label>
                 {{ Form::text('url',null, array('class' => 'form-control','placeholder'=>'Enter URL'))}}
                 <span class="class-error">{{$errors->first('url')}}</span>
                </div>
                
                <div class="form-group">
                  <label>Picture<span class="class-required">*</span></label>
                 {{ Form::file('file',array('class' => 'form-control'))}}
                 <span class="class-error">{{$errors->first('file')}}</span>
                </div>
                
<!--                <div class="checkbox">-->
<!--                  <label>-->
<!--                    <input type="checkbox"> Is User-->
<!--                  </label>-->
<!--                </div>-->
<!--                <div>-->
<!--	                <div class="form-group">-->
<!--	                  <label>Name</label>-->
<!--	                  {{ Form::text('name',null, array('class' => 'form-control','placeholder'=>'Enter Name'))}}-->
<!--	                </div>-->
<!--	                <div class="form-group">-->
<!--	                  <label>Phone</label>-->
<!--	                  {{ Form::text('phone',null, array('class' => 'form-control','placeholder'=>'Enter phone'))}}-->
<!--	                </div>-->
<!--	                <div class="form-group">-->
<!--	                  <label>Email</label>-->
<!--	                  {{ Form::text('email',null, array('class' => 'form-control','placeholder'=>'Enter Email'))}}-->
<!--	                </div>-->
<!--	                 <div class="form-group">-->
<!--	                  <label>Address</label>-->
<!--	                  {{ Form::text('Address',null, array('class' => 'form-control','placeholder'=>'Enter Address'))}}-->
<!--	                </div>-->
<!--                </div>-->
                
                <div class="form-group">
                  <label>Short Description</label>
                 {{ Form::textarea('short_desc',null, array('class' => 'form-control','placeholder'=>'Enter short description'))}}
                </div>
                
                <div class="form-group">
                  <label>Description</label>
                 {{ Form::textarea('desc',null, array('class' => 'form-control','placeholder'=>'Enter description'))}}
                </div>
                
                {{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection
