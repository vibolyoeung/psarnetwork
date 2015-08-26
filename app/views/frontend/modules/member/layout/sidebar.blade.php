<ul class="nav nav-pills nav-stacked">
	<li class="tool-header">
		<a href="javascript:;"><i class="fa fa-cog"></i> {{trans('register.Interprise_Account')}}</a>
	</li>
	
	<li class="{{(Request::segment(3)=='menu' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/menu')}}">{{trans('register.MENU_MENU')}}</a>
	</li>
    <li class="{{(Request::segment(3)=='addpage' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/addpage')}}">{{trans('register.MENU_addpadd')}}</a>
	</li>	
	<li class="{{(Request::segment(3)=='slideshow' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/slideshow')}}">{{trans('register.MENU_sideshow')}}</a>
	</li>
	<li class="{{(Request::segment(3)=='banner' ? 'active':'')}}">
		<a href="{{URL::to('member/userinfo/banner')}}">{{trans('register.MENU_banner')}}</a>
	</li>     
</ul>