
<?php
    //resource content heading
    $resource_content_heading = get_field('resource_content_heading');
    $resource_content_css_class = get_field('resource_content_css_class');
?>

<section class="resource_content <?php echo esc_attr($resource_content_css_class); ?>">
    <div class="container">
        <div class=""> 
             <!--resource content title -->
             <?php if ( !empty( $resource_content_heading ) ) { ?>
                <div class="resource_content__title">
                    <h2><?php echo $resource_content_heading; ?></h2>
                </div>
            <?php } ?>
            <!-- resource content repeater starts here -->
            <?php if( have_rows('resource_content_block_repeater') ):?>
                <div class="resource_content__wrapper">
                    <?php $cnt=0;
                    while ( have_rows( 'resource_content_block_repeater' )) : the_row(); ?>
                        
                        <div class="resource_content__wrapper__wrap ">
                            <div class="resource_content__wrapper__wrap__inner">
                                <?php
                                    $resource_content_image       =  get_sub_field( 'resource_content_image' );
                                    $resource_content_text        =  get_sub_field( 'resource_content_text' );
                                    $resource_content_description =  get_sub_field( 'resource_content_description' );
                                if(!empty( $resource_content_image )){ ?>
                                    <div class="resource_content__image_wrapper">
                                        <img src="<?php echo esc_url($resource_content_image['url']);?>" class="" alt="<?php echo esc_attr($resource_content_image);?>" />
                                    </div>
                                <?php } ?>

                                <?php if ( !empty( $resource_content_text ) ) { ?>
                                    <h3><?php echo $resource_content_text; ?></h3>
                                <?php } ?>

                                <?php if ( !empty( $resource_content_description ) ) { ?>
                                   <?php echo $resource_content_description; ?>
                                <?php } ?>
                            </div>
                            <?php $cnt++; ?>
                        </div>
                    <?php endwhile;	?>
                </div>
            <?php endif; ?>
            <!-- resource content repeater ends here -->

            <!-- resource two column repeater starts here -->
            <?php if( have_rows('rcontent_two_column') ):?>
                <div class="resource_content__wrapper rcontent_two_column">
                    <?php $cnt=0;
                    while ( have_rows( 'rcontent_two_column' )) : the_row(); ?>
                        
                        <div class="resource_content__wrapper__wrap ">
                            <div class="resource_content__wrapper__wrap__inner">
                                <?php
                                    $rc_image_2column       =  get_sub_field( 'rc_image_2column' );
                                    $rc_2column_heading        =  get_sub_field( 'rc_2column_heading' );
                                    $rc_2column_left_title        =  get_sub_field( 'rc_2column_left_title' );
                                    $rc_2column_left_Content        =  get_sub_field( 'rc_2column_left_Content' );


                                    $rc_2column_right_title        =  get_sub_field( 'rc_2column_right_title' );
                                    $rc_2column_right_Content        =  get_sub_field( 'rc_2column_right_Content' );
                                if(!empty( $rc_image_2column )){ ?>
                                    <div class="resource_content__image_wrapper">
                                        <img src="<?php echo esc_url($rc_image_2column['url']);?>" class="" alt="<?php echo esc_attr($rc_2column_heading);?>" />
                                    </div>
                                <?php } ?>

                            <?php   if(!empty( $rc_2column_heading )){ ?>
                                <div class="rc_2column_heading">
                                    <h2><?php echo $rc_2column_heading;?></h2>
                                </div>
                            <?php } ?>
                            <div class="row rc_2column_row">
                                <div class="col">
                                    <?php if(!empty($rc_2column_left_title)){?>
                                    <div class="rc_2column_title">
                                        <h5><?php echo $rc_2column_left_title;?></h5>
                                    </div>
                                      <?php } ?>
                            
                            <?php if(!empty($rc_2column_left_Content)){?>
                                    <div class="rc_2column_Content">
                                        <?php echo $rc_2column_left_Content; ?>
                                    </div>
                                <?php } ?>
                                </div>
                               <div class="col">
                                    <?php if(!empty($rc_2column_right_title)){?>
                                    <div class="rc_2column_title">
                                        <h5><?php echo $rc_2column_right_title;?></h5>
                                    </div>
                                      <?php } ?>
                            
                            <?php if(!empty($rc_2column_right_Content)){?>
                                    <div class="rc_2column_Content">
                                        <?php echo $rc_2column_right_Content; ?>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                              
                            </div>
                            <?php $cnt++; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <!-- resource two column repeater starts -->
        </div>
    </div>
</section>