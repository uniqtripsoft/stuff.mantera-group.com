$(document).ready(function(){
    const countSliders = $('.slider-cards').length;

    for(let i = 0; i < countSliders; i++) {
        let slides = $(`.slider-cards-${i}`).children().find('.slick-slide').length;
        if(slides <= 1 || slides <= 2) {
            $(`.slider-cards-${i}`).children('.slick-dots').css("display", "none")
        }
    }

});