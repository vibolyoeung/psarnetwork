
<footer id="footer">
	<!--Footer-->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<ul>
							<li><a href="#">Contact</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Advertisement</a></li>
							<li><a href="#">Usage</a></li>
							<li><a href="#">User Agreement</a></li>
							<li><a href="#">Policy</a></li>
							<li><a href="#">Sign Up now</a></li>
						</ul>
					</center>
				</div>
				<p>
				<center>Copy Right @ 2014 www.phsarkhmer.com.kh  &nbsp;All Right Reserve</center>
				
				
				</p>
				</div>
			</div>
		</div>
</footer><!--/Footer-->
		 {{HTML::script('frontend/js/bootstrap.min.js')}}
		 {{HTML::script('frontend/js/jquery.scrollUp.min.js')}}
		 {{HTML::script('frontend/js/price-range.js')}}
		 {{HTML::script('frontend/js/prettyPhoto.js')}}
		 {{HTML::script('frontend/js/main.js')}}
		 {{HTML::script('frontend/js/custom.js')}}
		<link rel="apple-touch-icon-precomposed"
			href="frontend/images/ico/apple-touch-icon-57-precomposed.png"/>
 <!-- Modal -->
<div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="overrideContent">
        <div id="ModalLoading" style="display: none;text-align: center;">
					<img src="{{Config::get('app.url')}}/frontend/images/upload_progress.gif" border="0" />
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>           
	</body>
</html>