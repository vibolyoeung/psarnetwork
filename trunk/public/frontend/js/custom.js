$(document).ready(function(){
	jQuery('.item:first-child').addClass(' active');
	jQuery('.bullet:first-child').addClass('active');
	jQuery('.tab-content .submenu-bar:first-child').addClass(' active');
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