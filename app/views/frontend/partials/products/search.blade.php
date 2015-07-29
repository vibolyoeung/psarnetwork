<div class="col-lg-12">
	{{
		Form::open(
			array(
				'url'=>'search/products',
				'method'=>'get'
			)
		)
	}}
	<div class="col-lg-2 pull-right" style="padding: 0; margin: 0;">
		<div class="col-lg-3 pull-right" style="padding: 0; margin: 0;">
			<button type="submit"
				class="btn btn-warning pull-right col-lg-12"
				style="border-radius: 0;">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</div>
	</div>
	<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
		<select name="location" class="form-control">
			<option value="0">Location</option>
			@foreach($Provinces as $location)
				<option value="{{$location->province_id}}">{{$location->province_name}}</option>
			@endforeach;
		</select>
	</div>
	<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
		<select name="transferType" class="form-control">
			<option value="0">Transfer Type</option>
			@foreach($transferTypes as $transferType)
				<option value="{{$transferType->ptt_id}}">{{$transferType->name}}</option>
			@endforeach;
		</select>
	</div>
	<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
		<select name="condition" class="form-control">
			<option value="0">Condition</option>
			@foreach($conditions as $condition)
				<option value="{{$condition->id}}">{{$condition->name}}</option>
			@endforeach;
		</select>
	</div>
	<div class="col-lg-2" style="padding: 0; margin: 0;">
		<div class="form-group">
			<input type="text" name="price" placeholder="price" class="form-control" />
		</div>
	</div>
	<div class="col-lg-2" style="padding: 0; margin: 0;">
		<div class="form-group">
			<input
				type="text"
				name="date"
				placeholder="Date: dd/mm/yyyy"
				class="form-control datepicker"
			/>
		</div>
	</div>
	{{Form::close()}}
</div>