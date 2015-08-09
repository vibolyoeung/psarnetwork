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
<h4 class="col-md-12 color-h4">Total User Register Today</h4>
<div class="col-md-12">
	<div class="row well well-radius">
		<table class="table table-bordered">
			<tr>
				<th width="10">{{HTML::image("backend/images/icons/user.png",'user',array('class'=>'img-circle','width'=>'70'))}}</th>
				<th>KOCH DOEUN</th>
				<th>doeunkoch@gmail.com</th>
				<th>0972793573</th>
				<th>Phnom Penh</th>
				<th>21 hours ago</th>
				<th><a href="">Detail</a></th>
			</tr>
		</table>
		<table class="table table-bordered">
			<tr>
				<th width="10">{{HTML::image("backend/images/icons/user.png",'user',array('class'=>'img-circle','width'=>'70'))}}</th>
				<th>KOCH DOEUN</th>
				<th>doeunkoch@gmail.com</th>
				<th>0972793573</th>
				<th>Phnom Penh</th>
				<th>21 hours ago</th>
				<th><a href="">Detail</a></th>
			</tr>
		</table>
		<table class="table table-bordered">
			<tr>
				<th width="10">{{HTML::image("backend/images/icons/user.png",'user',array('class'=>'img-circle','width'=>'70'))}}</th>
				<th>KOCH DOEUN</th>
				<th>doeunkoch@gmail.com</th>
				<th>0972793573</th>
				<th>Phnom Penh</th>
				<th>21 hours ago</th>
				<th><a href="">Detail</a></th>
			</tr>
		</table>
		<table class="table table-bordered">
			<tr>
				<th width="10">{{HTML::image("backend/images/icons/user.png",'user',array('class'=>'img-circle','width'=>'70'))}}</th>
				<th>KOCH DOEUN</th>
				<th>doeunkoch@gmail.com</th>
				<th>0972793573</th>
				<th>Phnom Penh</th>
				<th>21 hours ago</th>
				<th><a href="">Detail</a></th>
			</tr>
		</table>
		<table class="table table-bordered">
			<tr>
				<th width="10">{{HTML::image("backend/images/icons/user.png",'user',array('class'=>'img-circle','width'=>'70'))}}</th>
				<th>KOCH DOEUN</th>
				<th>doeunkoch@gmail.com</th>
				<th>0972793573</th>
				<th>Phnom Penh</th>
				<th>21 hours ago</th>
				<th><a href="">Detail</a></th>
			</tr>
		</table>
	</div>
</div>
@endsection