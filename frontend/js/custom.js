$(document).ready(function(){

	jQuery('#hotpromotion-item-carousel').carousel({
		 pause: true,
    	 interval: false
	});

	jQuery('.datepicker' ).datepicker({ 
		dateFormat: "yy-mm-dd",
		changeMonth: true,
    	changeYear: true,
        autoclose: true,
        todayHighlight: true,
	});
	$(".datepicker").datepicker("setDate", new Date());
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
	jQuery('#slider-home').carousel({
		interval: true,
		interval: 5000
	});
	
	 $('#DetailCarousel,#DetailPopupCarousel').carousel({
         interval: 5000
	 });
	
	 $('#carousel-text').html($('#slide-content-0').html());
	 
	   //Handles the carousel thumbnails
	$('[id^=carousel-selector-]').click( function(){
	     var id = this.id.substr(this.id.lastIndexOf("-") + 1);
	     var id = parseInt(id);
	     $('#DetailPopupCarousel').carousel(id);
	 });

	$('[id^=popup-carousel-selector-]').click( function(){
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
	
	jQuery("#grid_view").css("color","red");
	jQuery("#grid_view").click(function(){
		jQuery(this).css("color","red");
		jQuery("#list_view,#social_view").css("color","black");
		jQuery(".product-list-item > .product_image > img.small").removeClass("hide-social");
		jQuery(".product-list-item > .product_image > img.big").removeClass("show-social");
		jQuery(".product_list_container").removeClass().addClass("product_list_container col-lg-4");
		jQuery(".media-body,.social_desc").removeClass().addClass("media-body");
		jQuery(".product_image").removeClass().addClass("pull-left product_image col-lg-6");
	});

	jQuery("#list_view").click(function(){
		jQuery(this).css("color","red");
		jQuery("#grid_view,#social_view").css("color","black");
		jQuery(".product-list-item > .product_image > img.small").removeClass("hide-social");
		jQuery(".product-list-item > .product_image > img.big").removeClass("show-social");
		jQuery(".product_list_container").removeClass().addClass("product_list_container col-lg-12");
		jQuery(".media-body,.social_desc").removeClass().addClass("media-body col-lg-12");
		jQuery(".product_image").removeClass().addClass("pull-left product_image col-lg-2");
	});
	
	jQuery("#social_view").click(function(){
		jQuery(this).css("color","red");
		jQuery("#list_view,#grid_view").css("color","black");
		jQuery(".product-list-item > .product_image > img.small").addClass(" hide-social");
		jQuery(".product-list-item > .product_image > img.big").addClass(" show-social");
		jQuery(".product_list_container").removeClass().addClass("product_list_container col-lg-8 col-centered");
		jQuery(".product_image").removeClass().addClass("pull-left product_image col-lg-12");
		jQuery(".media-body").removeClass().addClass("social_desc col-lg-12");
		jQuery(".media-heading").css("margin-top","20");
	});

	jQuery('#disply-number').change(function () {
		var fullUrl = window.location.href;
		var lastParam = fullUrl.substring(fullUrl.lastIndexOf('&')) + 1;
		displayNumber = $(this).val();
		var displayNumParam = lastParam.split('=')[0];
		// check condition for avoid adding duplicate param
		if (displayNumParam === '&displayNumber') {
			fullUrl = fullUrl.split('&displayNumber')[0];
		}
		refresh_page_with_param_added(fullUrl, displayNumber);
	});

	$(".slideshow-group").colorbox({rel:'slideshow-group'});

});

function refresh_page_with_param_added(url, displayNumber) {
	window.location.href = url + '&displayNumber=' + displayNumber;
}

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