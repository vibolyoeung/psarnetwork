function lagXHRobjekt() {
	var XHRobjekt = null;

	try {
		ajaxRequest = new XMLHttpRequest(); // Firefox, Opera, ...
	} catch (err1) {
		try {
			ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); // Noen IE v.
		} catch (err2) {
			try {
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); // Noen IE v.
			} catch (err3) {
				ajaxRequest = false;
			}
		}
	}
	return ajaxRequest;
}


function menu_updatesort(jsonstring,deleteAll) {
	mittXHRobjekt = lagXHRobjekt();

	if (mittXHRobjekt) {
		mittXHRobjekt.onreadystatechange = function() {
			if (ajaxRequest.readyState == 4) {
				var ajaxDisplay = document.getElementById('sortDBfeedback');
				ajaxDisplay.innerHTML = ajaxRequest.responseText;
			} else {
				// Uncomment this an refer it to a image if you want the loading gif
				//document.getElementById('sortDBfeedback').innerHTML = "<img style='height:11px;' src='images/ajax-loader.gif' alt='ajax-loader' />";
			}
		}
        //homePage + "member/getsubmenu?id=" + eTo + '&type=updateMenu'
		ajaxRequest.open("GET", homePage + "member/getsubmenu?jsonstring=" + jsonstring + "&rand=" + Math.random() * 9999 + "&type=updateMenu&id=1&del="+deleteAll, true);
		ajaxRequest.send(null);
	}
}

function add4sub(Dduplicate, Sduplicate, Subduplicate, mainSubCategory, Fist4SubList, list4SubMenu, Fist4SubList1, add4SubChild) {
	if (!Subduplicate) {
		var countSubListExist = $('#result #item-' + Dduplicate + Dduplicate + ' #item-' + mainSubCategory + ' .dd-list .dd-item').length;
		if (countSubListExist < 1) { /*2st sub not duplicate and 3nd Sub not duplicate*/
			if (!Dduplicate && !Sduplicate) {
				$('#result').append(Fist4SubList);
			} else if (Dduplicate && Sduplicate) {
				$('#result #item-' + mainSubCategory + ' #sub2-' + mainSubCategory).append(add4SubChild);
				//$(add4SubChild).insertAfter('#result #item-' + mainSubCategory + ' .item-' + mainSubCategory);
			}
		} else {
			$('#result #item-' + mainSubCategory + ' #sub2-' + mainSubCategory).append(list4SubMenu);
		}
	}
}

function getDataSelect(id, eTo) {
	$.ajaxSetup({
		async: false
	});
	var str = [];
	$.ajax({
		url: homePage + "member/getsubmenu?id=" + eTo + '&type=name',
		type: "get",
		dataType: "json",
		async: false,
		success: function(data) {
			str.push({
				id: data[0].id,
				name: data[0].name_en
			});
		}
	});
	//        $.getJSON( "{{Config::get('app.url')}}/member/getsubmenu?id="+eTo+'&type=name', function( data ) { 
	//            str.push({id:data[0].id, name:data[0].name_en});
	//        });              
	return str;
}

function buildMenu(data) {
	var str = '';
	var i;
	newSub = 'sub-a';
	$("#menu_results").html('');
	for (i = 0; i < data.length; i++) {
		var returnValue = getDataSelect('Category', data[i].id);
		if (returnValue) {
			if (data[i].children.length < 1) {
				var links = '<a href="javascript:;">' + returnValue[0].name + '</a>';
				str += '<li id="' + newSub + data[i].id + '">' + links + '</li>';
			} else { /*Sub A*/
				var Child_a = data[i].children;
				var j;
				var linksA = '';
				for (j = 0; j < Child_a.length; j++) {
					var returnValue_A = getDataSelect('SubCategory', Child_a[j].id);
					if (returnValue_A) {
						if (Child_a[j].children.length < 1) {
							var strA = '<a href="javascript:;">' + returnValue_A[0].name + '</a>';
							linksA += '<li id="sub-a' + Child_a[j].id + '">' + strA + '</li>';
						} else {

							/*Sub B*/
							var Child_b = Child_a[j].children;
							var k;
							var linksB = '';
							for (k = 0; k < Child_b.length; k++) {
								var returnValue_B = getDataSelect('SSubCategory', Child_b[k].id);
								if (returnValue_B) {
									var strB = '<a href="javascript:;">' + returnValue_B[0].name + '</a>';
									linksB += '<li id="sub-a' + Child_b[k].id + '">' + strB + '</li>';
								}
							} /*end Sub B*/

							var a_b = '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' + returnValue_A[0].name + ' <span class="caret"></span></a>';
							linksA += '<li class="dropdown">' + a_b + '<ul class="dropdown-menu" role="menu">' + linksB + '</ul>' + '</li>';
						}
					}
				} /*end Sub A*/




				var a = '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' + returnValue[0].name + ' <span class="caret"></span></a>';
				var hasChildrenA = 'sub';
				var links = '<li id="' + newSub + data[i].id + '">' + a + hasChildrenA + '</li>';
				str += '<li class="dropdown">' + a + '<ul class="dropdown-menu" role="menu">' + linksA + '</ul>' + '</li>';
			}
		}

	}
	var home_link = '<li class="active"><a href="javascript:;">Home</a></li>';
	$("#menu_results").html(home_link + str);
	$("#Dmenu_results").html(home_link + str);
}

$(document).ready(function() { /*create menu by get*/
	var returnValue = getDataSelect('Main-Menu', 19);
	if (returnValue) {
		//console.log(returnValue[0].name);
	} /*end get select*/

	var updateOutput = function(e) {
		var list = e.length ? e : $(e.target),
			output = list.data('output');
		if (window.JSON) {
			buildMenu(list.nestable('serialize'));
			output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            menu_updatesort(window.JSON.stringify(list.nestable('serialize')),0);
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};
	$('#nestable3').nestable({
		group: 1
	}).on('change', updateOutput);

	// output initial serialised data
	updateOutput($('#nestable3').data('output', $('#nestable3-output')));


	$('#Main-Menu').change(function() {
		$("#Category").html('<option value="">Select one</option>').attr("disabled", "selected");
		$("#SubCategory").html('<option value="">Select one</option>').attr("disabled", "selected");
		var selected = $("#Main-Menu option:selected").val();
		if (selected) { /* Send the get using post and put the results in a div */
			$.ajax({
				url: homePage + "member/getsubmenu?id=" + selected,
				type: "get",
				success: function(datas) {
					$("#Category").html(datas).removeAttr("disabled", "disabled");
				}
			});
		} else {
			alert('please select one');
		}
	});
	$('#Category').change(function() {
		var selectedG = $("#Category option:selected").val();
		if (selectedG) {
			$("#SubCategory").html('<option value="">Select one</option>').attr("disabled", "selected"); /* Send the data using get and put the results in a div */
            $("#SSubCategory").html('<option value="">Select one</option>').attr("disabled", "selected");
			$.ajax({
				url: homePage + "member/getsubmenu?id=" + selectedG,
				type: "get",
				success: function(datas) {
					$("#SubCategory").html(datas).removeAttr("disabled", "disabled");
				}
			});
		} else {
			alert('please select one');
		}
	});
	$('#SubCategory').change(function() {
		var selectedG = $("#SubCategory option:selected").val();
		if (selectedG) {
			$("#SSubCategory").html('<option value="">Select one</option>').attr("disabled", "selected"); /* Send the data using get and put the results in a div */
			$.ajax({
				url: homePage + "member/getsubmenu?id=" + selectedG,
				type: "get",
				success: function(datas) {
					$("#SSubCategory").html(datas).removeAttr("disabled", "disabled");
				}
			});
		} else {
			alert('please select one');
		}
	});



	$("#PersonalForm").validate({
		rules: {
			FullName: {
				required: true
			}
		},
		messages: {
			FullName: {
				required: "This Full Name is required."
			}
		}
	});

	$('#submitcat').click(function() {
		//var selectedG = $("#Category option:selected").val();
		var mainMenu = $('#Main-Menu option:selected').val();
		var mainCategory = $('#Category option:selected').val();
		var mainCategoryText = $('#Category option:selected').text();
		var mainSubCategory = $('#SubCategory option:selected').val();
		var mainSubCategoryText = $('#SubCategory option:selected').text();

		var mainSubSubCategory = $('#SSubCategory option:selected').val();
		var mainSubSubCategoryText = $('#SSubCategory option:selected').text();

		/*check duplicatae Category data*/
		var Dduplicate = [];
		$('#result .dd-item').each(function() {
			if ($(this).attr('data-id') == mainCategory) {
				Dduplicate.push(mainCategory);
			}
		}); /*end check duplicatae Category data*/

		/*check duplicatae SubCategory data*/
		var Sduplicate = [];
		$('#result li.dd-item ol.dd-list .dd-item').each(function() {
			if ($(this).attr('data-id') == mainSubCategory) {
				Sduplicate.push(mainSubCategory);
			}
		}); /*end check duplicatae SubCategory data*/

		/*check duplicatae Sub SubCategory data*/
		var Subduplicate = [];
		if (mainSubCategory) {
			$('#result li.dd-item ol.dd-list .dd-item ol.dd-list .dd-item').each(function() {
				if ($(this).attr('data-id') == mainSubSubCategory) {
					Subduplicate.push(mainSubSubCategory);
				}
			});
		}

		/*end check duplicatae sub SubCategory data*/


		if (mainSubSubCategory) {
			var Fist4SubList = '<li class="dd-item dd3-item" data-id="' + mainCategory + '" id="item-' + mainCategory + mainCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainCategory + '">' + mainCategoryText + '</div>' + '<ol class="dd-list" id="sub1-' + mainCategory + '">' + '<li class="dd-item dd3-item" data-id="' + mainSubCategory + '" id="item-' + mainSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubCategory + '">' + mainSubCategoryText + '</div>' + '<ol class="dd-list" id="sub2-' + mainSubCategory + '">' + '<li class="dd-item dd3-item" data-id="' + mainSubSubCategory + '" id="item-' + mainSubSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubSubCategory + '">' + mainSubSubCategoryText + '</div>' + '<ol class="dd-list" id="sub3-' + mainSubSubCategory + '">' + '</ol>' + '</li>' + '</ol>';
			'</li>' + '</ol>';
			var addChild = Fist4SubList;
			var Fist4SubList1 = '<li class="dd-item dd3-item" data-id="' + mainSubCategory + '" id="item-' + mainSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubCategory + '">' + mainSubCategoryText + '</div>' + '<ol class="dd-list" id="sub2-' + mainSubCategory + '">' + '<li class="dd-item dd3-item" data-id="' + mainSubSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubSubCategory + '">' + mainSubSubCategoryText + '</div>' + '<ol class="dd-list" id="sub3-' + mainSubSubCategory + '">' + '</ol>' + '</li>' + '</ol>';
			var list4SubMenu = '<li class="dd-item dd3-item" data-id="' + mainSubSubCategory + '" id="item-' + mainSubSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div>' + '<div class="dd3-content" item-' + mainSubSubCategory + '">' + mainSubSubCategoryText + '</div>' + '<ol class="dd-list" id="sub3-' + mainSubSubCategory + '">' + '</ol>' + '</li>';
			var add4SubChild = '<li class="dd-item dd3-item" data-id="' + mainSubSubCategory + '" id="item-' + mainSubSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubSubCategory + '">' + mainSubSubCategoryText + '</div>' + '<ol class="dd-list" id="sub3-' + mainSubSubCategory + '">' + '</ol>' + '</li>';
		} else {
			var add4SubChild = '';
			var Fist4SubList1 = '';
		}
		if (mainMenu && mainCategory) {
			if (mainCategory && !mainSubCategory) {
				var MlistMenu = '<li class="dd-item dd3-item" data-id="' + mainCategory + '" id="item-' + mainCategory + mainCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div>' + '<div class="dd3-content item-' + mainCategory + '">' + mainCategoryText + '</div>' + '<ol class="dd-list" id="sub1-' + mainCategory + '">' + '</ol>' + '</li>';
				if (!Dduplicate[0]) {
					$('#result').append(MlistMenu);
				}
			} else if (mainCategory && mainSubCategory && !mainSubSubCategory) {
				var FistList = '<li class="dd-item dd3-item" data-id="' + mainCategory + '" id="item-' + mainCategory + mainCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainCategory + '">' + mainCategoryText + '</div>' + '<ol class="dd-list" id="sub1-' + mainCategory + '">' + '<li class="dd-item dd3-item" data-id="' + mainSubCategory + '" id="item-' + mainSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubCategory + '">' + mainSubCategoryText + '</div>' + '<ol class="dd-list" id="sub2-' + mainSubCategory + '">' + '</ol>' + '</li>' + '</ol>';

				var listMenu = '<li class="dd-item dd3-item" data-id="' + mainSubCategory + '" id="item-' + mainSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div>' + '<div class="dd3-content item-' + mainSubCategory + '">' + mainSubCategoryText + '</div>' + '<ol class="dd-list" id="sub2-' + mainSubCategory + '">' + add4SubChild + '</ol>' + '</li>';
				var addChild = '<li class="dd-item dd3-item" data-id="' + mainSubCategory + '" id="item-' + mainSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div><div class="dd3-content item-' + mainSubCategory + '">' + mainSubCategoryText + '</div>' + '<ol class="dd-list" id="sub2-' + mainSubCategory + '">' + '</ol>' + '</li>';
				var Fist4SubList1 = listMenu;
			} else if (mainCategory && mainSubCategory && mainSubSubCategory) { /*add 4th sub list*/
				var listMenu = '<li class="dd-item dd3-item" data-id="' + mainSubCategory + '" id="item-' + mainSubCategory + '">' + '<div class="remove-div"></div><div class="dd-handle dd3-handle">Drag</div>' + '<div class="dd3-content item-' + mainSubCategory + '">' + mainSubCategoryText + '</div>' + '<ol class="dd-list" id="sub2-' + mainSubCategory + '">' + add4SubChild + '</ol>' + '</li>';
				add4sub(Dduplicate[0], Sduplicate[0], Subduplicate[0], mainSubCategory, Fist4SubList, list4SubMenu, Fist4SubList1, add4SubChild);
			} /*1st Sub not duplicate*/
			if (!Dduplicate[0] && !Sduplicate[0] && !Subduplicate[0]) {
				$('#result').append(FistList);
			} else if (Dduplicate[0] && !Sduplicate[0] && !Subduplicate[0]) { /*1st sub is exist  and 2nd Sub not duplicate*/
				var countListExist = $('#result #item-' + mainCategory + mainCategory + ' .dd-item').length;
				console.log('count main sub: ' + countListExist);
				if (countListExist > 0) { /*update for duplicate 1st sub*/
					console.log('1ok, 2no, if have more than 1');
					$('#result li#item-' + mainCategory + mainCategory + ' ol#sub1-' + mainCategory).append(listMenu);

				} else {
					console.log('1ok, 2no, if have less than 1');
					//$(addChild).insertAfter('#result #item-' + mainCategory + mainCategory + ' .item-' + Dduplicate[0]);
					var countFistSub = $('#result #item-' + mainCategory + mainCategory).length;

					if (countFistSub > 0) {
						$('#result li#item-' + mainCategory + mainCategory + ' ol#sub1-' + mainCategory).append(Fist4SubList1);
					} else {
						$('#result li#item-' + mainCategory + mainCategory + ' ol#sub1-' + mainCategory).append(addChild);
					}
				}

				/*4th Sub not duplicate*/
				if (!Subduplicate[0]) {
					//$(add4SubChild).insertAfter('#result #item-' + mainSubCategory + ' .item-' + mainSubCategory);
					//$('#result li#item-' + mainCategory + mainCategory + ' ol#sub1-' + mainCategory).append(add4SubChild);
				} else {
					console.log('33333');
				}
			} else if (Dduplicate[0] && Sduplicate[0] && !Subduplicate[0]) {
				console.log('2ok, 3ok, 4no ');
			} else if (!Dduplicate[0] && !Sduplicate[0] && !Subduplicate[0]) {
				console.log('2no, 3no, 4no ');
			} else {
				console.log(2222); /*3th Sub not duplicate*/
				if (!Sduplicate[0]) {
					$('#result .dd-item ol.dd-list').append(listMenu);
				}

				/*4th Sub not duplicate*/
				if (!Subduplicate[0]) {
					$('#result #item-' + mainSubCategory + ' .dd-list').append(list4SubMenu);
				}
			}
			updateOutput($('#nestable3').data('output', $('#nestable3-output')));
		}
	});


	/*Default Menu*/
	$('#addDefaultPage').click(function() {
		var mposition = $('#DMain-Menu').val();
		var mDCategory = $('#DCategory').val();
		var Dduplicate = [];
		$('#DCategoryAjaxAdd' + mposition).each(function() {
			if ($('#DCategoryAjaxAdd' + mposition).val() == mposition) {
				Dduplicate.push(mposition);
			}
		});
		var DSubDuplicate = [];
		$('#Dsub_' + mposition + mDCategory).each(function() {
			if ($('#Dsub_' + mposition + mDCategory).val() == mDCategory) {
				DSubDuplicate.push(mposition + mDCategory);
			}
		});
		if (mDCategory && mposition) {
			if (!DSubDuplicate[0]) {
                /*add User page to DB*/
                $.ajax({
            		url: homePage + "member/getsubmenu?type=addUserPage&id="+mDCategory+'&pos='+mposition,
            		type: "get",
            		dataType: "json",
            		async: false,
            		success: function(data) {
					  for (i = 0; i < data.length; i++) {
						  console.log(data[i].title);
                          var Mpost = '<div class="row input_fields_wrap subCatAjax" style="margin-bottom:5px">' + 
                            '<div id="Did_' + data[i].position + '" name="DCategory" class="form-group" style="margin-right:5px">' + 
                            '<input type="text" value="' + data[i].position + '" class="form-control id_' + data[i].position + '" id="DCategoryAjaxAdd' + data[i].position + '" readonly=""/>' + 
                            '</div>' + '<div id="Did_' + data[i].position + '" name="DCategory" class="form-group" style="margin-right:5px">' + 
                            '<input type="text" value="' + data[i].title + 
                            '" class="form-control" id="Dsub_' + data[i].m_page_id + '" readonly=""/>' + 
                            '</div><button type="button" class="btn btn-danger DremoveMainCat" dataid="' + data[i].id + 
                            '"><i class="glyphicon glyphicon-remove"></i></button>' + 
                            '</div>';
            				$("#Dresult").append(Mpost);
                            
                            var DaddToMenus = '<li id="msrM' + data[i].id + '"><a href="javascript:;">' + data[i].title + '</a></li>';
            				if (mposition == '1') {
            					$('#menu_results').append(DaddToMenus);
            					$('#DefualtMenu #Dmenu_results').append(DaddToMenus);
            				} else if (mposition == '2') {
            					$("#Dmenu_results_a").append(DaddToMenus);
            					$('#DefualtMenu #Dmenu_results_a').append(DaddToMenus);
            				}
					  }
            		}
            	});
                /*add User page to DB*/
				


                
			} else {
				alert('is alread added!');
			}
		}
	});

});
//remove-div
$(document).on('click', '.remove-div', function() {
	var updateOutput = function(e) {
		var list = e.length ? e : $(e.target),
			output = list.data('output');
		if (window.JSON) {
			buildMenu(list.nestable('serialize'));
			output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            menu_updatesort(window.JSON.stringify(list.nestable('serialize')),1);
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};
	$(this).parent('li').remove();
	updateOutput($('#nestable3').data('output', $('#nestable3-output')));
});


$(document).on('click', '.remove_field', function() {
	$(this).parent('div').parent('div').remove();
	var remove_mSId = $(this).attr('dataid');
	$('#ms_r' + remove_mSId).remove();
	$('#DefualtMenu #ms_r' + remove_mSId).remove();
});
$(document).on('click', '.removeMainCat', function() {
	if (confirm("Do you want to delete all in this category!") == true) {
		var removeId = $(this).attr('dataid');
		$('#m_r' + removeId).remove();
		$('#DefualtMenu #m_r' + removeId).remove();
		$(this).parent('div').parent('div').parent('div').remove();
	}

});
$(document).on('click', '.DremoveMainCat', function() {
	var removeId = $(this).attr('dataid');
    /*add User page to DB*/
                $.ajax({
            		url: homePage + "member/getsubmenu?type=removeUserPage&id="+removeId,
            		type: "get",
            		dataType: "json",
            		async: false,
            		success: function(data) {}
                });
                
	$('#Dm_r' + removeId).remove();
	$('#DefualtMenu #Dm_r' + removeId).remove();
	$('#MainMenu #msrM' + removeId).remove();
	$('#DefualtMenu #msrM' + removeId).remove();
	$(this).parent('div').remove();
});