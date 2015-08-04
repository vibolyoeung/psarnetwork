@extends('backend/layout') 
@section('title') Premium Products @endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>Products</li>
    </ul>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Title</label>
                            <input 
                                type="text" 
                                class="form-control" 
                            />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Client Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                            />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Create Date</label>
                            <input 
                                type="text" 
                                class="form-control" 
                            />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option>Enable</option>
                                <option>Disabled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input
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
            <h3 class="panel-title">Premium Product List</h3>
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
                    <th width="2%">#</th>
                    <th width="10%">Picture</th>
                    <th width="15%">Title</th>
                    <th width="20%">Client Name</th>
                    <th width="20%">Create Date</th>
                    <th width="15%">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key=>$product)
                    <tr>
                        <td>{{$key + 1 }}</td>
                        <td>
                        {{HTML::image("upload/product/thumb/$product->thumbnail",$product->title,array('class' => 'img-rounded','width'=>'100'))}}
                        </td>
                        <td>{{$product->title}}</td>
                        <td>
                            <p>{{$product->name}}</p>
                            <p>{{$product->email}}</p>
                        </td>
                        <td>{{$product->publish_date}}</td>
                        <td>
                            @if($product->admin_status === 1)
                                <span class="label label-success">Enable</span>
                            @else
                                <span class="label label-danger">Disabled</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('admin/products/status')}}/premium/{{$product->pro_id}}/2">Disabled</a> |
                            <a href="{{URL::to('admin/products/status')}}/premium/{{$product->pro_id}}/1">Enable</a> | 
                            <a 
                                href="{{URL::to('admin/products/delete')}}/premium/{{$product->pro_id}}"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
{{$products->links()}}
</div>
</div>
</div>
</div>
 @endsection
