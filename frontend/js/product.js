/*
 * For upload multiple pictures
 */
var Upload = (function() {

    /*
     * Append multiple forms upload  picture
     *
     * @public
     * @return void
     */
    var append_multiple_upload = function(){
        var table = document.getElementById('picture-table');
        var pictureData = document.getElementById('tableColumnPicture').getAttribute('data-prototype');

        var index = table.rows.length;
        var row = table.insertRow(-1);
        row.innerHTML = '<td>' + index + '</td>'
            + '<td>'+ pictureData + '</td>'
            + '<td><a class="btn btn-danger" onClick="Upload.delete_row(' + index + ')">Remove</a></td>'
    };

    /*
     * Delete picture
     *
     * @param integer row
     * @public
     * @return void
     */
    var delete_row = function(row){
        document.getElementById("picture-table").deleteRow(row);
    };

    return {
        delete_row : delete_row,
        append_multiple_upload: append_multiple_upload
    };
}());

$(document).ready(function () {
    CKEDITOR.replace( 'ckeditor' );
    CKEDITOR.replace('ckeditor-address');    
});

  $(function () {
    $('#myTab a:last').tab('show');
  });

  function is_active_tab (id) {
    $('.pro-tab li').removeClass('active');
    $('.' + id).addClass('active');
  }

  function removeImg($id) {
        var txt;
        var r = confirm("are you sure to delete this image?");
        if (r == true) {
            $("#image-id-" + $id).hide();
            $("#file-id-" + $id).attr('name','delimag[]');
            totalImg = totalImg - 1;
            if(totalImg==0) {
                setImage = '';
            } else {
                setImage = totalImg;
            }
            $("#totalImage").val(setImage);
        } else {
            //txt = "You pressed Cancel!";
        }
        //document.getElementById("demo").innerHTML = txt;
    }

    /*set current active page*/
    if(window.location.hash) {
          var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
          $("ul.nav-tabs li").removeClass('active');
          $("ul.nav-tabs li." + hash).addClass('active');

          $(".tab-content .tab-pane").removeClass('active');
          $(".tab-content #" + hash).addClass('active');
      } else {
          // No hash found
      }
    function unique(list) {
        var result = [];
        $.each(list, function(i, e) {
            if ($.inArray(e, result) == -1) result.push(e);
        });
        return result;
    }

    function is_active_tab (id) {
	  	$('.pro-tab li').removeClass('active');
	  	$("." + id).addClass('active');
	  }

	  function imgReult(file) {
		  var newImg = file.trim();
		  var res = newImg.split(".");
		  //{{Config::get('app.url')}}
		  var bodyImg = '<tr id="image-id-'+res[0]+'">'+
				'<td>'+
                      '<img src="/image/phpthumb/'+file+'?p=product&h=100&w=100" class="img-rounded" width="100" alt="test">'+
					'</td>'+
                  '<td>'+file+
                      '<input id="file-id-'+res+'" type="hidden" name="hiddenFiles[]" value="'+file+'">'+
                  '</td>'+
					'<td>'+
						'<a onclick="removeImg(&#39;'+res[0]+'&#39;);" href="javascript:;">Delete</a>'+
					'</td>'+
				'</tr>';
				return bodyImg;
	  }

	  function getsub(id,byLevel) {
		  var nextLevel = byLevel + 1;
		  $("#cat-sub-"+byLevel+" .list-group-item").removeClass('active');
		  $("#cat-list-" + id).addClass('active');
		  if(id) {
			  // homePage + 
			  $.ajax({
				    url:"/products/ajax?p=getprocat&id="+id + "&level=" + nextLevel,
				    type: "GET",
				    dataType: "json",
				    timeout: 3600,
				    success: function(response) {
					    if(response.html != '') {
					    	$("#cat-sub-"+byLevel+" .list-group-item").removeClass('has-sub');
					    	$("#cat-list-" + id).addClass('has-sub');
						    $("#cat-sub-" + response.level).html(response.html);

						    /*empty low level*/
						    if(nextLevel == 2) {
						    	$("#cat-sub-3").html('');
						    	$("#cat-sub-4").html('');
						    	$("#cat-sub-5").html('');
						    	$("#cat-sub-6").html('');
						    }
						    if(nextLevel == 3) {
						    	$("#cat-sub-4").html('');
						    	$("#cat-sub-5").html('');
						    	$("#cat-sub-6").html('');
						    }
						    if(nextLevel == 4) {
						    	$("#cat-sub-5").html('');
						    	$("#cat-sub-6").html('');
						    }
						    if(nextLevel == 5) {
						    	$("#cat-sub-6").html('');
						    }

					    }

					    /*add to tag*/
					    var tagHmtl = [];
					    $('#category-list .active').each(function (index, element) {
						    var num = index + 1;
						    var text = $('#category-list #cat-sub-'+num+' .active').text();
						    var id = $('#category-list #cat-sub-'+num+' .active').attr('data-id');
						    tagHmtl.push(id);
					    });
					    $("#tags").val(tagHmtl);
					    /*End add to tag*/
					},
				    error: function(x, t, m) {
				        if(t==="timeout") {
				            alert("got timeout");
				        } else {
				            alert(m);
				        }
				    }
				});
		  }
	  }
	  
	  if(jQuery("*").hasClass("product_datepicker")){
	         jQuery('.product_datepicker').datepicker({
	           format: "yyyy-mm-dd",
	            todayBtn: true,
	            clearBtn: true,
	            orientation: "top auto",
	            calendarWeeks: true,
	            autoclose: true,
	            todayHighlight: true,
	            toggleActive: true
	        });
	     }