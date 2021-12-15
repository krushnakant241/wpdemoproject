jQuery(document).ready(function() {

    $(document).on('click', 'a.btn-link', function() {
         $(this).addClass('active');
         $('.card').removeClass('active');
         $(this).parents('.card').toggleClass('active');  
        
    });

      $(document).on('click', 'a.btn-link.collapsed', function() {
        $(this).parents('.card').addClass('active');
    });

       $(document).on('click', 'a.btn-link.active', function() {
        $(this).removeClass('active');
        $(this).parents('.card').removeClass('active');
    });

  
});