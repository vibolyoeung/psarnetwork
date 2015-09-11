<div class="header-middle" style="padding-bottom:15px;">
	<!--header-middle-->
	<div class="container-fluid" style="margin-top:120px;">
		<div class="row">
			<div class="col-lg-12" id="form-search">
				{{
					Form::open(
						array(
							'url'=>'search',
							'method'=>'get'
						)
					)
				}}
				<div class="col-lg-5 search-bar">
					<div class="col-lg-8 pull-right" style="padding: 0; margin: 0;">
						<div class="col-lg-3 pull-right" style="padding: 0; margin: 0;">
							<button type="submit"
								class="btn btn-warning pull-right col-lg-12"
								style="border-radius: 0;">
								<span class="glyphicon glyphicon-search"></span> Search
							</button>
						</div>
						<div class="col-lg-9" style="padding: 0; margin: 0;">
							<input type="text" name="q" class="form-control" placeholder="Search here"
								style="border-radius: 0; border: none; border-left: 1px solid #ddd;" />
						</div>
					</div>
					<div class="col-lg-4" style="margin: 0; padding: 0;">
						<div class="col-lg-6 pull-right" style="margin: 0; padding: 0;">
							<div class="btn-group col-lg-12" style="padding: 0; margin: 0;">
								<select name="location">
									<option value="0">{{trans('product.location')}}</option>
									@foreach($locations as $location)
										<option value="{{$location->province_id}}">
											<?php echo $location->{'province_name_'.Session::get('lang')};?>
										</option>
									@endforeach;
								</select>
							</div>
						</div>

						<div class="col-lg-6" style="margin: 0; padding: 0;">
							<div class="btn-group col-lg-12 " style="margin: 0; padding: 0;">
								<select name="type">
									<option value="0">Type</option>
									<option value="1">Products</option>
									<option value="2">Buyers</option>
									<option value="3">Suppliers</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				{{Form::close()}}
				<!-- ==========top advertise blog -->
				<div class="col-lg-7 top-advertisement">
				 <?php 
				 if(count($advTops)){
				 ?>
					@foreach($advTops as $adv)
						<?php
						$exp_date = $adv->end_date;
						$exp_date = str_replace ( '/', '-', $exp_date );
						if (strtotime ( date ( "d-m-Y" ) ) <= strtotime ( $exp_date )) {
							?>
						<a href="{{$adv->link_url}}">
						<img
							src="{{Config::get('app.url')}}/upload/advertisement/{{$adv->image;}}"
							class="img-responsive img-thumbanil" alt="" />
						</a>
						<?php }else{ ?>
						<a href="#"> 
							<img
								src="{{Config::get('app.url')}}frontend/images/topspecialads.png"
								class="img-responsive img-thumbnail" alt="" />
						</a>
						<?php 
						} ?>
					@endforeach
						
					<?php
				}else{
						?>
					<a href="#"> 
					<img
						src="{{Config::get('app.url')}}frontend/images/topspecialads.png"
						class="img-responsive img-thumbnail" alt="" />
					</a>
					<?php 
				}
				?>
					</div>
			</div>
		</div>
	</div>
</div>
<!--/header-middle-->