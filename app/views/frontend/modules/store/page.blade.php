@extends('frontend.modules.store.layout.layout')
@section('title')
	Home
@endsection
@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
@endsection
@section('content')
<div class="col-sm-8">
	<div class="features_items">
		<div class="col-lg-12" style="padding:0;">
            @if(count($dataUserPageView)>0)
                <h2 class="page-title">{{$dataUserPageView[0]->title}}</h2>
                <div class="content">
                {{$dataUserPageView[0]->description}}
                </div>
            @else
            <div class="col-sm-12">
                <h2>{{trans('product.user_product_not_found')}}</h2>
            </div>
            @endif
		</div>
	</div>
</div>
@endsection
@section('left')
	@include('frontend.modules.store.partials.slidebar.left_product_link')
@endsection
@section('right')
	@include('frontend.modules.store.partials.slidebar.visitor_counter')
@endsection
