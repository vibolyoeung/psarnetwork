@extends('backend/layout') @section('title') Users @endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>User Role Play</li>
    </ul>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">User Role Play</h3>
            </div>
            <div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
                <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button"
                    data-original-title="">x</button>
                <p>{{Session::get('SECCESS_MESSAGE')}}</p>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered no-margin">
                        <thead>
                            <th>ID</th>
                            <th>
                                Name {{HTML::image("backend/images/lang-icons/en.png",'EN',array())}}
                            </th>
                            <th>
                                Name {{HTML::image("backend/images/lang-icons/km.png",'KM',array())}}
                            </th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($accountRole as $role)
                                <tr>
                                    <td>{{$role->rol_id}}</td>
                                    <td>{{$role->rol_name_en}}</td>
                                    <td>{{$role->rol_name_km}}</td>
                                    <td>
                                        <a 
                                            title="Edit"
                                            href="{{URL::to('admin/user-role-play/edit/')}}/{{$role->rol_id}}">
                                            <i class="icon-edit primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
