@extends('backend/layout')
@section('title')
	Administration-Dashboard
@endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li>Dashboard</li>
	</ul>
@endsection
@section('content')
<div class="col-md-12">
	<div class="row well well-radius">
		<div class="col-md-1 thumbnail">
			<a href="{{URL::to('admin/front-end-setting')}}">
				<div class="caption">
					{{HTML::image('backend/images/icons/setting-front.png','Front End Setting')}}
					<strong>Front Setting</strong>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="{{URL::to('admin/back-end-setting')}}">
				<div class="caption">
					{{HTML::image('backend/images/icons/setting-back.png','Back End Setting')}}
					<strong>Back Setting</strong>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="{{URL::to('admin/users')}}">
				<div class="caption">
					{{HTML::image('backend/images/icons/system-user.png','System User')}}
					<strong>System User</strong>
					<span class="mg-number count-num">
						<?php 
							$countSystemUser = DB::table('user')
								->where('user_type', '!=', 4)
								->count(); 
							echo $countSystemUser;
						?>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="{{URL::to('admin/users/clients')}}">
				<div class="caption">
					{{HTML::image('backend/images/icons/client-user.png','Client User')}}
					<strong>Client User</strong>
					<span class="mg-number count-num">
						<?php 
							$countClientUser = DB::table('user')
								->where('user_type', '=', 4)
								->count(); 
							echo $countClientUser;
						?>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="{{URL::to('admin/user-group')}}">
				<div class="caption">
					{{HTML::image('backend/images/icons/user-group.png','User Group')}}
					<strong>User Group</strong>
					<span class="mg-number count-num">
						<?php 
							$countUserGroup = DB::table('user_type')
								->where('id', '!=', 4)
								->count(); 
							echo $countUserGroup;
						?>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="{{URL::to('admin/categories')}}">
				<div class="caption">
						{{HTML::image('backend/images/icons/category.png','Category')}}
						<strong>Category</strong>
						<span class="mg-number count-num">
						<?php 
							$countCategory = DB::table('m_category')
								->count(); 
							echo $countCategory;
						?>
						</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="{{URL::to('admin/products/free')}}">
				<div class="caption">
						{{HTML::image('backend/images/icons/product.png','Category')}}
						<strong>Product</strong>
						<span class="mg-number count-num">
						<?php 
							$countProduct = DB::table('product')
								->count(); 
							echo $countProduct;
						?>
						</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="{{URL::to('admin/advertisements')}}">
				<div class="caption">
					{{HTML::image('backend/images/icons/advertisment.png','Advertisement')}}
					<strong>Advertisment</strong>
					<span class="mg-number count-num">
						<?php 
							$countAdvertisment = DB::table('advertisement')
								->count(); 
							echo $countAdvertisment;
						?>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="#">
				<div class="caption">
					{{HTML::image('backend/images/icons/business-page.jpg','Business Page')}}
					<strong>Bussiness Page</strong>
					<span class="mg-number count-num">
						<?php 
							$countBusinessPage = DB::table('store as s')
								->join('user AS u', 'u.id','=', 's.user_id')
								->where('u.account_type', 2)
								->count(); 
							echo $countBusinessPage;
						?>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="#">
				<div class="caption">
					{{HTML::image('backend/images/icons/personal-page.png','Personal Page')}}
					<strong>Personal Page</strong>
					<span class="mg-number count-num">
						<?php 
							$countBusinessPage = DB::table('store as s')
								->join('user AS u', 'u.id','=', 's.user_id')
								->where('u.account_type', 1)
								->count(); 
							echo $countBusinessPage;
						?>
					</span>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail panel-position">
			<a href="#">
				<div class="caption">
					{{HTML::image('backend/images/icons/report.png','Report')}}
					<strong>Report</strong>
					<span class="mg-number count-num">5</span>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="current-information">
			<h4 class="color-h4">Current Information</h4>
			<div class="current-info-container">
				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#user" aria-controls="user" role="tab" data-toggle="tab"><b>User</b></a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="user">
							<br/>
							<p class="custom-border">
								<b>Total All Users Register : </b>
								<b class="class-red">
								<?php 
									$totalUsersRegister = DB::table('user')
										->where('account_type', '=', 2)
										->count(); 
									echo $totalUsersRegister;
								?> Users
								</b>
							</p>
							<p class="custom-border">
								<b>Active-User : </b>
								<b class="class-red">
								<?php 
									$totalActiveUsers = DB::table('user')
										->where('account_type', '=', 2)
										->where('status', '=', 1)
										->count(); 
									echo $totalActiveUsers;
								?> Users
								</b>
							</p>
							<p class="custom-border">
								<b>Active Phnom Penh : </b>
								<b class="class-red">
								<?php 
									$totalActivePhnomPenhUsers = DB::table('user')
										->where('account_type', '=', 2)
										->where('status', '=', 1)
										->where('province_id', '=', 1)
										->count(); 
									echo $totalActivePhnomPenhUsers;
								?> Users 
								</b>
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="new-register-mg">
			<h4 class="color-h4">New Register Message</h4>
			<div class="mg-container">
				<table class="table table-bordered title-border">
					<tr id="business_page_register_title">
						<th>
							Busines Page Register:
							<span class="class-red">
								<?php
									$businessPage = DB::table('store AS s')
								        ->join('user AS u', 'u.id','=', 's.user_id')
								        ->select(DB::raw('s.id as store_id, s.*, u.id as user_id, u.*'))
								        ->where('u.account_type', 2)
								        ->count();
								    echo $businessPage;
								?>
							</span>
						</th>
					</tr>
				</table>

				<table class="table table-bordered title-border">
					<tr id="personal_page_register_title">
						<th>
							Personal Page Register:  
							<span class="class-red">
								<?php
									$personalPage = DB::table('store AS s')
								        ->join('user AS u', 'u.id','=', 's.user_id')
								        ->select(DB::raw('s.id as store_id, s.*, u.id as user_id, u.*'))
								        ->where('u.account_type', 1)
								        ->count();
								    echo $personalPage;
								?>
							</span>
						</th>
					</tr>
				</table>

				<table class="table table-bordered title-border">
					<tr id="banners_ads_title">
						<th>
							Banners Ads: <span class="class-red">
								{{$totalBannerAds}}
							</span> 
						</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<h4 class="col-md-12 color-h4">Total User Register Today</h4>
<div class="col-md-12">
	<div class="row well well-radius">
		<?php 
			$today = date("Y-m-d"); 
			$usersToday = DB::table('user')
				->where('account_type', '=', 2)
				->where('create_at', '=', $today)
				->take(5)
				->orderBy('id', 'desc')
				->get(); 
		?>
		@foreach($usersToday as $userToday)
			<table class="table table-bordered">
				<tr>
					<th width="10%">
						{{HTML::image("backend/images/icons/user.png",'user',array('class'=>'img-circle','width'=>'70'))}}
					</th>
					<th width="20%">{{$userToday->name}}</th>
					<th width="20%">{{$userToday->email}}</th>
					<th width="15%">{{$userToday->telephone}}</th>
					<th width="15%">
						<?php 
							$provinceName = DB::table('province')
								->where('province_id', '=', $userToday->province_id)
								->first();
							if(!empty($provinceName)) {
								echo $provinceName->province_name_en;
							}
						?>
					</th>
					<th width="10%">{{$userToday->create_at}}</th>
					<th width="10%">
						<a 
							href="{{URL::to('admin/users/clients')}}"
						>
							Detail
						</a>
					</th>
				</tr>
			</table>
		@endforeach
	</div>
</div>
@endsection