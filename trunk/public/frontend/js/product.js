/**
 * To do operation for append button browse 
 */
var Product = (function() {
    "use strict";


    /**
     * Append button browse 
     *
     * @public
     * @return void
     */
    var add_more_fields = function() {
    	var parent;
		var children;
		var htmlField = "<div class='form-group'>"+
				"<label class='col-sm-2 control-label'>"+
					"<i onclick='remove_field()' class='glyphicon glyphicon-minus browse-picture-menus'></i>"+
				"</label>"+
				"<div class='col-sm-10'>"+
					"<input type='file' name='picture[]' class='form-control' />"+
				"</div>"+
			"</div>";
		parent = document.getElementById('more_browse_field');
		children = document.createElement('div');
		children.innerHTML = htmlField;
		parent.appendChild(children);
	};
	var remove_field = function(){
		alert(1);
	};
	return {
		add_more_fields : add_more_fields
	};

}());