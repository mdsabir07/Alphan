; (function($){
	"use strict"
	$(document).ready(function($){
		$(".popup-img").each(function(){
			var image = $(this).find("img").attr("src");
			$(this).attr("href", image);
		});
	});
})(jQuery);