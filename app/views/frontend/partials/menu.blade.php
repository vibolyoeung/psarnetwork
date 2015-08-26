<!--=============Menu==========-->
<div class="container-fluid header-bottom hide_responsive" style="padding:0 9px 8px 12px;">
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
			<div class="collapse navbar-collapse menu-top" id="dropdown-thumbnail-preview">
				<ul class="nav navbar-nav top_menu_list">
					<li><a href="#"><img src="{{Config::get('app.url')}}frontend/images/icons/basket.png" alt="" title="" height="23"/></a></li>
					@foreach($client_type as $client_type)
						<li><a href="{{Config::get('app.url')}}product/list/{{$client_type->id}}/0">{{$client_type->name}}</a></li>
					@endforeach
				</ul>
				<ul class="nav navbar-nav menu_right_section pull-right">
					<li style="border-left:1px solid #ddd;">
						<a href="#">
							<img 
								src="{{Config::get('app.url')}}frontend/images/icons/money.png" height="23" 
							/>
						</a>
					</li>
					@foreach($pro_transfer_type as $pro_transfer_types)
						<li>
							<a 
								href="{{Config::get('app.url')}}product/list/{{$pro_transfer_types->ptt_id}}/0">
								<?php echo $pro_transfer_types->{'name_'.Session::get('lang')};?>
							</a>
						</li>
					@endforeach
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