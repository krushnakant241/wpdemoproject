jQuery(document).ready(function() {
    jQuery('.trams-story_slider').slick({
        centerMode: true,
        centerPadding: '300px',
        arrows: false,
        slidesToShow: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    centerPadding: '100px',
                    centerMode: true,
                    slidesToShow: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: false,
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: false,
                    slidesToShow: 1
                }
            }
        ]
    });
});