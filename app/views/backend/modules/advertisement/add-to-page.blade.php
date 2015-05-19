<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add avertisement to page</h4>
      </div>
      <div class="modal-body">
        	@foreach($userPages as $userPage)
		        <div class="form-group col-md-6">
					<label>{{$userPage->title_en}}</label>
					{{ 
						Form::checkbox('pages[]',
						$userPage->id ,
						false,
						array('class'=>'to-pages'))
					}}
				</div>
			@endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save-point-to-page" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>