<!--=============Menu==========-->
<div class="container-fluid header-bottom" style="padding:0 9px 8px 12px;">
	<nav class="navbar navbar-default menu_header_default" role="navigation">
		<div class="col-lg-10 col-xs-12 pull-right">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#dropdown-thumbnail-preview">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="dropdown-thumbnail-preview"  style="border: 1px solid #f7f7f5" >
				<ul class="nav navbar-nav top_menu_list">
					<li><a href="#"><img src="{{Config::get('app.url')}}frontend/images/icons/basket.png" alt="" title="" height="23"/></a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Super Market</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">TraditionalMarket</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">PrivateCompany</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Home Shop</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Individual</a></li>
				</ul>
				<ul class="nav navbar-nav menu_right_section pull-right">
					<li style="border-left:1px solid #ddd;"><a href="#"><img src="{{Config::get('app.url')}}frontend/images/icons/money.png" height="23" /></a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Hot Promotion</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">New Arrival</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Secondhand</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Buy</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Sell</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Monthly Pay</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<!--=========Test-->
</div>
<script>
	jQuery(document).ready(function(){
		var fullurl = window.location.href;
		var explodedurl = fullurl.split("/");
		$('.thumb-dropdown').each(function() {
		   var ID = ( this.id );
		   //alert(jQuery.inArray(ID,explodedurl));
		   if(jQuery.inArray(ID,explodedurl) == -1){
				//jQuery(".menu_nav_category li:first-child").addClass(" active");
			}else{
				//jQuery(this).addClass(" active");
			}
		});
	});
</script>