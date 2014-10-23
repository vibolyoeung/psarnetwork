@extends('backend/layout')
@section('title')
    Create
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li><a href="{{URL::to('admin/pages')}}">Pages</a></li>
        <li>Edit</li>
    </ul>
@endsection
@section('content')
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">Edit</h3>
            </div>
            <div class="panel-body">
             {{Form::open(array('url'=>'admin/edit_page'))}}
             	<div class="form-group">
                  <label>Title<span class="class-required">*</span></label>
                 {{ Form::text('title',$pages->title, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
                 <span class="class-error">{{$errors->first('title')}}</span>
                </div>
                 {{Form::hidden('id',$pages->id)}}
                <div class="form-group">
                  <label>Short Description</label>
                 {{ Form::textarea('desc',$pages->short_desc, array('class' => 'form-control','placeholder'=>'Enter description'))}}
                </div>
                {{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection
