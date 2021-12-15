jQuery(document).ready(function() {

    if ($(window).width() <= 767) {        
        $(".content_wrap").each(function(){
            var h2 = $(this).find('h2');
            var left = $(this).find('.left-content .mobile-h2');
            $(h2).appendTo(left);
        });
    }

});