<?php 
$getUser = new User ();
$getUserData = $getUser->getUser($dataStore->user_id);
?>
<div class="panel-group category-products" id="accordian">
	<label class="btn-default get popular-links">
		{{trans('store.memeberStatus')}}
	</label>
	<!--category-products-->
	<div class="panel panel-default popular-links" style="color:#000;padding:5px">
		<p>
		<b>{{trans('store.memeberCompanyName')}}</b>: {{@$dataStore->title_en}} <br />
		<b>{{trans('store.memeberContactPerson')}}</b>: {{@$getUserData->result->name}} <br />
		<b>{{trans('store.Tel')}}</b>: {{@$getUserData->result->telephone}}<br />
		<b>{{trans('store.Email')}}</b>: {{@$getUserData->result->email}}<br />
		<?php 
			$location = json_decode($getUserData->result->address, true);
		?>
		<b>{{trans('register.Input_Location')}}</b>: {{@$location['province']}} 
		
		</p>
		<b>{{trans('store.memeberSince')}}</b><span style="color: red;"> {{@$getUserData->result->create_at}}</span><br />
		<b>{{trans('register.gen_Account_Type')}}</b>: <span style="color: red;">
		@if($getUserData->result->account_type == 1)
			{{trans('register.Interprise_Account')}}
		@else
			{{trans('register.Free_Account')}}
		@endif
		</span>
	</div>
</div>