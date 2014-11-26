$(document).ready(function() {
	$( '.datepicker' ).datepicker({ dateFormat: 'dd/mm/yy' });
	$('#ads-page').change(function() {
		var id = $(this).val();
		if (0 == id) {
			$('#ads-position').parent().hide();
		} else {
			$('#ads-position').parent().show();
			listAllPositions(id);
		}
	});
	
	$('#provinces').change(function(){
		var id = $(this).val();
		listAllDistrictsByProvinceId(id);
	});
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