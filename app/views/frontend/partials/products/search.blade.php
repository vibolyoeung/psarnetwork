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
			<option value="0">Location</option>
			@foreach($Provinces as $location)
				<option value="{{$location->province_id}}">{{$location->province_name}}</option>
			@endforeach
		</select>
	</div>
	<div class="btn-group col-lg-2">
		<select name="transferType" class="form-control form-select-khmerabba">
			<option value="0">Transfer</option>
			@foreach($transferTypes as $transferType)
				<option value="{{$transferType->ptt_id}}">{{$transferType->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="btn-group col-lg-2">
		<select name="condition" class="form-control form-select-khmerabba">
			<option value="0">Condition</option>
			@foreach($conditions as $condition)
				<option value="{{$condition->id}}">{{$condition->name}}</option>
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
				placeholder="Date: dd/mm/yyyy"
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
<script language="javascript">
	$(document).ready(function(){
		var url  = window.location.href; 
		 url = url.split("/");
		 var finalurl = url[5];
		 //alert(url[5]);
		 if(url[5] == undefined){
		 	 url = url[4].split("?");
			 url = url[1].split("=");
			 url = url[1].split("&");
			 finalurl = url[0];
			//var finalurl =  $("#categoryId").attr('value');
		 }
		 //alert(finalurl);
		 $("#categoryId").val(finalurl);

		 
	});
</script>