<style type="text/css">
	.active{
		color: #e46c0a !important;
	}
	.user-wrapper{
		margin-top:30px;
	}
</style>
<div class="panel-group category-products" id="accordian">
	<label class="btn-default get popular-links">
		Manage Product
	</label>
	<!--category-products-->
	<div class="panel panel-default popular-links">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a
					class="{{(Request::segment(3) === 'all'  || Request::segment(3) == '')?'active':''}}"
					href="{{URL::to('products/list/all')}}"
				>
					All My Products

				</a>
			</h4>
		</div>
		<div class="panel-heading">
			<h4 class="panel-title">
				<a
					class="{{(Request::segment(3) === 'reservation')?'active':''}}"
					href="{{URL::to('products/list/reservation')}}"
				>
				Reservation Products
				</a>
			</h4>
		</div>
		<div class="panel-heading">
			<h4 class="panel-title">
				<a
					class="{{(Request::segment(3) === 'unpublish')?'active':''}}"
					href="{{URL::to('products/list/unpublish')}}"
				>
				Unpublic Products
				</a>
			</h4>
		</div>
		<div class="panel-heading">
			<h4 class="panel-title">
				<a
					class="{{(Request::segment(3) === 'license')?'active':''}}"
					href="{{URL::to('products/list/license')}}"
				>
				Product License
				</a>
			</h4>
		</div>
	</div>
</div>