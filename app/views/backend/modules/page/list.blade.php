@extends('backend/layout')
@section('title')
    Pages
@endsection
@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
        <li>Pages</li>
    </ul>
@endsection
@section('content')
@if(Session::has('SECCESS_MESSAGE'))
            <div class="alert alert-block alert-success fade in">
                <button data-dismiss="alert" class="close" type="button" data-original-title="">
                  x
                </button>
                <p>{{Session::get('SECCESS_MESSAGE')}}</p>
              </div>
              @endif
              @if(Session::has('ERROR_MODIFY_MESSAGE'))
        <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close" type="button"
          data-original-title="">x</button>
        <p>{{Session::get('ERROR_MODIFY_MESSAGE')}}</p>
        </div>
        @endif
        <br />
<div class="row">
        <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
            <a href="{{URL::to('admin/create-page/2')}}">
              <i class="icon-plus btn btn-xs btn-info rounded-buttons" >&nbsp;Add</i>
             </a>
             <h3 class="panel-title">Default Pages For KhmerAbba Website</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Page Title {{HTML::image("backend/images/lang-icons/en.png",'EN',array())}}</th>
                      <th>Page Title {{HTML::image("backend/images/lang-icons/km.png",'KM',array())}}</th>
                      <th>Created Date</th>
                      <th>Modified Date</th>
                      <th>Position</th>
                      <th class="class-center">Status</th>
                      <th class="class-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  		<?php $i=1;?>
                  		@foreach($pagesForWebsite as $pageForWebsite)
                  			<tr>
                  				<td>{{$i}}</td>
                  				<td>{{$pageForWebsite->title_en}}</td>
                  				<td>{{$pageForWebsite->title_km}}</td>
                  				<td>{{$pageForWebsite->create_at}}</td>
                          <td>{{$pageForWebsite->update_at}}</td>
                  				<td>
                              @if ($pageForWebsite->position == 2)
                                Bottom
                              @else
                                Top
                              @endif    
                          </td>
                  				<td align="center">
                  					<a
                  						href='{{URL::to("admin/status-page")}}/{{$pageForWebsite->status}}/{{$pageForWebsite->id}}'>
                  						@if($pageForWebsite->status == 1)
                  							<span class="icon-ok success"></span>
                  						@else
                  							<span class="icon-remove danger"></span>
                  						@endif

                  					</a>
                  				</td>
                  				<td align="center">
	                  				<a
	                  					title="Edit"
	                  					href="{{URL::to('admin/edit-page')}}/{{$pageForWebsite->id}}/2" >
	                  					<i class="icon-edit primary"></i>
	                  				</a>
	                  				<a
	                  					title="Delete"
	                  					href="{{URL::to('admin/delete-page')}}/{{$pageForWebsite->id}}"
	                  					onclick="return confirm('Are you sure you want to delete this item?');">
	                  					<i class='icon-trash danger'></i>
	                  				</a>
	                  			</td>
                  			</tr>
                  			<?php $i++;?>
                  		@endforeach
                  </tbody>

                </table>
              </div>
              {{$pagesForWebsite->links()}}
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-sx-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
            <a href="{{URL::to('admin/create-page/1')}}">
              <i class="icon-plus btn btn-xs btn-info rounded-buttons" >&nbsp;Add</i>
             </a>
             <h3 class="panel-title">Default Pages For User</h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Page Title {{HTML::image("backend/images/lang-icons/en.png",'EN',array())}}</th>
                      <th>Page Title {{HTML::image("backend/images/lang-icons/km.png",'KM',array())}}</th>
                      <th>Created Date</th>
                      <th>Modified Date</th>
                      <th class="class-center">Status</th>
                      <th class="class-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1;?>
                      @foreach($pagesForUser as $pageForUser)
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$pageForUser->title_en}}</td>
                          <td>{{$pageForUser->title_km}}</td>
                          <td>{{$pageForUser->create_at}}</td>
                          <td>{{$pageForUser->update_at}}</td>
                          <td align="center">
                            <a
                              href='{{URL::to("admin/status-page")}}/{{$pageForUser->status}}/{{$pageForUser->id}}'>
                              @if($pageForUser->status == 1)
                                <span class="icon-ok success"></span>
                              @else
                                <span class="icon-remove danger"></span>
                              @endif

                            </a>
                          </td>
                          <td align="center">
                            <a
                              title="Edit"
                              href="{{URL::to('admin/edit-page')}}/{{$pageForUser->id}}/1" >
                              <i class="icon-edit primary"></i>
                            </a>
                            <a
                              title="Delete"
                              href="{{URL::to('admin/delete-page')}}/{{$pageForUser->id}}"
                              onclick="return confirm('Are you sure you want to delete this item?');">
                              <i class='icon-trash danger'></i>
                            </a>
                          </td>
                        </tr>
                        <?php $i++;?>
                      @endforeach
                  </tbody>

                </table>
              </div>
              {{$pagesForUser->links()}}
            </div>
          </div>
        </div>
      </div>
 @endsection