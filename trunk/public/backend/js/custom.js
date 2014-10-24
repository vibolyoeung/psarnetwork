$(document).ready(function() {
	$( '.datepicker' ).datepicker();
	
	$('#ads-page').change(function() {
		var id = $(this).val();
		listAllPositions(id);
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
				console.log(name);
				option += '<option value="' + id + '">' + name + '</option>';
			});
			$('#ads-position').html(option);
		},
	});
}