<!-- ========Right side========= -->
<div class="col-sm-1" style="padding:0;border:1px solid red;">
	<div class="right-sidebar">
		<!-- type:homepage, position: right meduim, limit -->
		{{ App::make('FePageController')->getFeAds(1, 5, 3) }}
		<!--=========Register seller============ -->
	</div>
</div>
