$(document).ready(function(){
    $('#agreement').click(function () {
        if($(this).is(":checked")) {
            $("#summit").removeAttr("disabled");
        } else {
            $("#summit").attr('disabled',true);
        }
    });
        $("#PersonalForm").validate({
          rules: {
              name:"required",
              eMail: {
                 required : true,
                 email: true
              },
               telephone: {
                 required : true,
              },
               Location: {
                 required : true,
              },
               MappingAddressHere: {
                 required : true,
              },
              cPass: {
                 required : true,
                 minlength: 8
              },
              nPass: {
                 required : true,
                 minlength: 8
              },
              rPass: {
                 required : true,
                 minlength: 8,
                 equalTo : "#nPass"
              }
          },
          messages:{
              name: {
                required : "This Full Name is required."
              },
              telephone: {
                required : "Please provide a Phone Number"
              },
              Location: {
                required : "Please provide a Location"
              },
              cPass: {
                required : "This current password is required."
              }
          },
       invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          //$("#summit").attr('disabled',true);
        } else {
          //$("#summit").attr('disabled',true); MappingAddressHere
        }
       },
       highlight: function(element, errorClass, validClass) {
        $(element).parent().removeClass('has-success').addClass('has-error has-feedback').removeClass(validClass);
        $(element.form).find("span[data=" + element.id + "]").removeClass('glyphicon-ok').addClass('glyphicon-remove');
      },
      unhighlight: function(element, errorClass, validClass) {
        //$(element).removeClass(errorClass).addClass(validClass);
        $(element).parent().removeClass('has-error has-feedback').addClass(validClass);
        $(element).parent().addClass('has-success has-feedback').removeClass(validClass);
        $(element.form).find("span[data=" + element.id + "]").removeClass('glyphicon-remove').addClass('glyphicon-ok');
      }
    });
    
    if(window.location.hash) {
      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
      if(hash == 'password') {
            //addMore
    	    $(".tab-pane").addClass(" active");
            var htmlPass = '<div class="form-group" style="margin-right:0;">'+
                            '<label for="cPass" class="col-sm-4 control-label">'+
                            'Password'+
                            '</label>'+
                                '<div class="col-sm-8">'+
                                    '<div class="row changepassword">'+
                                        '<div class="form-group">'+
                                            '<label for="cPass" class="col-sm-4 control-label">'+
                                            'Current'+
                                            '</label>'+
                                            '<div class="col-sm-8">'+
                                            '<input type="password" value="" name="cPass" class="form-control" id="cPass" placeholder="" required />'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group">'+
                                            '<label for="nPass" class="col-sm-4 control-label">'+
                                            'New'+
                                            '</label>'+
                                            '<div class="col-sm-8">'+
                                            '<input type="password" value="" name="nPass" class="form-control" id="nPass" placeholder="" required />'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group">'+
                                            '<label for="rPass" class="col-sm-4 control-label">'+
                                            'Re-type new'+
                                            '</label>'+
                                            '<div class="col-sm-8">'+
                                            '<input type="password" value="" name="rPass" class="form-control" id="rPass" placeholder="" required />'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
            $('#addMore').html(htmlPass);
      }
      // hash found
  } else {
	 // alert('No Hash found');
      // No hash found
  }
});