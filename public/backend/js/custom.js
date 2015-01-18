$(document).ready(function() {
	$('.datepicker' ).datepicker({ dateFormat: 'dd/mm/yy' });
	
	$advPageId = $('#ads-page').val();
	if($advPageId > 0) {
		$('#ads-position').show();
		listAllPositions($advPageId);
	}
	$('#ads-page').change(function() {
		var id = $(this).val();
		if (0 == id) {
			$('#ads-position').hide();
		} else {
			$('#ads-position').show();
			listAllPositions(id);
		}
	});
	
	$('#provinces').change(function(){
		var id = $(this).val();
		listAllDistrictsByProvinceId(id);
	});
	
	$('input:radio[name="membership"]').change(function(){
		if ($(this).is(':checked') && $(this).val() == '1') {
			$('#search_by_name').show();
		} else {
			$('#search_by_name').hide();
		}
	});
	
	$('#search_by_name').blur(function getUserName() {
		var username = $(this).val();
		$.ajax({
			url: '/admin/list-user/',
			data: {name: username},
			type: "POST",
			success: function(data) {
				console.log(data);
			},
		});
	});
	
	messageDropdown();
	alertDropdown();
	dashboardCollapse();
});

/**
 * isClientUser: this function using for showing user type
 */
function isAdvertiserDisplay(){
	$("#isAdvertiser").change(function(){
		var is_advertiser = $('#isAdvertiser').val();
		if(1 == is_advertiser){
			$('#isAdvertiserOption').show();
		}else{
			$('#isAdvertiserOption').hide();
		}
	});
}

function listAllPositions(id) {
	$.ajax({
		url: '/admin/list-ads-positions/' + id,
		success: function(data) {
			var option = '';
			$.each(data, function(id, name) {
				option += '<option value="' + id + '">' + name + '</option>';
			});
			$('#ads-position').html(option);
		},
	});
}

function listAllDistrictsByProvinceId(id) {
	$.ajax({
		url: '/admin/list-district/' + id,
		success: function(data) {
			var option = '';
			$.each(data, function(id, name) {
				option += '<option value="' + id + '">' + name + '</option>';
			});
			$('#district_option').html(option);
		},
	});
}

function messageDropdown(){
	$('.class-message').click(function(){
		$('.message-list').slideToggle();
	});
}
function alertDropdown(){
	$('.class-alert').click(function(){
		$('.alert-list').slideToggle();
	});
}
function dashboardCollapse(){
	$('#new_product_post_title').click(function(){
		$('#new_product_post').slideToggle();
		$('#business_page_register,#personal_page_register,#point_to,#banners_ads,#product_ads').slideUp();
	});
	$('#business_page_register_title').click(function(){
		$('#business_page_register').slideToggle();
		$('#new_product_post,#personal_page_register,#new_product_post,#point_to,#banners_ads').slideUp();
	});
	$('#personal_page_register_title').click(function(){
		$('#personal_page_register').slideToggle();
		$('#new_product_post,#business_page_register,#product_ads,#point_to,#banners_ads').slideUp();
	});
	
	$('#product_ads_title').click(function(){
		$('#product_ads').slideToggle();
		$('#business_page_register,#personal_page_register,#new_product_post,#point_to,#banners_ads').slideUp();
	});
	$('#banners_ads_title').click(function(){
		$('#banners_ads').slideToggle();
		$('#new_product_post,#personal_page_register,#product_ads,#new_product_post,#point_to').slideUp();
	});
	$('#point_to_title').click(function(){
		$('#point_to').slideToggle();
		$('#new_product_post,#personal_page_register,#product_ads,#new_product_post,#banners_ads').slideUp();
	});
	
}





