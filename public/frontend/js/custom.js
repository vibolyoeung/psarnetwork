$(document).ready(function(){
	jQuery('.datepicker' ).datepicker({ dateFormat: 'dd/mm/yy' });

	jQuery('.item:first-child').addClass(' active');
	jQuery('.bullet:first-child').addClass('active');
	jQuery('.tab-content .submenu-bar:first-child').addClass(' active');
	jQuery('#myCarousel').carousel({
          interval: 5000
	  });

	jQuery('#menuSub li ul:has(> li)').hide();
	jQuery('#menuSub li.active ul:has(> li)').slideDown();
    
	   
	jQuery('#slider-carousel.carousel').carousel({
		interval: 5000
	});
	
	jQuery('.carousel').carousel({
		interval: false
	});
	
	 $('#DetailCarousel,#DetailPopupCarousel').carousel({
         interval: 5000
	 });
	
	 $('#carousel-text').html($('#slide-content-0').html());

	$('[id^=popup-carousel-selector-]').click( function(){
	     var id = this.id.substr(this.id.lastIndexOf("-") + 1);
	     var id = parseInt(id);
	     $('#DetailPopupCarousel').carousel(id);
	 });
	
	  //Handles the carousel thumbnails
	$('[id^=carousel-selector-]').click( function(){
	     var id = this.id.substr(this.id.lastIndexOf("-") + 1);
	     var id = parseInt(id);
	     $('#DetailCarousel').carousel(id);
	 });
	
	 // When the carousel slides, auto update the text
	 $('#DetailCarousel').on('slid.bs.carousel', function (e) {
	          var id = $('.item.active').data('slide-number');
	         $('#carousel-text').html($('#slide-content-'+id).html());
	 });

	  $('#DetailPopupCarousel').on('slid.bs.carousel', function (e) {
	          var id = $('.item.active').data('slide-number');
	         $('#carousel-text').html($('#slide-content-'+id).html());
	 });
	
	//For switching list view
	jQuery(".product_list_container").addClass(" col-lg-4")
	jQuery(".product_image").addClass(" col-lg-6");
	
	
	jQuery("#grid_view").click(function(){
		jQuery(this).css("color","red");
		jQuery("#list_view,#social_view").css("color","black");
		jQuery(".product_list_container").removeClass().addClass("product_list_container col-lg-4");
		jQuery(".media-body,.social_desc").removeClass().addClass("media-body");
		jQuery(".product_image").removeClass().addClass("pull-left product_image col-lg-6");
	});

	jQuery("#list_view").click(function(){
		jQuery(this).css("color","red");
		jQuery("#grid_view,#social_view").css("color","black");
		jQuery(".product_list_container").removeClass().addClass("product_list_container col-lg-12");
		jQuery(".media-body,.social_desc").removeClass().addClass("media-body col-lg-12");
		jQuery(".product_image").removeClass().addClass("pull-left product_image col-lg-2");
	});
	
	jQuery("#social_view").click(function(){
		jQuery(this).css("color","red");
		jQuery("#list_view,#grid_view").css("color","black");
		jQuery(".product_list_container").removeClass().addClass("product_list_container col-lg-6 col-centered");
		jQuery(".product_image").removeClass().addClass("pull-left product_image col-lg-12");
		jQuery(".media-body").removeClass().addClass("social_desc col-lg-12");
		jQuery(".media-heading").css("margin-top","20");
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