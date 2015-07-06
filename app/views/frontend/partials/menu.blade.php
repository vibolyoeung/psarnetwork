<!--=============Menu==========-->
<div class="container-fluid header-bottom" style="padding:0 0 8px 0;">
	<nav class="navbar navbar-default" role="navigation">
		<div class="col-lg-12 pull-right">
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
			<div class="collapse navbar-collapse" id="dropdown-thumbnail-preview"  style="border: 1px solid #f0ad4e" >
				<ul class="nav navbar-nav top_menu_lists">
					<li><a href="{{Config::get('app.url')}}product/list/10">Super Market</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">TraditionalMarket</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">PrivateCompany</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Home Shop</a></li>
					<li><a href="{{Config::get('app.url')}}product/list/10">Individual</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
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