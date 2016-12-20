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
				Your are registering
				<span style="color:orange">
					As Seller
				</span>
			</h2>
			<div class="conent">
				<form action="" id="PersonalForm" class="form-horizontal" method="post">
					<div class="category-tab shop-details-tab" style="margin: 0;">
						<!--category-tab-->
						<div class="tab-content">
							<div class="tab-pane fade active in" id="personal">
								<div class="col-sm-12">
									<div class="row">
										<!--product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
												<h3>
													Your Page Information
												</h3>
                                                <div class="form-group">
                        							<label for="YourName" class="col-sm-4 control-label">
                        								{{trans('register.Input_Your_Name_Label')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="text" value="{{$userData->name}}" name="name" class="form-control" id="YourName" placeholder="{{trans('register.Input_Your_Name_Placeholder')}}" aria-describedby="YourNameStatus" required />
                            							<span data="YourName" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="YourNameStatus" class="sr-only">
                            								(error)
                            							</span>
                                                    </div>
                        						</div>
                                                <div class="form-group">
                        							<label for="eMail" class="col-sm-4 control-label">
                        								{{trans('register.Input_Email')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="email" value="{{$userData->email}}" name="email" class="form-control" id="eMail" placeholder="{{trans('register.Input_Email_Placeholder')}}" aria-describedby="eMailStatus" required />
                            							<span data="eMail" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="eMailStatus" class="sr-only">
                            								(error)
                            							</span>
                                                        <?php if($errors->first('email')):?>
                                                            <label class="error">{{trans('register.Input_Email_Error')}}</label>
                                                        <?php endif;?>
                                                    </div>
                        						</div>
                                                <div class="form-group">
                        							<label for="PhoneNumber" class="col-sm-4 control-label">
                        								{{trans('register.Input_Phone_Number')}}
                        							</label>
                                                    <div class="col-sm-8">
                            							<input type="text" value="{{$userData->telephone}}" name="telephone" class="form-control" id="PhoneNumber" placeholder="{{trans('register.Input_Phone_Number_Placeholder')}}" aria-describedby="PhoneNumberStatus" required />
                            							<span class="error">
                            								{{$errors->first('telephone')}}
                            							</span>
                                                        <span data="PhoneNumber" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="PhoneNumberStatus" class="sr-only">
                            								(error)
                            							</span>
                                                    </div>
                        						</div>
												<!--<div class="form-group">
													<label for="Location" class="col-sm-4 control-label">
														Location
													</label>
													<div class="col-sm-8">
														<input name="Location" value="{{$userData->address}}" type="text" class="form-control" id="Location" placeholder="Location" required/>
													</div>
												</div>-->
                                                <div class="form-group ghide">
                        							<label for="MappingAddressHere" class="col-sm-4 control-label">
                        								{{trans('register.Mapping_Address_Here')}}
                        							</label>
                                                    <div class="col-sm-8">
                                                        <?php
                                                            $locationArr = json_decode($userData->address);
                                                        ?>
                            							<input type="text" value="{{$locationArr->g_latitude_longitude}}" name="gLatitudeLongitude" class="form-control" id="latbox" placeholder="{{trans('register.Mapping_Address_Here_Placeholder')}}" aria-describedby="MappingAddressHereStatus" required />
                                                        <span data="MappingAddressHere" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true">
                            							</span>
                            							<span id="MappingAddressHereStatus" class="sr-only">
                            								(error)
                            							</span>
                                                    </div>
                        						</div>
                                                <div id="addMore"><a href="{{URL::to('member/userinfo/infomation?pw=1#password')}}">Chage Password</i></a></div>
                                                    @if (Session::has('messsage'))
                                                         @if (Session::get('messsage')=='message_save_with_pass')
                                                        <div class="alert alert-success" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{trans('register.message_save_with_pass')}}</div>
                                                        @else
                                                        <div class="alert alert-success" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{trans('register.message_save_no_pass_but_data')}}</div>
                                                        @endif
                                                    @endif
											</div>
										</div>
										<!--end product describe-->
										<div class="col-sm-6">
											<div class="pro-detail">
                                                <div id="mapWrapper" style=""><div id="gmap" style="width: 100%; height: 375px"></div></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end product detail-->
                    <div class="clear"></div>
                    <input id="summit" type="submit" class="btn btn-default pull-right choosenuser" name="btnInfo" value="{{trans('register.BTN_SAVE')}}"/>
				</form>
				<div class="clear">
				</div>
			</div>
		</div>
		<!--/login form-->
	</div>
</div>
<script>
//$(document).ready(function(){
  //byAdress('{{$locationArr->g_latitude_longitude}}');
 // });

function byAdress() {
        ll = new google.maps.LatLng({{$locationArr->g_latitude_longitude}});
        zoom = 14;
        var mO = {
            scaleControl: true,
            zoom: zoom,
            zoomControl: true,
            zoomControlOptions: {style: google.maps.ZoomControlStyle.LARGE},
            center: ll,
            disableDoubleClickZoom: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("gmap"), mO);
        map.setTilt(0);
        map.panTo(ll);
        marker = new google.maps.Marker({position: ll, map: map, draggable: true, title: 'Marker is Draggable'});

        google.maps.event.addListener(marker, 'click', function(mll) {
            gC(mll.latLng);
            var html = "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><p>Latitude - Longitude:<br />" + String(mll.latLng.toUrlValue()) + "<br /><br />Lat: " + ls + "&#176; " + lm + "&#39; " + ld + "&#34;<br />Long: " + lgs + "&#176; " + lgm + "&#39; " + lgd + "&#34;</p></div>";
            iw = new google.maps.InfoWindow({content: html});
            iw.open(map, marker);
        });
        google.maps.event.addListener(marker, 'dragstart', function() {
            if (iw) {
                iw.close();
            }
        });

        google.maps.event.addListener(marker, 'dragend', function(event) {
            posset = 1;
            if (map.getZoom() < 10) {
                map.setZoom(10);
            }
            map.setCenter(event.latLng);
            computepos(event.latLng);
            drag = true;
            setTimeout(function() {
                drag = false;
            }, 250);
        });

        google.maps.event.addListener(map, 'click', function(event) {
            if (drag) {
                return;
            }
            posset = 1;
            fc(event.latLng);
            if (map.getZoom() < 10) {
                map.setZoom(10);
            }
            map.panTo(event.latLng);
            computepos(event.latLng);
        });

        // Tab show, laod google map
        $('#TapTitle').on('shown.bs.tab', function () {
            google.maps.event.trigger(map, 'resize');
        });
    }
    google.maps.event.addDomListener(window, 'load', byAdress);
</script>
<div class="clear"></div>
@endsection