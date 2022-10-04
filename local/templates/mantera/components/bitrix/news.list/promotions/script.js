$(document).ready(function() {
	const countSliders = $('.promo-slider').length;

	for(let i = 0; i < countSliders; i++) {
        let slides = $(`.promo-slider-${i}`).children().find('.slick-slide').length;
        if(slides <= 3) {
            $(`.promo-slider-${i}`).children('.slick-dots').css("display", "none")
        }
    }

	console.log("Вызов в компоненте карты");
	let tabs = BX.message("TASK");
	
	window.mapYandex = new YandexMap('map', {
		data: tabs,
		centerMap: [40.253427, 43.685164],
	});

});  
