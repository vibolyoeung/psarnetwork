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
             {{Form::open(array('url'=>'admin/edit-page'))}}
             	<div class="form-group">
                  <label>Title En<span class="class-required">*</span></label>
                 {{ Form::text('title_en',$pages->title_en, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
                 <span class="class-error">{{$errors->first('title_en')}}</span>
                </div>
                <div class="form-group">
                  <label>Title Zh<span class="class-required">*</span></label>
                 {{ Form::text('title_zh',$pages->title_zh, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
                 <span class="class-error">{{$errors->first('title_zh')}}</span>
                </div>
                 {{Form::hidden('id',$pages->id)}}
                <div class="form-group">
                  <label>Short Description En</label>
                 {{ Form::textarea('desc_en',$pages->short_desc_en, array('class' => 'form-control','placeholder'=>'Enter description'))}}
                </div>
                <div class="form-group">
                  <label>Short Description Zh</label>
                 {{ Form::textarea('desc_zh',$pages->short_desc_zh, array('class' => 'form-control','placeholder'=>'Enter description'))}}
                </div>
                {{Form::submit('Update', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection