<?php
	//resource heading title
	$resource_block_title = get_field('resource_block_title');
	$resource_heading_css_class = get_field('resource_heading_css_class');

?>

<section class="resource_heading <?php echo esc_attr($resource_heading_css_class); ?>">
    <div class="container">
        <div class="">
            <!--resource heading title -->
            <?php if ( !empty( $resource_block_title ) ) { ?>
                <div class="resource_heading__title">
                    <h2><?php echo $resource_block_title; ?></h2>
                </div>
            <?php } ?>
 
            <!-- resource heading repeater starts here -->
            <?php if( have_rows('resource_heading_content_repeater') ):?>
                <div class="resource_heading__wrapper ">
                    <?php $cnt=0;
                    while ( have_rows( 'resource_heading_content_repeater' )) : the_row(); ?>
                        
                        <div class="resource_heading__wrapper__wrap ">
                            <div class="resource_heading__wrapper__wrap__inner">
                                <?php
                                    $resource_image   =  get_sub_field( 'resource_image' );
                                    $resource_content =  get_sub_field( 'resource_content' );?>
                      			<div class="resource_content__image_wrapper">
                                    <img src="<?php echo esc_url($resource_image['url']);?>" class="" alt="<?php echo esc_attr($resource_image);?>" />
                                </div>
                                <?php if ( !empty( $resource_content ) ) { ?>
                                    <h6><?php echo $resource_content; ?></h6>
                                <?php } ?>
                            </div>
                            <?php $cnt++; ?>
                        </div>
                    <?php endwhile;	?>
                </div>
            <?php endif; ?>
            <!-- resource heading repeater ends here -->
        </div>
    </div>
</section>