$(document).ready(function(){
	jQuery('.item:first-child').addClass(' active');
	jQuery('.bullet:first-child').addClass('active');
	customClass.switchLanguageBar();
});
//CustomClass use for switch language bar
var customClass = {		
	switchLanguageBar:function(){
		$(".language-bar ul,#hide").hide();
		$(".current-language").click(function(){
			$(".language-bar ul").slideDown();
			$("#hide").show();
			$("#show").hide();
		});
		$("#hide").click(function(){
			$(".language-bar ul").slideUp();
			$("#hide").hide();
			$("#show").show();
		});
	}
};