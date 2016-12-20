<footer id="footer">
	<!--Footer-->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<ul>
							<?php $mPages = MPage::getPagesToPutBottom();?>
								@foreach($mPages as $mPage)
									<li>
										<a href="{{URL::to('page.html')}}/{{$mPage->id}}">
											<i class="fa">
												<?php 
                                                   echo $mPage->{'title_'.Config::get('app.locale')}
												?>
											</i>
										</a>
									</li>
								@endforeach
							<li><a href="{{URL::to('member/register')}}">Sign Up now</a></li>
						</ul>
					</center>
				</div>
				<p>
				
				
				<center>Copy Right @ <?php echo date("Y")?> www.khmerabba.com &nbsp;All Right
					Reserve</center>


				</p>
			</div>
		</div>
	</div>
</footer>
<!--/Footer-->
<script type='text/javascript'>
	var homePage = "{{Config::get('app.url')}}";
</script>
<link rel="apple-touch-icon-precomposed"
	href="frontend/images/ico/apple-touch-icon-57-precomposed.png" />
<!-- Modal -->
<div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			</div>
			<div class="modal-body" id="overrideContent">
				<div id="ModalLoading" style="display: none; text-align: center;">
					<img
						src="{{Config::get('app.url')}}/frontend/images/upload_progress.gif"
						border="0" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function hideTagFn(){
   $('.message-alert').fadeOut(500);
}

window.setInterval(function () {
    hideTagFn();
}, 5000);
</script>
</body>
</html>