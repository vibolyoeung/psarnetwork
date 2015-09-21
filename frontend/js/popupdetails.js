var popupDetails = (function(){
	"use strict"

	var add_popup_detail = function(product_id) {
		//alert(product_id);
		var productUrl = document.querySelector('#detail_product');
  		productUrl = productUrl.dataset.getDetailProductUrl;
  		//alert(productUrl);
  		$(".message-loading").show();
		$('#details_view').load(productUrl + 'product/js_detail/' + product_id, function() {
		});
	};

	return {
		add_popup_detail:add_popup_detail
	}
}());