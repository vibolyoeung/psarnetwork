<div class="panel panel-default">
	<div class="panel-body">
		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{
				Form::select(
					'advertiseType',
					['1' => 'Banner',
					'2' => 'Product'],
					null ,
					array('class' =>'form-control', 'id' => 'apearance')
				)
			}}
		</div>

		<div class="form-group col-md-3 col-sm-12 col-xs-3">
			{{Form::text('seller_name',null, array('class' =>
			'form-control', 'id' => 'incharger','placeholder'=>'Incharge By seller:'))}}
		</div>
		{{ Form::hidden('incharger_id', '', array('id' => 'hid_incharger')) }}

		<div class="form-group col-md-3 col-sm-12 col-xs-3 product-category">
			 {{Form::select('proCategory',$categories, null , array('class' =>
			'form-control', 'id' => 'proCategory'))}}
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('title_en',null, array('class' =>
			'form-control','placeholder'=>'English Title*'))}}
			<span class="class-error">{{$errors->first('title_en')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('title_km',null, array('class' =>
			'form-control','placeholder'=>'Khmer Title*'))}}
			<span class="class-error">{{$errors->first('title_km')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('size',null, array('class' =>
			'form-control','placeholder'=>'size'))}}
		</div>

		<div class="form-group col-md-3 col-sm-12 col-xs-3">
			{{ Form::select('apearance',['Vertical', 'Horizontal'],null , array('class' =>
			'form-control', 'id' => 'apearance'))}}
		</div>

		<div class="form-group col-md-3 col-sm-12 col-xs-3">
			{{ Form::select('paymentMethods',$paymentMethods, null , array('class' =>
			'form-control'))}}
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6 ads-page">
			{{ Form::select('advertisementPage',array(), null , array('class' =>
			'form-control', 'id' => 'ads-page'))}}
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6 position">
			{{ Form::select('advertisementPosition',
			array(), null , array('class' => 'form-control', 'id' =>
			'ads-position'))}}
			<!-- <div class="col-md-3 col-xs-3">
				<a id="select-to-view" href="#" data-toggle="modal" data-target="#myModal">
					Select to view(Incase, It selected as Free or enterprise page)
				</a>
			</div> -->

			{{ Form::hidden('pointToPage', '', array('id' => 'hid-poin-to-page')) }}

		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('startDate',date("Y-m-d"), array('class' => 'form-control
			datepicker'))}}
			<span class="class-error">{{$errors->first('startDate')}}</span>
		</div>

		<div class="form-group date col-md-6 col-sm-12 col-xs-6">
			{{ Form::text('expirationDate',date("Y-m-d"), array('class' => 'form-control
			datepicker'))}}
			<span class="class-error">{{$errors->first('expirationDate')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::file('file',array('class' => 'form-control'))}} <span
				class="class-error">{{$errors->first('file')}}</span>
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			{{Form::text('url',null, array('class' =>
			'form-control','placeholder'=>'Enter URL*'))}} <span
				class="class-error">{{$errors->first('url')}}</span>
		</div>
		<div class="form-group col-md-6 col-sm-3 col-xs-6">
		 {{Form::select('license',$licenses, null , array('class' =>
			'form-control', 'id' => 'license'))}}
		</div>

		<div class="form-group col-md-6 col-sm-12 col-xs-6">
			<label>Publish</label> {{ Form::checkbox('status',1 ,
			array('class' => 'form-control'))}}
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<label>Description Khmer</label> {{ Form::textarea('description_km',null,
			array('class' => 'form-control'))}}
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			<label>Description English</label> {{ Form::textarea('description_en',null,
			array('class' => 'form-control'))}}
		</div>

		<div class="form-group col-md-12 col-sm-12 col-xs-12">
			{{Form::submit('Create', array('class' => 'btn
			btn-success','name'=>'btnSubmit'))}} {{Form::close()}}
		</div>
	</div>
</div>