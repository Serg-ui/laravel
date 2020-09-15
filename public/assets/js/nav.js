jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		if($('.menu > ul').css('display') == "block"){
		
			var div = $("#menujs1"); // тут указываем ID элемента
			var div2 = $("#menu");
			if (!div.is(e.target) // если клик был не по нашему блоку
			    && div.has(e.target).length === 0) { // и не по его дочерним элементам
				div2.prop('checked', false);
			}
		}
		});
	});

window.onload = function(){
	var a = document.querySelector(".submenu");
	a.onclick = function(){
		return false;
	}
}