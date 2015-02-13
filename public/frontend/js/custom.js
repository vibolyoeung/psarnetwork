$(document).ready(function(){
	jQuery('.item:first-child').addClass(' active');
	jQuery('.bullet:first-child').addClass('active');
	jQuery('.tab-content .submenu-bar:first-child').addClass(' active');
	jQuery('#myCarousel').carousel({
          interval: 5000
	  });
	
	jQuery('#carousel-text').html($('#slide-content-0').html());
	
	  //Handles the carousel thumbnails
	jQuery('[id^=carousel-selector-]').click( function(){
	      var id = this.id.substr(this.id.lastIndexOf("-") + 1);
	      var id = parseInt(id);
	      jQuery('#myCarousel').carousel(id);
	  });
	
	
	  // When the carousel slides, auto update the text
	jQuery('#myCarousel').on('slid.bs.carousel', function (e) {
	           var id = $('.item.active').data('slide-number');
	          $('#carousel-text').html($('#slide-content-'+id).html());
	  });
});

function user_register(cos,vals){
   if($(cos).is(':checked')) {
       $("#chooseuser").removeAttr('disabled');
       $("#chooseuser").attr('href', vals);
   }
}
function dynamicModal(id){
    $('#dynamicModal').modal('show');
    if(id=='loading') {
       $('#ModalLoading').show(); 
    } else {
       $('#ModalLoading').hide();  
    }
    
   	if(is_modal_opened==1) {
		modalClose();
	}

    modal_id = id;
	is_modal_opened = 1;
	if($('div#'+id).size()==1) {
		$('div#overrideContent').append($('div#'+id));
	}
    $('div#'+id).show();
}
function modalClose() {
    
    $("#dynamicModal").modal('hide');
   	$('div#'+modal_id).hide();
   	modal_id = '';
	is_modal_opened = 0;
}