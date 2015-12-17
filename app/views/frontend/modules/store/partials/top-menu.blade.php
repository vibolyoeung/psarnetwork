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
								<a href="{{URL::to('products/create')}}">
									{{trans('member.add_new_product')}}
								</a>
							</li>
							<li>
								<a href="{{URL::to('products/list')}}">
									{{trans('member.product_management')}}
								</a>
							</li>
                            @if(Session::get('currentUserAccountType') == 2)
								<li>
									<a href="{{URL::to('member/userinfo/menu')}}">{{trans('member.enterprise_tool')}}</a>
								</li>
                            @endif
						<li>
							<a href="{{URL::to('member/userinfo/infomation')}}">{{trans('member.setting')}}</a>
						</li>
						<li role="presentation" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
							{{trans('member.myaccount')}}<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="{{URL::to('member/userinfo/infomation')}}">{{trans('member.view_profile_info')}}/a>
								</li>
								<li>
									<a href="{{URL::to('member/userinfo/summary')}}">{{trans('member.your_status')}}</a>
								</li>
								<li>
									<a href="{{URL::to('member/userinfo/infomation?pw=1#password')}}">{{trans('member.change_password')}}</a>
								</li>
								<li>
									<a href="{{URL::to('member/logout')}}"><i class="glyphicon glyphicon-off"></i>{{trans('member.log_out')}}</a>
								</li>
							</ul>
						</li>
						@else
						<li>
							<a href="#">{{trans('member.contact_us')}}</a>
						</li>
						<li>
							<a href="#">{{trans('member.about_us')}}	</a>
						</li>
						<li>
							<a href="#">{{trans('member.user_agreement')}}</a>
						</li>
						<li>
							<a href="#">{{trans('member.policy')}}</a>
						</li>
						<li>
							<a href="#">{{trans('member.usage')}}</a>
						</li>
						<li>
							<a href="{{Config::get('app.url')}}/member/login">{{trans('member.sign_in')}}/ </a>
						</li>
						<li>
							<a href="{{Config::get('app.url')}}/member/register">{{trans('member.free_register')}}</a>
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