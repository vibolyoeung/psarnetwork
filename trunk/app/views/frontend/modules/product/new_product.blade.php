@extends('frontend.modules.product.layout')
@section('title')
	Product Management
@endsection
	@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
	@endsection
@section('content')
	<div class="container">
		{{Form::open(array('class'=>'form-horizontal'))}}
			<div class="row">
				<div class="col-md-12 ">
					<div class="col-md-6">
						<div class="well">
							<div class="form-group">
								<label class="col-sm-2 control-label">Category</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Product Title
								</label>
								<div class="col-sm-10">
									{{Form::text('productTitle',null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Transfer as
								</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Condiction
								</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Product Status
								</label>
								<div class="col-sm-10">
									<select class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Price
								</label>
								<div class="col-sm-10">
									{{Form::text('productPrice', null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Price
								</label>
								<div class="col-sm-10">
									{{Form::textarea('desc', null, array('class'=>'form-control'))}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">
									Public
								</label>
								<div class="col-sm-10">
									<select name="isPublic" class="form-control">
										<option>Select</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="well">
							<div id="more_browse_field">
								<div class="form-group">
									<label class="col-sm-2 control-label">
										<i
											onClick="Product.add_more_fields()"
											class="glyphicon glyphicon-plus browse-picture"></i>
									</label>
									<div class="col-sm-10">
										<input type="file" name="picture[]" class="form-control" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		{{Form::close()}}
	</div>
@endsection
@section('footer')
	@include('frontend.modules.store.partials.footer');
@endsection