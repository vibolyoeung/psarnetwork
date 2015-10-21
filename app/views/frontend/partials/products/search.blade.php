<div style="padding-left:0;padding-top:15px;border:1px solid #ddd;background-color:#ddd;">
	{{
		Form::open(
			[
				'url'=>'search/products',
				'method'=>'get'
			]
		)
	}}
	<input type="hidden" value="" name="categoryId" id="categoryId" />
	<div class="btn-group col-lg-2">
		<select name="location" class="form-control form-select-khmerabba">
			<option value="0">{{trans('product.location')}}</option>
			@foreach($Provinces as $location)
				<option value="{{$location->province_id}}">
					<?php echo $location->{'province_name_'.Session::get('lang')};?>
				</option>
			@endforeach
		</select>
	</div>
	<div class="btn-group col-lg-2">
		<select name="transferType" class="form-control form-select-khmerabba">
			<option value="0">Transfer</option>
			@foreach($transferTypes as $transferType)
				<option value="{{$transferType->ptt_id}}">
					<?php echo $transferType->{'name_'.Session::get('lang')};?>
				</option>
			@endforeach
		</select>
	</div>
	<div class="btn-group col-lg-2">
		<select name="condition" class="form-control form-select-khmerabba">
			<option value="0">Condition</option>
			@foreach($conditions as $condition)
				<option value="{{$condition->id}}">
					<?php echo $condition->{'name_'.Session::get('lang')};?>
				</option>
			@endforeach
		</select>
	</div>
	<div class="col-lg-2">
		<div class="form-group">
			<input type="text" name="price" placeholder="price" class="form-control form-select-khmerabba" />
		</div>
	</div>
	<div class="col-lg-2">
		<div class="form-group">
			<input
				type="text"
				name="date"
				placeholder="yyyy-mm-dd"
				class="form-control datepicker form-select-khmerabba"
			/>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="col-lg-12 pull-right" style="padding: 0; margin: 0;">
			<button type="submit"
				class="btn btn-warning col-lg-12 form-select-khmerabba">
				&nbsp;&nbsp;<b>Filter</b>
			</button>
		</div>
	</div>
	{{Form::close()}}
</div>
<div class="features_items">
	<div class="category-tab lastest-post">
		<div style="padding:0;">
			<ul class="nav nav-tabs" style="background-color:#ddd;">
				<li class="col-lg-2 pull-right">
					<select id="disply-number" name="displayNumber" class="form-control form-select-khmerabba">
						<option value="0" selected="selected">-Select-</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="150">150</option>
						<option value="200">200</option>
					</select>
				</li>
				<li style="padding-right:0;">
					<span id="list_view" class="pull-right" style="padding:5px;"><?php echo '<img src="'.Config::get('app.url').'frontend/images/icons/list_view.png"/>';?></span>
					<span class="pull-left"> View:&nbsp;</span>
					<span id="grid_view" class="pull-left" style="padding:5px;"><?php echo '<img src="'.Config::get('app.url').'frontend/images/icons/grid_view.png"/>';?></span>
					
				</li>
			</ul>
		</div>
	</div>
</div>
<script language="javascript">
	$(document).ready(function(){
		var url  = window.location.href; 
		 url = url.split("/");
		 var finalurl = url[5];
		 if(url[5] == undefined){
		 	 url = url[4].split("?");
			 url = url[1].split("=");
			 url = url[1].split("&");
			 finalurl = url[0];
		 }
		 $("#categoryId").val(finalurl);
	});
</script>