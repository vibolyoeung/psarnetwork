<div class="col-lg-12" style="padding-left:0;padding-top:15px;border:1px solid #ddd;background-color:#ddd;">
	{{
		Form::open(
			[
				'url'=>'search/products',
				'method'=>'get'
			]
		)
	}}
	
	<div class="btn-group col-lg-3">
		<select name="location" class="form-control">
			<option value="0">Location</option>
			@foreach($Provinces as $location)
				<option value="{{$location->province_id}}">{{$location->province_name}}</option>
			@endforeach;
		</select>
	</div>
	<div class="btn-group col-lg-3">
		<select name="transferType" class="form-control">
			<option value="0">Transfer Type</option>
			@foreach($transferTypes as $transferType)
				<option value="{{$transferType->ptt_id}}">{{$transferType->name}}</option>
			@endforeach;
		</select>
	</div>
	<div class="btn-group col-lg-3">
		<select name="condition" class="form-control">
			<option value="0">Condition</option>
			@foreach($conditions as $condition)
				<option value="{{$condition->id}}">{{$condition->name}}</option>
			@endforeach;
		</select>
	</div>
	<div class="col-lg-3">
		<div class="form-group">
			<input type="text" name="price" placeholder="price" class="form-control" />
		</div>
	</div>
	<div class="col-lg-3">
		<div class="form-group">
			<input
				type="text"
				name="date"
				placeholder="Date: dd/mm/yyyy"
				class="form-control datepicker"
			/>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="col-lg-12 pull-right" style="padding: 0; margin: 0;">
			<button type="submit"
				class="btn btn-warning col-lg-12 ">
				<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<b>Search</b>
			</button>
		</div>
	</div>
	{{Form::close()}}
</div>
<div class="col-lg-12">
	{{
		Form::open(
			[
				'url'=> FeSearchController::getFullUrl(),
				'method'=>'get',
				'id' => 'displayFrm'
			]
		)
	}}
		<div class="btn-group col-lg-2" style="padding: 0; margin: 0;">
			<label for="">Display:</label>
			<select id="disply-number" name="displayNumber" class="form-control">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="150">150</option>
				<option value="200">200</option>
			</select>
		</div>
	{{Form::close()}}
</div>