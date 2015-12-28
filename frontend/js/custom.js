$(document).ready(function(){

	jQuery('#hotpromotion-item-carousel,#similar-product,#DetailCarousel,#DetailPopupCarousel').carousel({
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
	//jQuery(".datepicker").datepicker("setDate", new Date());
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

	jQuery("#grid_view").css("background-color","f0ad4e");
	jQuery(".list_view_product").hide();
	jQuery("#grid_view").click(function(){
		jQuery("#grid_view").css("background-color","f0ad4e");
		jQuery("#list_view").css("background-color","");
		jQuery(".list_view_product").hide();
		jQuery(".grid_view_product").show();
	});

	jQuery("#list_view").click(function(){
		jQuery("#grid_view").css("background-color","");
		jQuery(this).css("background-color","f0ad4e");
		jQuery(".grid_view_product").hide();
		jQuery(".list_view_product").show();
	});

	jQuery('#disply-number').change(function () {
		var fullUrl = window.location.href;
		var isCategory = false;
		var lastParam = '';
		var displayNumParam = '';
		var concateParam = '&';
		// check if category page
		if (fullUrl.split('/')[4] === 'productbycategories'||fullUrl.split('/')[4] === 'list'||fullUrl.split('/')[4] === 'transfter_type') {
			concateParam = '?';
		}

		displayNumber = $(this).val();

		lastParam = fullUrl.substring(fullUrl.lastIndexOf(concateParam)) + 1;
		displayNumParam = lastParam.split('=')[0];
		// check condition for avoid adding duplicate param
		var appenUrl = concateParam + 'displayNumber';
		if (displayNumParam === appenUrl) {
			fullUrl = fullUrl.split(appenUrl)[0];
		}
		window.location.href = fullUrl + appenUrl + '=' + displayNumber;
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