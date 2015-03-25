<div class="header_top">
	<!--header_top-->
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="contactinfo">
					<ul class="nav nav-pills">
						<li class="user-home">
							<a href="{{Config::get('app.url')}}" taget="_blank">www.psarkhmer.com</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="social-icons pull-right ">
					<ul class="nav navbar-nav">
						@if(Session::get('currentUserId'))
						<li>
							<a href="#">Add New Products</a>
						</li>
						<li>
							<a href="#">Product Management</a>
						</li>
						<li>
							<a href="{{URL::to('member/userinfo/menu')}}">Enterprise Tool</a>
						</li>
						<li>
							<a href="{{URL::to('member/userinfo/infomation')}}">Setting</a>
						</li>
						<li role="presentation" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							My Account <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="#">View Profile info</a>
								</li>
								<li>
									<a href="#">Your Status</a>
								</li>
								<li>
									<a href="#">Chage Password</a>
								</li>
								<li>
									<a href="{{URL::to('logout')}}"><i class="fa fa-power-off"></i> Log out</a>
								</li>
							</ul>
						</li>
						@else
						<li>
							<a href="#">Contact us</a>
						</li>
						<li>
							<a href="#">About us</a>
						</li>
						<li>
							<a href="#">User Agreement</a>
						</li>
						<li>
							<a href="#">Policy</a>
						</li>
						<li>
							<a href="#">Usage</a>
						</li>
						<li>
							<a href="{{Config::get('app.url')}}/member/login">Sign in / </a>
						</li>
						<li>
							<a href="{{Config::get('app.url')}}/member/register">Free Register</a>
						</li>
						@endif
					</ul>
					<div class="language-bar">
						<a href="{{Config::get('app.url')}}?lang=en">
						<img src="{{Config::get('app.url')}}/frontend/images/en.png" alt="" title="" />
						English
						</a>
						<a href="{{Config::get('app.url')}}?lang=km">
						<img src="{{Config::get('app.url')}}/frontend/images/km.png" alt="" title="" />
						Khmer
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>