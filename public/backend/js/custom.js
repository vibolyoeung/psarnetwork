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