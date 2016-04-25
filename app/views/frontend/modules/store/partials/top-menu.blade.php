<div class="header_top">
	<!--header_top-->
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-3">
				<div class="hidden-lg hidden-md hidden-sm">
					<a href="{{Config::get('app.url')}}">
						<img
						src="{{Config::get('app.url')}}frontend/images/Responsive-logo.png"
						class="img-responsive" />
					</a>
				</div>
				<div class="contactinfo hidden-xs">
					<ul class="nav nav-pills">
						<li class="facebook-like hidden-xs" style="padding:0;margin:0;">
							<div class="fb-like" data-href="https://www.facebook.com/khmerabba?ref=hl" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xs-8 col-sm-9">
				<div class="social-icons pull-right">
					<ul class="nav navbar-nav hidden-xs">
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
	<div class="col-xs-12 hidden-sm hidden-md hidden-lg" style="padding:0;background-color:#285ea0;">
			<ul class="nav navbar-nav" style="padding:0;margin:0;">
					<li role="presentation" class="dropdown">
						<a style="padding:0;margin:0;color:#fff;border-top:1px solid #fff;" class="dropdown-toggle text-right" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown_user_menu" role="menu">
							@if(Session::get('currentUserId'))
							<li>
								<a href="{{URL::to('products/create')}}" style="color:#fff;" >
									{{trans('member.add_new_product')}}
								</a>
							</li>
							<li>
								<a href="{{URL::to('products/list')}}" style="color:#fff;" >
									{{trans('member.product_management')}}
								</a>
							</li>
	                        @if(Session::get('currentUserAccountType') == 2)
								<li>
									<a style="color:#fff;"  href="{{URL::to('member/userinfo/menu')}}">{{trans('member.enterprise_tool')}}</a>
								</li>
	                        @endif

							<li>
								<a style="color:#fff;"  href="{{URL::to('member/userinfo/infomation')}}"><b>{{trans('member.myaccount')}}</b></a>
							</li>
							<li>
								<a style="color:#fff;"  href="{{URL::to('member/userinfo/infomation')}}">&nbsp;&nbsp;&nbsp;{{trans('member.setting')}}</a>
							</li>
							<li>
								<a  style="color:#fff;"  href="{{URL::to('member/userinfo/infomation')}}">&nbsp;&nbsp;&nbsp;{{trans('member.view_profile_info')}}</a>
							</li>
							<li>
								<a style="color:#fff;"  href="{{URL::to('member/userinfo/summary')}}">&nbsp;&nbsp;&nbsp;{{trans('member.your_status')}}</a>
							</li>
							<li>
								<a style="color:#fff;"  href="{{URL::to('member/userinfo/infomation?pw=1#password')}}">&nbsp;&nbsp;&nbsp;{{trans('member.change_password')}}</a>
							</li>
							<li>
								<a style="color:#fff;"  href="{{URL::to('member/logout')}}"><i class="glyphicon glyphicon-off"></i>&nbsp;&nbsp;&nbsp;{{trans('member.log_out')}}</a>
							</li>
						</ul>
					</li>
					@else
					<li>
						<a style="color:#fff;"  href="#">{{trans('member.contact_us')}}</a>
					</li>
					<li>
						<a style="color:#fff;"  href="#">{{trans('member.about_us')}}</a>
					</li>
					<li>
						<a  style="color:#fff;"  href="#">{{trans('member.user_agreement')}}</a>
					</li>
					<li>
						<a style="color:#fff;"  href="#">{{trans('member.policy')}}</a>
					</li>
					<li>
						<a style="color:#fff;"  href="#">{{trans('member.usage')}}</a>
					</li>
					<li>
						<a style="color:#fff;"  href="{{Config::get('app.url')}}/member/login">{{trans('member.sign_in')}}/ </a>
					</li>
					<li>
						<a style="color:#fff;"  href="{{Config::get('app.url')}}/member/register">{{trans('member.free_register')}}</a>
					</li>
					@endif
				</ul>
			</div>
</div>