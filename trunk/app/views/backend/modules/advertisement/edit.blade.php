@extends('backend/layout') @section('title') Create @endsection
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
	<li><a href="{{URL::to('admin/advertisements')}}">Advertisement</a></li>
	<li>Create</li>
</ul>
@endsection @section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<i class="icon-calendar"></i>
				<h3 class="panel-title">Client Information</h3>
			</div>
			<script>
			$(function() {
				var availableTags = ["{{$clients}}"];
				$( "#search_by_name" ).autocomplete({
					source: availableTags
				});

				var availableAdminUsers = ["{{$adminUsers}}"];
				$( "#incharger" ).autocomplete({
					source: availableAdminUsers
				});
			});
			</script>
			<div class="panel-body">
				{{Form::open(array('url'=>'admin/edit-advertisement','enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::radio('membership', '0', false)}} <label for="membership">None Member</label>
						{{Form::radio('membership', '1', true)}} <label for="membership">Member</label>
					</div>

					{{ Form::hidden('user_id', '', array('id' => 'user_id')) }}
					<div class="form-group col-md-6 col-sm-12 col-xs-6 search-by-name">
						{{Form::text('search_username',$advertisement->name, array('class' =>
						'form-control','placeholder'=>'Search by Name', 'id' => 'search_by_name'))}}
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('username',$advertisement->name, array('class' =>
						'form-control','placeholder'=>'Name', 'id' => 'username'))}}
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('address',$advertisement->address, array('class' =>
						'form-control','placeholder'=>'Address', 'id' => 'address'))}}
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('email',$advertisement->email, array('class' =>
						'form-control','placeholder'=>'Email', 'id' => 'email'))}}
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('phone',$advertisement->telephone, array('class' =>
						'form-control','placeholder'=>'Phone Number', 'id' => 'phone_number'))}}
					</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-------->
		<div id="content">
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#advertisement" data-toggle="tab">Advertisement Information</a></li>
				<li><a href="#product" data-toggle="tab">Product-Ads</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane active" id="advertisement">
					@include('backend.modules.advertisement.edit-advertisement')
				</div>
				<div class="tab-pane" id="product">
					@include('backend.modules.advertisement.edit-product')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
