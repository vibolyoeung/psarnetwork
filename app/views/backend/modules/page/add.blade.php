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
	{{HTML::style('ce_editor/jquery.cleditor.css')}}
	{{HTML::script('ce_editor/jquery.js')}}
	{{HTML::script('ce_editor/jquery.cleditor.js')}}
	<script type="text/javascript">
	$(document).ready(function () {
		$(".ce_editor").cleditor();
	});
	</script>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <i class="icon-calendar"></i>
              <h3 class="panel-title">Pages</h3>
            </div>
            <div class="panel-body">
             {{Form::open(array('url'=>'admin/create-page'))}}
             	<div class="form-group">
                  <label>Title
                  	<span class="class-required">*</span>
				{{HTML::image("backend/images/lang-icons/en.png",'En',array())}}
                  </label>
                 {{ Form::text('title_en',null, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
                 <span class="class-error">{{$errors->first('title_en')}}</span>
                </div>

                <div class="form-group">
                  <label>Title<span class="class-required">*</span>
                  {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}
                 </label>
                 {{ Form::text('title_km',null, array('class' => 'form-control','placeholder'=>'Enter Title'))}}
                 <span class="class-error">{{$errors->first('title_km')}}</span>
                </div>

                <div class="form-group">
                  <label>Short Description {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</label>
                 {{ Form::textarea('desc_en',null, array('class' => 'form-control ce_editor','placeholder'=>'Enter description'))}}
                </div>
                 <div class="form-group">
                  <label>Short Description {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</label>
                 {{ Form::textarea('desc_km',null, array('class' => 'form-control ce_editor','placeholder'=>'Enter description'))}}
                </div>
                {{Form::submit('Create', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
 @endsection
