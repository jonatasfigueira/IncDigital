// Slick
jQuery(function($) {
    $(".zoomImg").slick({
        asNavFor: '.zoomNav',
        prevArrow: '<span class="slick-prev fa fa-angle-left"></span>',
        nextArrow: '<span class="slick-next fa fa-angle-right"></span>'
    });
    $('.zoomNav').slick({
        asNavFor: '.zoomImg',
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        arrows: false,
    });
    // Zoom
    $(".zoomImg img").elevateZoom({
        zoomType: 'inner',
        cursor: 'crosshair'
    });

});