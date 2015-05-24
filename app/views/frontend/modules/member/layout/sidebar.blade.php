<ul class="nav nav-pills nav-stacked">
	<li class="{{(Request::segment(3)=='infomation' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/infomation')}}">{{trans('register.MENU_Your_info')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='menu' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/menu')}}">{{trans('register.MENU_MENU')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='content' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/content')}}">{{trans('register.MENU_Content_Page')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='slideshow' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/slideshow')}}">{{trans('register.MENU_sideshow')}}</a>
	</li>
    <li class="{{(Request::segment(3)=='addpage' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/addpage')}}">{{trans('register.MENU_addpadd')}}</a>
	</li>
</ul>