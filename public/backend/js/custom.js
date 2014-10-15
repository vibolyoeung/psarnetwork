/**
 * isClientUser: this function using for showing user type
 */
function isClientUser(){
	$("#user_type").change(function(){
		var user_type = $('#user_type').val();
		if(4 == user_type){
			$('#isShowOption').show();
		}else{
			$('#isShowOption').hide();
		}
	});
}