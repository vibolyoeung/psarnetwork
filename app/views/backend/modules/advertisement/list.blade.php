@extends('backend/layout') @section('title') advertisements @endsection
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
	<li>Slideshow</li>
</ul>
@endsection @section('content')
<div class="row">

	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<a href="{{URL::to('admin/create_advertisement')}}"> <i
					class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i>
				</a>
				<h3 class="panel-title">Advertisement</h3>
			</div>
			<div class="panel-body">
				@if(Session::has('SECCESS_MESSAGE'))
				<div class="alert alert-block alert-success fade in">
					<button data-dismiss="alert" class="close" type="button"
						data-original-title="">x</button>
					<p>{{Session::get('SECCESS_MESSAGE')}}</p>
				</div>
				@endif <br />
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Link url</th>
								<th>Page</th>
								<th>Position</th>
								<th class="class-center">Status</th>
								<th class="class-center">Action</th>
							</tr>
						</thead>
						<tbody>
                  		<?php $i=1;?>
                  		@foreach($advertisements->data as $advertisement)
                  			<tr>
								<td>{{$i}}</td>
								<td>{{$advertisement->image}}</td>
								<td width="9%">{{HTML::image("upload/advertisement/thumb/".$advertisement->image,
								$advertisement->title,array())}}</td>
								<td>{{$advertisement->title}}</td>
								<td>{{$advertisement->description}}</td>
								<td>{{$advertisement->link_url}}</td>
								<td>{{$advertisement->pageName}}</td>
								<td>{{$advertisement->positionName}}</td>
								<td align="center"><a
									href='{{URL::to("admin/status_advertisement")}}/{{$advertisement->status}}/{{$advertisement->id}}'>
										@if($advertisement->status == 1) <span class="icon-ok success"></span>
										@else <span class="icon-remove danger"></span> @endif

								</a></td>
								<td align="center"><a title="Edit"
									href="{{URL::to('admin/edit-advertisement')}}/{{$advertisement->id}}"><i
										class="icon-edit primary"></i></a> <a title="Delete"
									href="{{URL::to('admin/delete-advertisement')}}/{{$advertisement->id}}"
									onclick="return confirm('Are you sure you want to delete this item?');"><i
										class='icon-trash danger'></i></a></td>
							</tr>
                  			<?php $i++;?>
                  		@endforeach
                  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
