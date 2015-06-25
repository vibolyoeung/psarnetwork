<div class="col-lg-2 left_bar">
	<div class="left-sidebar">
		<div class="panel-group category-products" id="accordian">
			<label class="btn-default get popular-links"> Popular Links </label>
			<!--category-products-->
			<div class="panel panel-default popular-links">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">Phones</a>
					</h4>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">Computers</a>
					</h4>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">Moto</a>
					</h4>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">Cars</a>
					</h4>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">House</a>
					</h4>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">Watch</a>
					</h4>
				</div>
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#">More</a>
					</h4>
				</div>
			</div>
		</div>
		<!--=========Register seller============ -->
		<div class="panel-group category-products" id="accordian">
			<!-- type:homepage, position: left meduim, limit -->
			{{ App::make('FePageController')->getFeAds(1, 4, 3) }}
		</div>
	</div>
</div>