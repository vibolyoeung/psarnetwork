<br />
<div class="row">
	<div class="col-lg-12" style="border: 1px solid #F7F7F5; padding: 0; background:#f9f9f7;">
		<div class="col-lg-3"
			style="border-right: 0px solid #ddd; padding: 10px; margin-top: 55px;">
			<center>
				<div class="btn btn-warning">Summary in each locations</div>
			</center>
		</div>
		<div class="col-lg-9"
			style="padding: 10px; border-left: 1px solid #F7F7F5;">

			@foreach($Provinces as $province)
			<div class="btn btn-default"
				style="border-radius: 0; min-width: 160px; font-size: 12px; border: none; text-align: left;">
				<?php echo $province->{'province_name_'.Session::get('lang')}; ?> &nbsp;&nbsp;<span
					class="number-display">200</span>
			</div>
			@endforeach
		</div>
	</div>
</div>
<br />
<div class="row">
	<div class="col-lg-12" style="border: 1px solid #F7F7F5; padding: 0; background:#f9f9f7;">
		<div class="col-lg-3"
			style="border-right: 0px solid #ddd; padding: 10px; margin-top: 30px;">
			<center>
				<div class="btn btn-warning">Summary in Seller Type</div>
			</center>
		</div>
		<div class="col-lg-9"
			style="padding: 10px; border-left: 1px solid #F7F7F5;">
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Manufatureur <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Suppliyer <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Distribtor <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Retailer <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Personal Sale <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
		</div>
	</div>
</div>
<br />
<div class="row">
	<div class="col-lg-12" style="border: 1px solid #F7F7F5; padding: 0; background:#f9f9f7;">
		<div class="col-lg-3"
			style="border-right: 0px solid #ddd; padding: 10px; margin-top: 30px;">
			<center>
				<div class="btn btn-warning">Summary in business site</div>
			</center>
		</div>
		<div class="col-lg-9"
			style="padding: 10px; border-left: 1px solid #F7F7F5;">
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Supper Market<br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Tradictional Market <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Private Company <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Home Shop <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
			<div class="btn btn-default"
				style="border: 2px solid #F7F7F5; min-width: 160px; font-size: 12px; text-align: left; padding: 15px; margin: 13px;">
				<a href="#">
					<center>
						Individual <br /> <span class="number-display">200</span>
					</center>
				</a>
			</div>
		</div>
	</div>
</div>
</div></br></br></br>
