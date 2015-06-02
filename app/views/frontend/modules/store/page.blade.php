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
<div class="col-sm-10">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><strong>The latest products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
						<li>Companies :<span class="number-display">25</span></li>
						<li>Home Shop :<span class="number-display">25</span></li>
						<li>Individual : <span class="number-display">25</span></li>
						<li>View :<span class="number-display">25</span></li>
					</ul>
				</div>
			</div>
		</div>
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
