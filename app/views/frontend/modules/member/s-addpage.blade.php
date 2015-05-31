@extends('frontend.nosidebar') @section('title') Register for Enterprise Seller Page @endsection @section('breadcrumb')
<ol class="breadcrumb">
	<li>
		<a href="#">Home</a>
	</li>
	<li>
		<a href="#">Library</a>
	</li>
	<li class="active">
		Data
	</li>
</ol>
@endsection @section('frontend.partials.left') @endsection @section('content')
<div class="memberlogin">
	<div class="col-sm-3">
		@include('frontend.modules.member.layout.sidebar-setting')
		<div class="clear">
		</div>
	</div>
	<div class="col-sm-9">
		<div class="register-form">
			<!--login form-->
			<h2>
				{{trans('register.acc_page_title')}}
			</h2>
			<div class="conent">
					<div class="" style="margin: 0;">
						<!--category-tab-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="personal">
                                <div class="col-sm-6">
                                    <form action="" id="vaildateForm" class="form-horizontal" method="post">
                                    <div class="pro-detail">
                                        <div class="form-group">
                							<label for="TitleTxt" class="col-sm-3 control-label">
                								{{trans('register.acc_page_name')}}
                							</label>
                                            <div class="col-sm-9">
                    							<input type="text" value="@if(!empty($dataEdit)) {{$dataEdit[0]->title}} @endif" name="name" class="form-control" id="TitleTxt" placeholder="{{trans('register.acc_page_name')}}" aria-describedby="TitleTxtStatus" required />
                    							<span data="TitleTxt" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                    							</span>
                    							<span id="TitleTxtStatus" class="sr-only">
                    								(error)
                    							</span>
                                            </div>
                						</div>
                                        <div class="form-group">
                							<label for="bodyTxt" class="col-sm-3 control-label">
                								{{trans('register.acc_page_body')}}
                							</label>
                                            <div class="col-sm-9">
                    							<textarea name="body" class="form-control" id="bodyTxt" placeholder="{{trans('register.acc_page_body')}}" aria-describedby="bodyTxtStatus">@if(!empty($dataEdit)){{$dataEdit[0]->description}}@endif</textarea>
                                            </div>
                						</div>
                                        
                                        <div class="form-group">
                							<label for="bodyTxt" class="col-sm-3 control-label">
                								{{trans('register.acc_page_body')}}
                							</label>
                                            <div class="col-sm-9">
                    							<select class="form-control" name="menuPosition">
                                                    <option value="1" @if(!empty($dataEdit)) @if($dataEdit[0]->position ==1) selected @endif @endif >Menu 1</option>
                                                    <option value="2" @if(!empty($dataEdit)) @if($dataEdit[0]->position ==2) selected @endif @endif>Menu 2</option>
                                                </select>                                                       
                                            </div>
                						</div>
									</div>
                                    @if(!empty($dataEdit))
                                        <input type="hidden" name="editPage" value="{{$dataEdit[0]->id}}"/>
                                    @endif
  					                 <input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnInfo" value="{{trans('register.BTN_SUBMIT')}}"/>
				                    </form>
                                </div>
								<div class="col-sm-6">
                                    <table class="table table-striped">
                                    <tr>
                                        <th style="width:40px">ID</th>
                                        <th style="width:30%">Title</th>
                                        <th>content</th>
                                        <th style="width:80px">Action</th>
                                      </tr>
                                      @if($datapage)
                                          @foreach($datapage as $page)
                                          <tr>
                                            <td>{{$page->id}}</td>
                                            <td>{{$page->title}}</td>
                                            <td>{{$page->description}}</td>
                                            <td>
                                                <div class="dropdown">
                                                  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                    <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                        <li>
                                                            <a href="{{URL::to('member/userinfo/addpage')}}?id={{$page->id}}">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{URL::to('member/userinfo/addpage')}}?del={{$page->id}}">Delete</a>
                                                        </li>
                                                  </ul>
                                                </div>
                                            </td>
                                          </tr>
                                          @endforeach
                                      @endif
                                    </table>
								</div>
							</div>
						</div>
					</div>
					<!--end product detail-->
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
<div class="clear">
</div>
{{HTML::script('frontend/js/jquery.validate.js')}}
<script type='text/javascript'>
$(document).ready(function(){
    $("#vaildateForm").validate({
          rules: {
      name: {
         required : true
      }
    },
      messages:{
          name: {
            required : "This Title is required."
          }
      }
    });
});
</script>
@endsection