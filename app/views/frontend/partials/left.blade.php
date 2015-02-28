<div class="col-lg-1"  style="padding:0;">
		<div class="left-sidebar">
			<div class="panel-group category-products" id="accordian">
				<label class="btn-default get popular-links">
					Popular Links
				</label>
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
				@foreach($advVerticalLeftMiduims as $adv)
				<?php
					$exp_date = $adv->end_date;
					$exp_date =str_replace('/', '-', $exp_date);
					if(strtotime(date("d-m-Y")) <= strtotime($exp_date)){ ?>
						<a href="{{$adv->link_url}}" >
							<img
								src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
								class="img-responsive"
								alt=""
							/>
						</a>
				<?php } ?>
				@endforeach
			</div>
		</div>
</div>