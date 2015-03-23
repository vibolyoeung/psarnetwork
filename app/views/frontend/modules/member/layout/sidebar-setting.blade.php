<ul class="nav nav-pills nav-stacked">
	<li class="{{(Request::segment(3)=='infomation' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/infomation')}}">{{trans('register.MENU_Your_info')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='accountinfo' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/accountinfo')}}">{{trans('register.MENU_Account_Information')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='content' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/content')}}">{{trans('register.MENU_Content_Page')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='toolview' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/toolview')}}">{{trans('register.MENU_toolview')}}</a>
	</li>
</ul>