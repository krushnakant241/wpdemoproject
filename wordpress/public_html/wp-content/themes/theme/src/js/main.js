var $ = jQuery;

function copyTextToClipboard() {
    /* Get the text field */
    var dummy = document.createElement('input'),
        text = window.location.href;
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
}

jQuery(document).ready(function() {

    /* fix header */

    $(window).scroll(function() {
        if ($(window).scrollTop() >= 100) {
            $('.header').addClass('fixed-nev_bar');
        } else {
            $('.header').removeClass('fixed-nev_bar');
        }
    });

    if ($(window).width() < 1200) {
        $(".search-box .iocn").click(function() {
            $(".search-box").toggle();
            $("input[type='text']").focus();
        });
    }


    if ($(window).width() < 767) {
        jQuery(".footer .social_icon").prependTo(".footer .footer4_images .trams-footer_global");
    }
    $('#play-video-btn').on('click', function(ev) {
        this.style.display = 'none';
        $('#play-video').hide();
        $('.youtube-video').show();

        $("iframe")[0].src += "?autoplay=1";
        ev.preventDefault();

    });
    move_social_icon();

    jQuery('.navbar-nav li:has(ul)').addClass('parent');

    jQuery('a.menulinks').click(function() {
        jQuery(this).next('ul').slideToggle(250);
        jQuery('body').toggleClass('mobile-open');
        jQuery('.navbar-nav li.parent ul').slideUp(250);
        jQuery('a.child-triggerm').removeClass('child-open');
        return false;
    });
    jQuery('.header .close').click(function() {
        jQuery('.navbar-nav').slideToggle(250);
        jQuery('body').removeClass('mobile-open');
        return false;
    });

    jQuery('.navbar-nav li.parent > a').after('<a class="child-triggerm"><span></span></a>');

    jQuery('.navbar-nav a.child-triggerm').click(function() {
        jQuery(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
        jQuery(this).parent().siblings('li').find('ul').slideUp(250);
        jQuery(this).next('ul').slideToggle(250);
        jQuery(this).toggleClass('child-open');
        return false;
    });

    jQuery(window).resize(function() {

        move_social_icon();

    });

    if ($(window).width() < 767) {

        jQuery('.set-image').each(function() {
            var bannerSRC = jQuery(this).find(".get-image img").attr("src");
            jQuery(this).css('background-image', 'url(' + bannerSRC + ')');
        });
    }

    equalheight('.content_title_des');
    equalheight('.text_grid__wrapper__wrap__inner .title');

});


function move_social_icon() {
    if ($(window).width() < 767) {

        $(".header__navigation .main_header .search-icon").appendTo(".header__navigation .main_header .navbar-nav  ");
    }

}


jQuery(window).resize(function() {

    equalheight('.text_grid__wrapper__wrap__inner .title');
});

jQuery(window).load(function() {
    equalheight('.content_title_des');
    equalheight('.text_grid__wrapper__wrap__inner .title');

});



function move_social_icon() {
    equalheight = function(container) {

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
        jQuery(container).each(function() {

            $el = jQuery(this);
            jQuery($el).height('auto')
            topPostion = $el.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = $el.height();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }
}


jQuery(function($) {
    var doAnimations = function() {

        var offset = $(window).scrollTop() + $(window).height(),
            $animatables = $('.animatable');

        if ($animatables.length == 0) {
            $(window).off('scroll', doAnimations);
        }

        $animatables.each(function(i) {
            var $animatable = $(this);
            if (($animatable.offset().top + $animatable.height() - 5) < offset) {
                $animatable.removeClass('animatable').addClass('animated');
            }
        });
    };

    $(window).on('scroll', doAnimations);
    $(window).trigger('scroll');

});