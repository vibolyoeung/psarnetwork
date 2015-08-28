@if($currentUserType == 2)
<?php
	if (! empty ( $dataStore->sto_url )) {
		$userSrore = 'page/' . $dataStore->sto_url;
	} else {
		$userSrore = 'page/store-' . $dataStore->id;
	}
	
	$getClassPage = new MPage ();
	$wherePage = array (
		'user_id' => $dataStore->user_id,
		'type' => 'config',
		'title' => 'fb_like' 
	);
	$getFbConfig = $getClassPage->getUserPages ( null, $wherePage );
	$dataUserSession = Session::get ( 'currentUserId' );
?>
	@if(@$getFbConfig->result[0]->status == 0 || empty($getFbConfig))
		@if($dataUserSession)
		<div class="panel-group widget" id="fb-like">
			<!--category-products-->
			<div class="panel panel-default facebook-like">
					<button type="button" class="btn btn-default pull-right btn-like"><i class="fa fa-thumbs-o-up"></i> like</button>
					<div class="title">Follow My Page</div>
					<p>
					You have no anyone follow your facebook page here.....?</p>
				<p>
			Just copy your facebook page address link  to palce in button link bellow ....!
					</p>
					<center>
					<button type="button" class="btn btn-primary edit-like" data-toggle="modal" data-target="#fbLike">
					Enbale it here
					</button>
					</center>
			</div>
			<div style="clear:both"></div>
		</div>
		@endif
	@else
	<div class="panel-group widget" id="fb-like">
		<div class="panel panel-default facebook-like">
		<iframe scrolling="no" 
		frameborder="0" 
		allowtransparency="true" 
		style="border:none; overflow:hidden;height:250px;" 
		src="http://www.facebook.com/plugins/likebox.php?href={{$getFbConfig->result[0]->description}}&width=150&colorscheme=light&show_faces=true&border_color=ffffff&stream=false&header=false&height=250"></iframe>
		@if($dataUserSession)
		<button type="button" class="btn btn-primary edit-like" data-toggle="modal" data-target="#fbLike" style="margin: 0">
		edit
		</button>
		@endif
		</div>
	</div>
	@endif
	<div class="modal fade" id="fbLike" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">{{trans('store.fbLike')}}</h4>
	      </div>
	      <div class="modal-body">
	        <!-- body -->
	        <input type="text" class="form-control" value="{{@$getFbConfig->result[0]->description}}" name="fblike" id="fblikeValue" />
			</form>
	        <!-- end body -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" style="margin-top: 0px;" id="fb_likes">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
@endif

