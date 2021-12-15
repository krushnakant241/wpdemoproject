jQuery(document).ready(function(){

var category = jQuery('select#cat').val();

 trams_post_display(category);

 jQuery('select#cat').change(function(){
        var category = jQuery(this).val();
        trams_post_display(category);
 });



jQuery('.terms_conditions a').click(function(){
    var admin_ajax = trams_vars.ajax_url;

        
        jQuery.ajax({
                url:admin_ajax,
                type:"POST",
                dataType: "json",
                async: false,
                data: {
                'action':'trams_set_cookies',
              
                },

                success: function(response) {
                
               
                if(response==1){
                    
                    window.location.href=location.origin+'/resources';
                }else{
                     window.location.href=window.location.href;
                }
              
            },
            error: function(error){
                console.log(error);
            }
        });
    });
  
});

function trams_post_display(category,tag){
   var admin_ajax = trams_vars.ajax_url;

 var page = 1; 
    var ppp = 2; 
    
    jQuery.ajax({
                    url:admin_ajax,
                    type:"POST",
                    dataType: "json",
                    async: false,
                    data: {
                    'action':'trams_show_posts',
                    'category':category,
                 //   'tag':tag,
                  //    'paged': page,
                  //    'ppp':ppp,
                  //     'offset': (page * ppp) + 1,
                    },

                    success: function(response) {
                        page++;
                   
                         jQuery('#get_ajax_post').html(response);
                          
                   
                }
     });
}
