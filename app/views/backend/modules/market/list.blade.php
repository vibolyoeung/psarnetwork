@extends('backend/layout') @section('title') Market @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li>Markets</li>
	</ul>
@endsection
@section('content')
{{HTML::script('backend/js/filter.js')}}
<div class="row">
<div class="col-md-12 col-sm-12 col-sx-12">
<div class="panel panel-default">
<div class="panel-heading clearfix"><a
	href="{{URL::to('admin/create-market')}}"> <i
	class="icon-plus btn btn-xs btn-info rounded-buttons">&nbsp;Add</i> </a>
<h3 class="panel-title">Markets</h3>
</div>
<div class="panel-body">@if(Session::has('SECCESS_MESSAGE'))
<div class="alert alert-block alert-success fade in">
<button data-dismiss="alert" class="close" type="button"
	data-original-title="">x</button>
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
<div class="table-responsive">
<table class="table table-bordered no-margin">
	<thead>
		<tr>
			<th>#</th>
			<th>Images</th>
			<th>Market Title En</th>
			<th>Market Title Zh</th>
			<th>Amount Of Stair</th>
			<th>Business-Market-Type</th>
			<th class="class-center">Action</th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<th>{{Form::text('filter_name_en',null,array('class' =>'form-control','id'=>'filter_name_en'))}}</th>
			<th>{{Form::text('filter_name_zh',null,array('class' =>'form-control','id'=>'filter_name_zh'))}}</th>
			<th>{{Form::text('filter_stair',null,array('class' =>'form-control','id'=>'filter_stair'))}}</th>
			<th>{{Form::select('filter_market_type',$marketType,'key', array('class' =>'form-control','id'=>'filter_market_type'))}}</th>
			<th class="class-center">{{Form::submit('Filter', array('class' => 'btn btn-success','name'=>'btnFilter','id'=>'btn_filter_market'))}}</th>
		</tr>
	</thead>
	<tbody id="result_filter_market">
	<?php $i = 1;?>
		@foreach($markets as $mk)
		<tr>
			<td>{{$i}}</td>
			<td width="9%">{{HTML::image("upload/market/thumb/".$mk->image,
			$mk->title_en,array())}}</td>
			<td>{{$mk->title_en}}</td>
			<td>{{$mk->title_zh}}</td>
			<td width="10%">{{$mk->amount_stair}}</td>
			<td width="11%">
				{{$marketType[$mk->market_type]}}
			</td>
			<td align="center"><a title="Edit"
				href="{{URL::to('admin/edit-market')}}/{{$mk->id}}"> <i
				class="icon-edit primary"></i> </a>
				<a title="Delete"
				href="{{URL::to('admin/delete-market')}}/{{$mk->id}}"
				onclick="return confirm('Are you sure you want to delete this item?');">
				<i class='icon-trash danger'></i> </a>
			</td>
		</tr>
		<?php $i++;?>
		@endforeach
	</tbody>

</table>
</div>
{{$markets->links()}}</div>
</div>
</div>
</div>
 @endsection