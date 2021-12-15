jQuery(document).ready(function() {
    if ($(window).width() <= 767) {
        $('.our_staff__wrapper').slick({
            infinite: false,
            slidesToShow: 1,
            arrows: true,
            dots: true
        });
    }
});