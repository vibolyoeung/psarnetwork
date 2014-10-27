@extends('backend/layout') @section('title') dashboard @endsection
@section('breadcrumb')
	<ul class="breadcrumb">
		<li>Dashboard</li>
	</ul>
@endsection
@section('content')
<div class="row">
	<div class="col-md-2 col-sm-2 col-sx-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Clients</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
				{{HTML::image('backend/images/icons/clients.png','Clients', array('class'=>'control-image'))}}
			</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="sales"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Categories</h3>
			</div>
			<div class="panel-body">
			<div class="daily-stats">
				{{HTML::image('backend/images/icons/category-icon.png','Category', array('class'=>'control-image'))}}
			</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
			<span class="pull-right" id="products"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Products</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
					{{HTML::image('backend/images/icons/product-icon.png','Products', array('class'=>'control-image'))}}
				</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="conversion-rate"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Advertisements</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
					{{HTML::image('backend/images/icons/advertisement-icon.png','Advertisement', array('class'=>'control-image'))}}
				</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="new-users"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Slideshows</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
					{{HTML::image('backend/images/icons/slideshow-con.jpg','Slideshow', array('class'=>'control-image'))}}
				</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="new-users"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Settings</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
					 {{HTML::image('backend/images/icons/setting-icon.png','Setting', array('class'=>'control-image'))}}
				</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="new-users"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Reports</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
					{{HTML::image('backend/images/icons/report-icon.jpg','Reports', array('class'=>'control-image'))}}
				</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="new-users"></span>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title">Supper Markets</h3>
			</div>
			<div class="panel-body">
				<div class="daily-stats">
					 {{HTML::image('backend/images/icons/super-market.jpg','Super Market', array('class'=>'control-image'))}}
				</div>
			</div>
			<div class="panel-footer clearfix">
				<a href="#" class="pull-left">View more...</a>
				<span class="pull-right" id="new-users"></span>
			</div>
		</div>
	</div>
 </div>
<!-- Row end -->

<!-- Row start -->
<div class="row">
	<div class="col-md-12 col-sx-12 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix"><i class="icon-twitter"></i>
				<h3 class="panel-title">Top 5 Clients</h3>
			</div>
			<div class="panel-sub-heading"><a href="#">Last week chart</a></div>
			<div class="panel-body">
				<div class="tweets-container">
					<div class="tweet-box"><img class="avatar" alt="" src="./img/avatar-2.png" />
						<div class="tweet">
							<p><span>@sri</span> mentioned you</p>
							<p><span>@ha haa</span> Cultivate synergies?</p>
						<div class="icons-nav clearfix"><span class="time">2mins ago</span> <i
							class="icon-trash"></i>
						</div>
						</div>
					</div>
					<div class="tweet-box"><img class="avatar" alt="" src="./img/avatar-1.png" />
					<div class="tweet">
					<p><span>@sandy</span> mentioned you</p>
					<p><span>@ha haa</span> Latform cultivate?</p>
					<div class="icons-nav clearfix"><span class="time">9 hours ago</span> <i
						class="icon-trash"></i></div>
					</div>
					</div>
					<div class="tweet-box no-margin"><img class="avatar" alt=""
						src="./img/avatar-3.png" />
					<div class="tweet">
					<p><span>@haasini</span> mentioned you</p>
					<p><span>@ha haa</span> Eyeballs atformsvate?</p>
					<div class="icons-nav clearfix"><span class="time">3 days ago</span> <i
						class="icon-trash"></i></div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Row end -->

@endsection