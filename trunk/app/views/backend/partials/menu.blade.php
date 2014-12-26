
<div class="navbar-header">
	<button class="navbar-toggle" type="button" data-toggle="collapse"
		data-target=".bs-navbar-collapse">
		<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
		<span class="icon-bar"></span> <span class="icon-bar"></span>
	</button>
	<a href="#" class="navbar-brand">&nbsp;</a>
</div>
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
	<ul class="nav navbar-nav">
		<li class="dropdown"><a href="#" class="dropdown-toggle"
			data-toggle="dropdown">General Setting <b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li><a href="{{URL::to('admin/pages')}}">Page</a></li>
			<li><a href="{{URL::to('admin/setting-list')}}">Setting</a></li>
		</ul>
		<li class="dropdown"><a href="#" class="dropdown-toggle"
			data-toggle="dropdown">User Management<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="{{URL::to('admin/users')}}">System User</a></li>
				<li><a href="#">Client User</a></li>
				<li><a href="{{URL::to('admin/user-group')}}">User Group</a></li>
				<li><a href="{{URL::to('admin/client-user-type')}}">Client User Type</a></li>
			</ul>
		</li>

		 <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product Management<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#">Product</a></li>
				<li><a href="{{URL::to('admin/categories')}}">Category</a></li>
			</ul>
		</li>

		</li>
		<li class="dropdown"><a href="#" class="dropdown-toggle"
			data-toggle="dropdown">Business Management <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="{{URL::to('admin/slideshows')}}">Slideshow</a></li>
				<li><a href="{{URL::to('admin/advertisements')}}">Advertisement</a></li>
				<li><a href="{{URL::to('admin/markets')}}">Super Market</a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="#" class="dropdown-toggle"
			data-toggle="dropdown">Report Management<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#">User Report</a></li>
				<li><a href="#">Product Report </a></li>
				<li><a href="#">Banner Report</a></li>
				<li><a href="#">Page Report</a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="#" class="dropdown-toggle"
			data-toggle="dropdown">Message Management<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li ><a href="#">New User Register</a></li>
				<li><a href="#">New User Expired </a></li>
				<li><a href="#">Page Expired</a></li>
				<li><a href="#">Page Updated</a></li>
				<li><a href="#">Banner New Register</a></li>
				<li><a href="#">Banner Expired</a></li>
				<li><a href="#">Product PIONT To New</a></li>
				<li><a href="#">Product PIONT TO update</a></li>
				<li><a href="#">Product PIONT TO Expired </a></li>
			</ul>
		</li>
	</ul>
<!-- Mini navigation start -->

