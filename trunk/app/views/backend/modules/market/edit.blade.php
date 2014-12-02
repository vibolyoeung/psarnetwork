@extends('backend/layout')
@section('title')
	Edit
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/markets')}}">Markets</a></li>
		<li>Edit</li>
	</ul>
@endsection
@section('content')
	{{HTML::style('ce_editor/jquery.cleditor.css')}}
	{{HTML::script('ce_editor/jquery.js')}}
	{{HTML::script('ce_editor/jquery.cleditor.js')}}
	{{HTML::script('ce_editor/jquery.cleditor.min.js')}}
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
					<h3 class="panel-title">Edit</h3>
				</div>
				<div class="panel-body">
					{{Form::open(array('url'=>'admin/edit-market','enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Title En<span class="class-required">*</span></label>
						{{Form::text('title_en',$mk->title_en, array('class' => 'form-control','placeholder'=>'Enter Title En'))}}
						<span class="class-error">{{$errors->first('title_en')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Title Zh<span class="class-required">*</span></label>
						{{Form::text('title_zh',$mk->title_zh, array('class' => 'form-control','placeholder'=>'Enter Title Zh'))}}
						<span class="class-error">{{$errors->first('title_zh')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Provinces</label>
						{{ Form::select('province_id',$provinces, $mk->province_id , array('class' => 'form-control', 'id' => 'provinces'))}}
						<span class="class-error">{{$errors->first('province_id')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Districts</label>
						<select class="form-control" name="district_id" id="district_option">
							@foreach(Market::listingAllDistricts()->data as $district)
								<option <?php echo ($mk->district_id == $district->id) ? 'selected':'';?> value="{{$district->id}}">{{$district->dis_name}}</option>
							@endforeach


						</select>
						<span class="class-error">{{$errors->first('district_id')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Description En</label>
						{{ Form::textarea('desc_en',$mk->desc_en, array('class' => 'form-control ce_editor'))}}
					</div>

					<div class="form-group col-md-6 col-sm-6 col-xs-6">
						<label>Description Zh</label>
						{{ Form::textarea('desc_zh',$mk->desc_zh, array('class' => 'form-control ce_editor'))}}
					</div>

					<div class="form-group col-xs-12">
						<label>Image</label>
						{{ Form::file('file',array('class' => 'form-control'))}}
					</div>
					{{Form::hidden('id', $mk->id)}}
					<div class="form-group-col-xs-12">
						{{HTML::image("upload/market/thumb/".$mk->image,
								$mk->title_en,array())}}
					</div>
					<br/>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Amount of Stair<span class="class-required">*</span></label>
						{{Form::text('amount_stair',$mk->amount_stair, array('class' => 'form-control','placeholder'=>'Enter Amount of stair'))}}
						<span class="class-error">{{$errors->first('amount_stair')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						<label>Market Type<span class="class-required">*</span></label>
						{{ Form::select('market_type',$marketTypes,$mk->market_type , array('class' => 'form-control', 'id' => 'district_option'))}}
						<span class="class-error">{{$errors->first('amount_stair')}}</span>
					</div>

					<div class="form-group col-md-12">
						{{Form::submit('Update', array('class' => 'btn btn-success','name'=>'btnSubmit'))}}
						{{Form::close()}}
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

 @endsection
