$(document).ready(function filterLoad(){
	filterUsers();
	filterCategories();
	filterMarketType();
});

function filterUsers(){
	$('#btn_filter_user').click(function filterUser(){
		var filter_name = $('#filter_name').val();
		var filter_email = $('#filter_email').val();
		var filter_role = $('#filter_role').val();
		var filter_status = $('#filter_status').val();
		var url = '/admin/users/filter-user';
		$.ajax({
			url: baseUrl() + url,
			data: {
				filter_name:filter_name,
				filter_email:filter_email,
				filter_role:filter_role,
				filter_status:filter_status
				},
			success: function(html) {
				$('#result_filter_user').html(html);
			}
		});
	});
}

function filterCategories(){
	$('#btn_filter_category').click(function filterUser(){
		var filter_name_en = $('#filter_name_en').val();
		var filter_name_zh = $('#filter_name_zh').val();
		var filter_status  = $('#filter_status').val();
		var url = '/admin/filter_category';
		$.ajax({
			url: baseUrl() + url,
			data: {
				filter_name_en:filter_name_en,
				filter_name_zh:filter_name_zh,
				filter_status:filter_status
				},
			success: function(html) {
				$('#result_filter_category').html(html);
			}
		});
	});
}

function filterMarketType(){
	$('#btn_filter_market').click(function filterUser(){
		var filter_name_en = $('#filter_name_en').val();
		var filter_name_zh = $('#filter_name_zh').val();
		var filter_stair = $('#filter_stair').val();
		var filter_market_type  = $('#filter_market_type').val();
		var url = '/admin/filter-market';
		$.ajax({
			url: baseUrl() + url,
			data: {
				filter_name_en:filter_name_en,
				filter_name_zh:filter_name_zh,
				filter_stair:filter_stair,
				filter_market_type:filter_market_type
				},
			success: function(html) {
				$('#result_filter_market').html(html);
			}
		});
	});
}

function baseUrl(){
	return window.location.protocol+"//"+window.location.host;
}