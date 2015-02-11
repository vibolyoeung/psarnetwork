$(document).ready(function() {
	$('.datepicker' ).datepicker({ dateFormat: 'dd/mm/yy' });
	
	// call list advertisement pages
	$advCatPageId = $('#ads-cat-page').val();
	if($advCatPageId > 0) {
		$('#ads-page').show();
		listAdvPage($advCatPageId);
	}
	$('#ads-cat-page').change(function() {
		var id = $(this).val();
		if (0 == id) {
			$('#ads-page').hide();
			$('#ads-position').hide();
		} else {
			$('#ads-page').show();
			listAdvPage(id);
		}
	});
	
	// call list position
	$advPageId = $('#ads-page').val();
	if(!$advPageId) {
		$advPageId = $('#adv-hid').val();
	}
	console.log($advPageId);
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
	
	// show search by name is checked
	if($('input:radio[name="membership"]:checked').val() == '1') {
		$('#search_by_name').show();
	}
	
	$('input:radio[name="membership"]').on('change', function(){
		if ($(this).is(':checked') && $(this).val() == '1') {
			$('#search_by_name').show();
			var username = $('#search_by_name').val();
			if (username) {
				getClientByName(username);
			}
		} else {
			$('#search_by_name').hide();
			clearUserInfo();
		}
	});
	
	$('#search_by_name').on('blur', function getUserName() {
		var username = $(this).val();
		getClientByName(username);
	});
	
	$('#incharger').on('blur', function getUserName() {
		var username = $(this).val();
		getAdminUserByName(username);
	});
	
	messageDropdown();
	alertDropdown();
	dashboardCollapse();
	AccessPermissionSelectAll();
	ModifyPermissionSelectAll();
});

function getClientByName(username) {
	$.ajax({
		url: '/admin/list-user/',
		data: {name: username},
		type: "GET",
		success: function(data) {
			if (typeof data[0] === "undefined") {
				clearUserInfo();
			} else {
				$('#username').val(data[0].name);
				$('#email').val(data[0].email);
				$('#address').val(data[0].address);
				$('#phone_number').val(data[0].telephone);
				$('#user_id').val(data[0].id);
			}
		},
	});
}

function getAdminUserByName(username) {
	$.ajax({
		url: '/admin/list-user-admin/',
		data: {name: username},
		type: "GET",
		success: function(data) {
			if (typeof data[0] === "undefined") {
				$('#hid_incharger').val('');
			} else {
				$('#hid_incharger').val(data[0].id);
			}
		},
	});
}

function clearUserInfo() {
	$('#username').val('');
	$('#email').val('');
	$('#address').val('');
	$('#phone_number').val('');
	$('#user_id').val('');
}

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
			$.each(data, function(ps_id, name) {
				var selected = '';
				var oldId = $('#pos-hid').val();
				if(oldId == ps_id) {
					selected = 'selected = selected';
				}
				option += '<option ' + selected + ' value="' + ps_id + '">' + name + '</option>';
			});
			$('#ads-position').html(option);
		},
	});
}

function listAdvPage(id) {
	$.ajax({
		url: '/admin/list-ads-pages/' + id,
		success: function(data) {
			var option = '';
			var oldId = $('#adv-hid').val();
			$.each(data, function(cate_adv_id, name) {
				var selected = '';
				if(oldId == cate_adv_id) {
					selected = 'selected = selected';
				}
				option += '<option ' + selected + ' value="' + cate_adv_id + '">' + name + '</option>';
			});
			$('#ads-page').html(option);
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

function AccessPermissionSelectAll() {
	$('#accessselectall').click(function(){
		$(".permission_access").prop("checked", true);
	});
	$('#accessdeselectall').click(function(){
		$(".permission_access").prop("checked", false);
	});
	
}

function ModifyPermissionSelectAll() {
	$('#modifyselectall').click(function(){
		$(".modify_access").prop("checked", true);
	});
	$('#modifydeselectall').click(function(){
		$(".modify_access").prop("checked", false);
	});
}




