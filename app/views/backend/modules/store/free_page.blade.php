@extends('backend/layout') 
@section('title') Free Store @endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>Page</li>
    </ul>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form
                    action="{{URL::to('admin/stores/free')}}"
                    method="get"
                >
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>User Owner Page</label>
                            {{ Form::text(
                                'user_owner_page',
                                Input::get('user_owner_page'), 
                                array(
                                    'class' => 'form-control'
                                )
                            )}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Page Title</label>
                            {{ Form::text(
                                'page_title',
                                Input::get('page_title'), 
                                array(
                                    'class' => 'form-control'
                                )
                            )}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Create Date</label>
                            {{ Form::text(
                                'date_create',
                                Input::get('date_create'), 
                                array(
                                    'class' => 'form-control'
                                )
                            )}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Status</label>
                            {{Form::select(
                                'status', 
                                array(
                                    '' => 'Select',
                                    1 => 'Enable',
                                    2 => 'Disabled'
                                ),
                                Input::get('status'),
                                array('class' => 'form-control')
                            )}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input
                            name="btn_filter"
                            style="width:100%; margin-top:24px;"
                            type="submit" 
                            class="btn btn-primary"
                            value="Filter" 
                        />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Free Page List</h3>
            </div>
            <div class="panel-body">
            @if(Session::has('SMG_SUCCESS'))
                <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button"
                    data-original-title="">x</button>
                <p>{{Session::get('SMG_SUCCESS')}}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered no-margin">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">User Owner Page</th>
                            <th width="20%">Page Title</th>
                            <th width="20%">Create Date</th>
                            <th width="20%">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stores as $key => $store)
                            <tr>
                                <td>{{$key + 1 }}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->title_en}}</td>
                                <td>{{$store->create_at}}</td>
                                <td>
                                    @if($store->status === 1)
                                        <span class="label label-success">Enable</span>
                                    @else
                                        <span class="label label-danger">Disabled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{URL::to('admin/stores/status')}}/free/{{$store->user_id}}/2">Disabled</a> |
                                    <a href="{{URL::to('admin/stores/status')}}/free/{{$store->user_id}}/1">Enable</a> 
                                    <!-- <a 
                                        href="{{URL::to('admin/stores/delete')}}/free/{{$store->user_id}}/{{$store->store_id}}"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                    >
                                        Delete
                                    </a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$stores->links()}}
        </div>
    </div>
    </div>
</div>
 @endsection
