$(document).ready(function() {
    $('.slider-cards').slick({
        arrows:true,
        dots:true,
        slidesToShow:2,
        centerMode: true,
        centerPadding: '0px',
        responsive: [
            {
                breakpoint:992,
                settings:{
                    slidesToShow: 1,
                    centerMode: false
                }
            }
        ]
    });

    $('.events-slider').slick({
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 768,
                settings:{
                    arrows: false,
                }
            }
        ]
    });

    $('.slider-general-image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        centerMode: true,
        asNavFor: '.slider-navigation',
        touchMove: false,
    });
    
    $('.slider-navigation').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-general-image',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint:992,
                settings:{
                    slidesToShow: 2,
                    centerMode: false,
                    dots: true
                }
            }
        ]
    });

    $('.promo-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        dots: true,
        variableWidth: false,

        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    variableWidth: false,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false,
                }
            },
        ]
        
    });

    $(window).on('load resize', function() {
        if($(window).width() <= 1599) {
            $('.tabs-promo__nav-slider:not(.slick-initialized)').slick({
                slidesToScroll: 1,
                infinite: false,
                arrows: false,
                dots: false,
                variableWidth: true,
                focusOnSelect: true,
    
                responsive: [
                    {
                        breakpoint:991,
                        settings:{
                            slidesToScroll: 1,
                            variableWidth: true,
                            focusOnSelect: true,
                        }
                    }
                ]
            });
        } else {
            $('.tabs-promo__nav-slider.slick-initialized').slick("unslick");
        }
    });
    

});

