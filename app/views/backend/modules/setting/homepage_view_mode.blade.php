
@extends('backend/layout') @section('title') Setting @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
		<li><a href="{{URL::to('admin/front-end-setting')}}">Setting</a></li>
		<li>Home Page View Mode</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-sx-12">
		<div class="panel panel-default">
			<div class="panel-body">
			@if(Session::has('SECCESS_MESSAGE'))
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
				<div class="table-responsive">
				{{Form::open(array('url'=>'admin/front-end-setting/view-mode'))}}
					<table class="table table-bordered no-margin">
						<tr>
							<th>
							{{ Form::select(
								'enterprise_store',
								array(
									''=>'Display Enterprise Store',
									1 => '1 Row',
									2 => '2 Row',
									3 => '3 Row',
									4 => '4 Row',
									5 => '5 Row',
									6 => '6 Row',
									7 => '7 Row',
									8 => '8 Row',
									9 => '9 Row',
									10 => '10 Row',
								),
								$enterPriseViewMode->setting_value , 
								array('class' => 'form-control'))
							}}
							</th>
							<th>
							{{ Form::select(
								'buyer_request',
								array(
									''=>'Display Buyer Request',
									1 => '1 Row',
									2 => '2 Row',
									3 => '3 Row',
									4 => '4 Row',
									5 => '5 Row',
									6 => '6 Row',
									7 => '7 Row',
									8 => '8 Row',
									9 => '9 Row',
									10 => '10 Row',
								),
								$buyerRequestViewMode->setting_value , 
								array('class' => 'form-control'))
							}}
							</th>
							<th>
							{{ Form::select(
								'latest_product',
								array(
									''=>'Display Latest Products',
									1 => '1 Row',
									2 => '2 Row',
									3 => '3 Row',
									4 => '4 Row',
									5 => '5 Row',
									6 => '6 Row',
									7 => '7 Row',
									8 => '8 Row',
									9 => '9 Row',
									10 => '10 Row',
								),
								$latestProductViewMode->setting_value , 
								array('class' => 'form-control'))
							}}
							</th>
							<th width="300">
								{{Form::submit('Save', array('class' =>'btn btn-success','name'=>'btnSubmit'))}}
							</th>
						</tr>
					</table>
				 {{Form::close()}}
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection