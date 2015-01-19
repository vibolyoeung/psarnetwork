<div class="logo" style="padding:29px 20px;">
	<a href="{{URL::to('admin/dashboard')}}">{{HTML::image('backend/images/icons/home.png','Home')}}</a>
</div>

<!-- Icon nav start -->
<div class="top-message">
	<div class="class-account">
		<ul>
			<li class="dropdown"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown"><i class="icon-user"></i>
					@if(Session::has('SESSION_LOGIN_NAME'))
					{{Session::get('SESSION_LOGIN_NAME')}} @endif <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a
							href="{{URL::to('admin/profile')}}">
							My Profile
						</a>
					</li>
					<li>
						<a
							href="{{URL::to('admin/change-password')}}">
							Change Password
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a
							href="{{URL::to('admin/logout')}}">
							Logout
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="class-message">
		<label>Message</label>
		<span class="mg-number">5</span>
		<b class="caret"></b>
		<ul class="message-list">
			<li><a href="#">Message One</a></li>
			<li><a href="#">Message Two</a></li>
		</ul>
	</div>
	<div class="class-alert">
		<label>Alert</label>
		<span class="mg-number">1</span>
		<b class="caret"></b>
		<ul class="alert-list">
			<li><a href="#">Alert One</a></li>
			<li><a href="#">Alert Two</a></li>
		</ul>
	</div>
</div>
<!-- Icon nav end -->



