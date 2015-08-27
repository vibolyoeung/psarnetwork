@extends('backend/layout') @section('title') Users @endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>
            <a href="{{URL::to('admin/user-role-play')}}">User Role Play</a>
        </li>
        <li>Edit</li>
    </ul>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Edit</h3>
            </div>
            <div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
                <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button"
                    data-original-title="">x</button>
                <p>{{Session::get('SECCESS_MESSAGE')}}</p>
                </div>
                @endif
                <div class="table-responsive">
                    {{Form::open(array('url'=>"admin/user-role-play/edit/{$editData->rol_id}"))}}
                        <div class="form-group">
                            <label>Name {{HTML::image("backend/images/lang-icons/en.png",'En',array())}}</label>
                            {{ Form::text(
                                'name_en',
                                $editData->rol_name_en, 
                                array(
                                    'class' =>'form-control',
                                    'placeholder'=>'Enter Name English'
                                )
                            )}}
                        </div>
                        <div class="form-group">
                            <label>Name {{HTML::image("backend/images/lang-icons/km.png",'Km',array())}}</label>
                            {{ Form::text(
                                'name_km',
                                $editData->rol_name_km, 
                                array(
                                    'class' =>'form-control',
                                    'placeholder'=>'Enter Name Khmer'
                                )
                            )}}
                        </div>
                        {{Form::submit(
                            'Save', 
                            array(
                                'class' => 'btn btn-success',
                                'name'=>'btnSubmit'
                            )
                        )}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
