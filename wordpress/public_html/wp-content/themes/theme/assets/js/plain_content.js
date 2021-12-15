
jQuery(document).ready(function() {

	// setTimeout(function(){
 
    // jQuery('.acf-field-trams-plain-content-half-version').hide();

      // jQuery('input[type=radio]').each(function(){

         // var ac=jQuery(this).is(':checked').val();
         //alert(ac);
      //   if(jQuery(this).attr('checked', 'checked')) {

           
      //      jQuery('.acf-field-trams-plain-content-half-version').show();
      //      jQuery('.acf-field-trams-plain-content .acf-label label').text('Add Content with Image, Title and Text in  First Half');
      //   }else{
          
      //     jQuery('.acf-field-trams-plain-content-half-version').hide();
      //    jQuery('.acf-field-trams-plain-content .acf-label label').text('Add Content');
      //   }
      // });


   // }, 3000);
  
// });

  jQuery(document).on("click","#acf-block_61053b811e5e8-trams_plain_content_size-half",function() {
    	
    
  });


  jQuery(document).on("change","input[type=radio]",function(){
      var ac=jQuery(this).val();
      if(ac=='half'){
       jQuery('.acf-field-trams-plain-content-half-version').show();
      jQuery('.acf-field-trams-plain-content .acf-label label').text('Add Content with Image, Title and Text in  First Half');
      }else{
         jQuery('.acf-field-trams-plain-content-half-version').hide();
      jQuery('.acf-field-trams-plain-content .acf-label label').text('Add Content');
      }
      
  });
});