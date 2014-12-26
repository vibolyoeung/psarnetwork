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
		<div class="col-md-1 thumbnail pull-rigt">
			<a href="#">
				<div class="caption">
					<h4 >Setting Front End</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Setting Back End</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>System User</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Client User</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>User <br/>Role</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Category</h4>
				</div>
			</a>
		</div>
		<div class="col-md-2 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Advertisment</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Bussiness Page</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Personal Page</h4>
				</div>
			</a>
		</div>
		<div class="col-md-1 thumbnail">
			<a href="#">
				<div class="caption">
					<h4>Report</h4>
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
						<li role="presentation">
							<a href="#product" aria-controls="product" role="tab" data-toggle="tab"><b>Product</b></a>
						</li>
						<li role="presentation">
							<a href="#banner" aria-controls="banner" role="tab" data-toggle="tab"><b>Banner</b></a>
						</li>
						<li role="presentation">
							<a href="#bs-page" aria-controls="bs-page" role="tab" data-toggle="tab"><b>BS-Page</b></a>
						</li>
						<li role="presentation">
							<a href="#ps-page" aria-controls="ps-page" role="tab" data-toggle="tab"><b>PS-Page</b></a>
						</li>
						<li role="presentation">
							<a href="#point-to" aria-controls="point-to" role="tab" data-toggle="tab"><b>POINT TO</b></a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="user">
							<br/>
							<p class="custom-border">
								<b>Total All Users Register : </b><b class="class-red">55300 Registers</b>
							</p>
							<p class="custom-border">
								<b>Active-User : </b><b class="class-red">5,5000  users </b>
							</p>
							<p class="custom-border">
								<b>User Expired : </b><b class="class-red">1000  users </b>
							</p>
							<p class="custom-border">
								<b>Deleted User : </b><b class="class-red">2000 users </b>
							</p>
							<p class="custom-border">
								<b>Active Phnom Penh : </b><b class="class-red">3,5000  users </b>
							</p>
							<p class="custom-border">
								<b>Active Other User : </b><b class="class-red">20000  users </b>
							</p>
						</div>
						<div role="tabpanel" class="tab-pane" id="product"><b>Product</b></div>
						<div role="tabpanel" class="tab-pane" id="banner">Banner</div>
						<div role="tabpanel" class="tab-pane" id="bs-page">BS-Page</div>
						<div role="tabpanel" class="tab-pane" id="ps-page">PS-Page</div>
						<div role="tabpanel" class="tab-pane" id="point-to">POINT TO</div>
					</div>
				</div>

			</div>
		</div>
		<div class="new-register-mg">
			<h4 class="color-h4">New Register Message</h4>
			<div class="mg-container">
				<table class="table table-bordered title-border">
					<tr id="new_product_post_title">
						<th>New Product Post Today <span class="class-red">8</span> <b class="caret"></b></th>
					</tr>
				</table>
				<table class="table table-bordered table-container" id="new_product_post">
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
				</table>
				<table class="table table-bordered title-border">
					<tr id="business_page_register_title">
						<th>Busines Page Register   <span class="class-red">8</span> <b class="caret"></b></th>
					</tr>
				</table>
				<table class="table table-bordered table-container" id="business_page_register">
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
				</table>

				<table class="table table-bordered title-border">
					<tr id="personal_page_register_title">
						<th>Personal Page Register  <span class="class-red">8</span> <b class="caret"></b></th>
					</tr>
				</table>
				<table class="table table-bordered table-container" id="personal_page_register">
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
				</table>

				<table class="table table-bordered title-border">
					<tr id="product_ads_title">
						<th>Product Ads   <span class="class-red">8</span> <b class="caret"></b></th>
					</tr>
				</table>
				<table class="table table-bordered table-container" id="product_ads">
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
				</table>

				<table class="table table-bordered title-border">
					<tr id="banners_ads_title">
						<th>Banners Ads  <span class="class-red">8</span> <b class="caret"></b></th>
					</tr>
				</table>
				<table class="table table-bordered table-container" id="banners_ads">
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
				</table>

				<table class="table table-bordered title-border">
					<tr id="point_to_title">
						<th>POINT TO Function  <span class="class-red">8</span> <b class="caret"></b></th>
					</tr>
				</table>
				<table class="table table-bordered table-container" id="point_to">
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>Price</td>
						<td>Page</td>
						<td>Page-url</td>
						<td>From User Name</td>
						<td>Location</td>
						<td>Phone</td>
						<td>Date</td>
					</tr>
				</table>
			</div>
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