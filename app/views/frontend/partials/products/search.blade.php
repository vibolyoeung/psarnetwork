<div class="hidden-xs hidden-sm" style="padding-left:0;padding-top:15px;border:1px solid #ddd;background-color:#ddd;">
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
			<option value="">{{trans('product.location')}}</option>
			<?php
				$province_search = isset($_GET['location'])?$_GET['location']:'';
			?>
			@foreach($Provinces as $location)
				<option value="{{$location->province_id}}"
					<?php echo ($location->province_id==$province_search)?'selected':''; ?>
					>
					<?php echo $location->{'province_name_'.Session::get('lang')};?>
				</option>
			@endforeach
		</select>
	</div>
	<div class="btn-group col-lg-2">
		<select name="transferType" class="form-control form-select-khmerabba">
			<option value="0">Transfer</option>
			<?php
				$transferType_search = isset($_GET['transferType'])?$_GET['transferType']:'';
			?>
			@foreach($transferTypes as $transferType)
				<option value="{{$transferType->ptt_id}}"
					<?php echo ($transferType->ptt_id==$transferType_search)?'selected':''; ?>
					>
					<?php echo $transferType->{'name_'.Session::get('lang')};?>
				</option>
			@endforeach
		</select>
	</div>
	<div class="btn-group col-lg-2">
		<select name="condition" class="form-control form-select-khmerabba">
			<option value="0">Condition</option>
				<?php
					$condition_search = isset($_GET['condition'])?$_GET['condition']:'';
				?>
			@foreach($conditions as $condition)
				<option value="{{$condition->id}}"
					<?php echo ($condition->id==$condition_search)?'selected':''; ?>
					>
					<?php echo $condition->{'name_'.Session::get('lang')};?>
				</option>
			@endforeach
		</select>
	</div>
	<div class="col-lg-2">
		<?php
			$price_search = isset($_GET['price'])?$_GET['price']:'0';
		?>
		<div class="form-group">
			<input type="text" name="price" placeholder="price" class="form-control form-select-khmerabba"
			value="<?php echo $price_search; ?>"
			/>
		</div>
	</div>
	<div class="col-lg-2">
		<?php
			$date_search = isset($_GET['date'])?$_GET['date']:'';
		?>
		<div class="form-group">
			<input
				value="<?php echo $date_search; ?>"
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
<div class="features_items hidden-xs hidden-sm">
	<div class="category-tab lastest-post">
		<div style="padding:0;">
			<ul class="nav nav-tabs" style="background-color:#ddd;">
				<li class="col-lg-2 pull-right">
					<?php
						$displayNumber = isset($_GET['displayNumber'])?$_GET['displayNumber']:'';
					?>
					<select id="disply-number" name="displayNumber" class="form-control form-select-khmerabba">
						<option value="0" selected="selected">-Select-</option>
						<option value="20" <?php echo $displayNumber==20?'selected':''; ?> >20</option>
						<option value="50" <?php echo $displayNumber==50?'selected':''; ?>>50</option>
						<option value="100" <?php echo $displayNumber==100?'selected':''; ?>>100</option>
						<option value="150" <?php echo $displayNumber==150?'selected':''; ?>>150</option>
						<option value="200" <?php echo $displayNumber==200?'selected':''; ?>>200</option>
					</select>
				</li>
				<li class="hidden-xs hidden-sm" style="padding-right:0;">
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
		 console.log(url);
		 var finalurl = url[5];
		 if (url[3] !== undefined && url[3] === 'fe') {
		 	finalurl = 0;
		 } else {
		 	if(url[5] == undefined){
				url = url[4].split("?");
				url = url[1].split("=");
				url = url[1].split("&");
				finalurl = url[0];
		 	}
		 }

		 $("#categoryId").val(finalurl);
	});
</script>