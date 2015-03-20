<ul class="nav nav-pills nav-stacked">
	<li class="{{(Request::segment(4)=='infomation' ? 'active':'')}}">
		<a href="javascript:;">{{trans('register.MENU_Your_info')}}</a>
	</li>
	<li class="{{(Request::segment(4)=='menu' ? 'active':'')}}">
		<a href="javascript:;">{{trans('register.MENU_MENU')}}</a>
	</li>
	<li class="{{(Request::segment(4)=='content' ? 'active':'')}}">
		<a href="javascript:;">{{trans('register.MENU_Content_Page')}}</a>
	</li>
	<li>
		<a href="javascript:;">{{trans('register.MENU_Finish')}}</a>
	</li>
</ul>