var is_modal_opened = 0;
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
    /*logo upload*/
    $('#logoFile').change(function(){
        $("#logo-preview").html('<img src="{{Config::get('app.url')}}frontend/images/upload_progress.gif" alt="Uploading...."/>');
    	$("#imageLogo").ajaxForm({
            success: function(data) {
                //console.log(data);
            var obj = JSON.parse(data);
                if (!obj.error) {
                    $('.message-success').show();
                    $('#logo-preview').html('<img src="{{Config::get('app.url')}}upload/store/' + obj.image + '" style="height:100px" class="img-thumbnail"/>');
                }
            }
        }).submit();
   	});
    
     /*banner upload*/
    $('#bannerFile').change(function(){
        $("#banner-preview").html('<img src="{{Config::get('app.url')}}frontend/images/upload_progress.gif" alt="Uploading...."/>');
    	$("#imageBanner").ajaxForm({
            success: function(data) {
                //console.log(data);
            var obj = JSON.parse(data);
                if (!obj.error) {
                    $('.message-success').show();
                    $('#banner-preview').html('<img src="{{Config::get('app.url')}}upload/user-banner/' + obj.image + '" style="height:100px" class="img-thumbnail"/>');
                }
            }
        }).submit();
   	});

    $('#addBannerLink').blur(function () {
        var link = $( this ).val();
        if(link) {
        	$('#btnSaveLink').show();
        } else {
        	$('#btnSaveLink').hide();
        }
    });
    $('#btnSaveLink').click(function () {
        var bLink = $('#addBannerLink').val();
        if(bLink) {
        	$.ajax({
        		url: homePage + "member/getsubmenu?type=bannerlink&id="+bLink,
        		type: "get",
        		error: function (request, error) {
        	        
        	    },
        		success: function(data) {
            	$('.message-success').show();
        		//$('##addBannerLink').html(text);
        		$('#btnSaveLink').hide();
        		}
            });
        }
    });
      
    $('#agreement').click(function () {
        if($(this).is(":checked")) {
            $("#summit").removeAttr("disabled");
        } else {
            $("#summit").attr('disabled',true);
        }
    });
 
    $('#btnsaveFoot').click(function () {
        var text = $('#textFooter').val();
        if(text) {
        	$.ajax({
        		url: homePage + "member/getsubmenu?type=userLayoutFooter&id="+text,
        		type: "get",
        		error: function (request, error) {
        	        
        	    },
        		success: function(data) {$('.message-success').show();
        		$('#foottxt').show().html(text);
        		$('#editfootertxt').hide();
        		}
            });
        }
    });
 	//textFooter
 	
$('#btnSaveTitle').click(function () {
        var text = $('#textTitle').val();
        if(text) {
        	$.ajax({
        		url: homePage + "member/getsubmenu?type=userHeaderTitle&id="+text,
        		type: "get",
        		error: function (request, error) {
        	        
        	    },
        		success: function(data) {$('.message-success').show();
        		$('#foottxt').show().html(text);
        		$('#editfootertxt').hide();
        		}
            });
        }
    });
 	//textFooter
  
    $('.skin-changer').click(function () {
    	$('.skin-changer').removeClass('active');
    	$(this).addClass('active');
        if($(this).attr("data-skin")) {
            $('.message-success').show();
            var styles = $(this).attr("data-skin");
            $.ajax({
        		url: homePage + "member/getsubmenu?type=userLayout&id="+styles,
        		type: "get",
        		dataType: "json",
        		async: false,
        		success: function(data) {
            	}
            });
            //$('.message-loading').hide();
            var userLayout = $( "link" ).hasClass( "user-layout" );
            if(userLayout) {
                $(".user-layout").attr("href", "{{Config::get('app.url')}}frontend/css/" + styles);
            } else {
                $( ".main-stylesheet" ).after( '<link class="user-layout" media="all" type="text/css" rel="stylesheet" href="{{Config::get('app.url')}}frontend/css/' + styles+'"/>' );
            }
        } else {
            //$("#summit").attr('disabled',true);
        }
    });
    
 	//Url Address btnSaveUrl
    $('#addUrl').blur(function () {
        if($(this).val()) {
            $.ajax({
        		url: homePage + "member/getsubmenu?type=checkaddURL&id="+$(this).val(),
        		type: "get",
        		dataType: "json",
        		async: false,
        		success: function(data) {
        			$("#btnSaveUrl").show();
            		if(data.result == 1) {
                		$("#urlAdd").addClass('has-error').removeClass('has-success');
                		$(".glyphicon").addClass('glyphicon-remove').removeClass('glyphicon-ok').show();
                		$(".alert-danger").show();
            		} else {
            			$("#urlAdd").removeClass('has-error').addClass('has-success');
            			$(".glyphicon").addClass('glyphicon-ok').removeClass('glyphicon-remove').show();
            			$(".alert-success").show();
            		}
            	}
            });
        }
    });

 	//Url Address save
    $('#btnSaveUrl').click(function () {
        if($('#addUrl').val()) {
            $.ajax({
        		url: homePage + "member/getsubmenu?type=addURL&id="+$('#addUrl').val(),
        		type: "get",
        		dataType: "json",
        		async: false,
        		success: function(data) {
            		if(data.result == 1) {
                		$("#urlAdd").addClass('has-error').removeClass('has-success');
                		$(".alert-danger").show();
            		} else {
            			$("#urlAdd").removeClass('has-error').addClass('has-success');
            			$(".alert-success").show();
            		}
            	}
            });
        }
    });
     	
    $("#PersonalForm").validate({
          rules: {
      FullName: {
         required : true
      }
    },
      messages:{
          FullName: {
            required : "This Full Name is required."
          }
      }
    });
    
    $( "#sortable" ).sortable({
        revert: true,
        update: function (event, ui) {
            var stringDiv = "";
            $('.message-success').show();
            $( this ).children().each(function(i) {
                var num = i + 1;
                var id = $(this).attr("id");
                $.ajax({
            		url: homePage + "member/getsubmenu?type=userPage&id="+id+"&order="+num,
            		type: "get",
            		dataType: "json",
            		async: false,
            		success: function(data) {}
                });
                //stringDiv += " "+li + '=' + i + '&';
            });
            //console.log(stringDiv);
        }
    });
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();

    
});
function costomizeLayout(){
    dynamicModal('loading');
    modalClose();
    
    $('#costomizeLayout').modal('show');
}
function enableBox(id){
    var checks = $('.page-' + id).is(':checked');
    if (checks) {
        $('.message-success').show();
        $.ajax({
    		url: homePage + "member/getsubmenu?type=userPageStatus&id="+id+"&st=1",
    		type: "get",
    		success: function(data) {}
        });
        //$('.page-' + id).attr('checked','checked');
    } else {
        $('.message-success').show();
        $.ajax({
    		url: homePage + "member/getsubmenu?type=userPageStatus&id="+id+"&st=0",
    		type: "get",
    		success: function(data) {}
        });
        //$('.page-' + id).removeAttr('checked','checked');
    }
    //dynamicModal('loading');
    //modalClose();
    
    //$('#Enablebox').modal('show');
}
function costomizeFooter(){
    dynamicModal('loading');
    modalClose();
    
    $('#costomizeFooter').modal('show');
}
function edit_foot_txt () {
	if ($('#foottxt').is(':visible')){
		$('#foottxt').hide();
		$('#editfootertxt').show();
	}
}
function edit_title_txt () {
	if ($('#titleFxt').is(':visible')){
		$('#titleFxt').hide();
		$('#editTileTxt').show();
	}
}