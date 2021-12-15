<?php
    //title Background get title & choice
	$heading_background_text = get_field('heading_background_text');
	$heading_background_text_img = get_field('heading_background_text_img');

    $default_image = sbm_theme_uri().'assets/images/banner_top_image.png';

?>

       <!-- title header desc -->
       <div class="page_header__top">
            <!-- <?php if ( !empty( $heading_background_text_img ) ) {?>
                <img src="<?php echo esc_url($heading_background_text_img['url']);?>" class="" alt="<?php echo esc_attr($heading_background_text);?>" height="230"  width="100%"/>
            <?php }else{ ?>
                <img src="<?php echo esc_url($default_image); ?>" class="" alt="<?php echo esc_attr($heading_background_text)?>" height="230"  width="100%"/>
            <?php } ?> -->
                <div class="container">
                    <div class="row_content">
                        <?php if ( !empty( $heading_background_text ) ) { ?>
                            <h1><?php echo $heading_background_text; ?></h1>
                        <?php } ?>
                    </div>
                </div>
        </div>      
