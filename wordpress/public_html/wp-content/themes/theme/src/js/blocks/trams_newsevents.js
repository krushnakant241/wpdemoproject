jQuery(document).ready(function() {
    if ($(window).width() < 767) {
        $(".header__navigation .main_header .search-icon").appendTo(".header__navigation .main_header .navbar-nav  ");
    }
    if ($(window).width() < 991) {
        $('.main_home_newsevents .news_events__wrapper').slick({
            dots: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    }
});