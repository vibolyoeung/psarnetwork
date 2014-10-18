@extends('backend/layout') @section('title') Slideshows @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Slideshows</li>
	</ul>
@endsection @section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<a href="{{URL::to('admin/create-slideshow')}}"> <i class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i> </a>
				<h3 class="panel-title">Slideshows</h3>
			</div>
			<div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
				<div class="alert alert-block alert-success fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('SECCESS_MESSAGE')}}</p>
				</div>
				@elseif(Session::has('ERROR_MESSAGE'))
				<div class="alert alert-block alert-danger fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('ERROR_MESSAGE')}}</p>
				</div>
				@endif <br />
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Page Title</th>
								<th>Created Date</th>
								<th>Expire Date</th>
								<th class="class-center">Status</th>
								<th>Advertiser</th>
								<th class="class-center">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1;?>
							@foreach($slideshows->data as $slideshow)
							<tr>
								<td>{{$i}}</td>
								<td width="9%">{{HTML::image("upload/slideshow/thumb/".$slideshow->image,
								$slideshow->title,array())}}</td>
								<td>{{$slideshow->title}}</td>
								<td>{{$slideshow->created_date}}</td>
								<td>{{$slideshow->expire_date}}</td>
								<td align="center" width="3%"><a
									href='{{URL::to("admin/status-slideshow")}}/{{$slideshow->id}}/{{$slideshow->status}}'>
								@if($slideshow->status == 1) <span class="icon-ok success"></span>
								@else <span class="icon-remove danger"></span> @endif </a></td>
								<td>
									@if(!empty($slideshow->name))
										Name : {{$slideshow->name}}<br/>
										Email: {{$slideshow->email}}<br/>
										Te : {{$slideshow->phone}}<br/>
										Address : {{$slideshow->address}}
									@else
										Admin
									@endif
								</td>
								<td align="center"><a title="Edit"
									href="{{URL::to('admin/edit-slideshow')}}/{{$slideshow->id}}"><i
									class="icon-edit primary"></i></a> <a title="Delete"
									href="{{URL::to('admin/delete-slideshow')}}/{{$slideshow->id}}"
									onclick="return confirm('Are you sure you want to delete this item?');"><i
									class='icon-trash danger'></i></a></td>
							</tr>
							<?php $i++;?>
							@endforeach
						</tbody>

					</table>
				</div>
				{{$slideshows->data->links()}}

			</div>
		</div>
	</div>
</div>
@endsection
