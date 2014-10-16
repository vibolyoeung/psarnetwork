@extends('backend/layout')
@section('title')
    Pages
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>Slideshow</li>
    </ul>
@endsection
@section('content')
<div class="row">
		
        <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
            <a href="{{URL::to('admin/create_page')}}">
              <i class="icon-plus btn btn-xs btn-info rounded-buttons" >&nbsp;Add</i>
             </a>
             <h3 class="panel-title">Slideshow</h3>
            </div>
            <div class="panel-body">
            @if(Session::has('SECCESS_MESSAGE'))
            <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button" data-original-title="">
                  x
                </button>
                <p>{{Session::get('SECCESS_MESSAGE')}}</p>
              </div>
              @endif
              <br />
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Page Title</th>
                      <th>Created Date</th>
                      <th>Modified Date</th>
                      <th class="class-center">Status</th>
                      <th class="class-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  		<?php $i=1;?>
                  		@foreach($pages as $page)
                  			<tr>
                  				<td>{{$i}}</td>
                  				<td>{{$page->title}}</td>
                  				<td>{{$page->create_at}}</td>
                  				<td>{{$page->update_at}}</td>
                  				<td align="center">
                  					<a href='{{URL::to("admin/status_page")}}/{{$page->status}}/{{$page->id}}'>
                  						@if($page->status == 1)
                  							<span class="icon-ok success"></span>
                  						@else
                  							<span class="icon-remove danger"></span>
                  						@endif
                  					
                  					</a>
                  				</td>
                  				<td align="center">
	                  				<a title="Edit" href="{{URL::to('admin/edit_page')}}/{{$page->id}}" ><i class="icon-edit primary"></i></a>
	                  				<a title="Delete" href="{{URL::to('admin/delete_page')}}/{{$page->id}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class='icon-trash danger'></i></a>
	                  			</td>
                  			</tr>
                  			<?php $i++;?>
                  		@endforeach
                  </tbody>
                  
                </table>
              </div>
              {{$pages->links()}}
            </div>
          </div>
        </div>
      </div>
 @endsection