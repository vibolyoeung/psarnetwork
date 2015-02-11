<div class="panel panel-default">
	<div class="panel-body">
		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::radio('advertiseType', '1', true)}} <label for="advertiseType">Advertise</label>
			{{Form::radio('advertiseType', '2', false)}} <label for="advertiseType">Banner</label>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('seller_name',null, array('class' =>
			'form-control', 'id' => 'incharger','placeholder'=>'Incharge By seller:'))}}
		</div>
		{{ Form::hidden('incharger_id', $advertisement->incharger, array('id' => 'hid_incharger')) }}

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('title_en',$advertisement->title_en, array('class' =>
			'form-control','placeholder'=>'English Title*'))}}
			<span class="class-error">{{$errors->first('title_en')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('title_km',$advertisement->title_km, array('class' =>
			'form-control','placeholder'=>'Khmer Title*'))}}
			<span class="class-error">{{$errors->first('title_km')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('size',$advertisement->size, array('class' =>
			'form-control','placeholder'=>'size'))}}
		</div>

		<div class="form-group col-md-3 col-sm-12 col-xs-3">
			{{ Form::select('apearance',['Vertical', 'Horizontal'],$advertisement->apearance , array('class' =>
			'form-control', 'id' => 'apearance'))}}
		</div>

		<div class="form-group col-md-3 col-sm-12 col-xs-3">
			{{ Form::select('paymentMethods',$paymentMethods, $advertisement->payment_method , array('class' =>
			'form-control'))}}
		</div>

		<div class="form-group col-md-4 col-sm-12 col-xs-4">
			{{ Form::select('pageType',$advCatPages, $advertisement->adv_cat_page_id , array('class' =>
			'form-control', 'id' => 'ads-cat-page'))}}
		</div>

		{{Form::hidden('adv-hid', $advertisement->adv_page_id, array('id'=> 'adv-hid'))}}
		<div class="form-group col-md-4 col-sm-12 col-xs-4 ads-page">
			{{ Form::select('advertisementPage',array(), $advertisement->adv_page_id , array('class' =>
			'form-control', 'id' => 'ads-page'))}}
		</div>

		{{Form::hidden('adv-hid', $advertisement->adv_position_id, array('id'=> 'pos-hid'))}}
		<div class="form-group col-md-4 col-sm-12 col-xs-4 position">
			{{ Form::select('advertisementPosition',
			array(), $advertisement->adv_position_id , array('class' => 'form-control', 'id' =>
			'ads-position'))}}
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('startDate',$advertisement->started_date, array('class' => 'form-control
			datepicker','placeholder'=>'Start Date: dd/mm/yyyy'))}}
			<span class="class-error">{{$errors->first('startDate')}}</span>
		</div>

		<div class="form-group date col-md-6 col-sm-12 col-xs-6">
			{{ Form::text('expirationDate',$advertisement->end_date, array('class' => 'form-control
			datepicker','placeholder'=>'Expiration date: dd/mm/yyyy'))}}
			<span class="class-error">{{$errors->first('expirationDate')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::file('file',array('class' => 'form-control'))}} <span
				class="class-error">{{$errors->first('file')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('url',$advertisement->link_url, array('class' =>
			'form-control','placeholder'=>'Enter URL*'))}} <span
				class="class-error">{{$errors->first('url')}}</span>
		</div>
		<div class="form-group col-md-6 col-sm-3 col-xs-6">
		 {{Form::select('license',$licenses, $advertisement->license_id , array('class' =>
			'form-control', 'id' => 'license'))}}
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			<label>Publish</label> {{ Form::checkbox('status',$advertisement->status ,
			array('class' => 'form-control'))}}
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<label>Description Khmer</label> {{ Form::textarea('description_km',$advertisement->description_km,
			array('class' => 'form-control'))}}
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<label>Description English</label> {{ Form::textarea('description_en',$advertisement->description_en,
			array('class' => 'form-control'))}}
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			{{Form::hidden('hid',$advertisement->id)}}
			{{Form::submit('Create', array('class' => 'btn
			btn-success','name'=>'btnSubmit'))}} {{Form::close()}}
		</div>
	</div>
</div>