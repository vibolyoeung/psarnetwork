<!-- ========Right side========= -->
<div class="col-sm-2 pull-right" style="padding: 0;">
	<div class="right-sidebar">
		<!-- type:homepage, position: right meduim, limit -->
		{{ App::make('FePageController')->getFeAds(1, 5, 3) }}
		<!--=========Register seller============ -->
	</div>
</div>
