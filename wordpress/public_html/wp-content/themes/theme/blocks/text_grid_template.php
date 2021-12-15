<?php
	//text grid get title
	$text_grid_block_title = get_field('text_grid_block_title');
	$text_grid_block_description = get_field('text_grid_block_description');
?>

<section class="text_grid">
    <div class="container">
        <div class="">
            <!-- text grid title -->
            <?php if ( !empty( $text_grid_block_title ) ) { ?>
                <div class="text_grid__main">
                    <h2><?php echo $text_grid_block_title; ?></h2>
                </div>
            <?php } ?>
            
            <!-- text grid sub title -->
            <?php if ( !empty( $text_grid_block_description ) ) { ?>
                <div class="text_grid__title">
                    <p><?php echo $text_grid_block_description; ?></p>
                </div>
            <?php } ?>

            <!-- text grid repeater starts here -->
            <?php if( have_rows('text_grid_block_repeater') ):?>
                <div class="text_grid__wrapper">
                    <?php $cnt=0;
                    while ( have_rows( 'text_grid_block_repeater' )) : the_row(); ?>
                        
                        <div class="text_grid__wrapper__wrap ">
                            <div class="text_grid__wrapper__wrap__inner">
                            <div class="title">
                                <?php
                                    $text_grid_link = get_sub_field( 'text_grid_link' );
                                    $text_grid_textarea = get_sub_field( 'text_grid_textarea' );

                                    
                                if ( !empty($text_grid_link) ) {  
                                ?>
                                    <a target="<?php echo $text_grid_link['target'];  ?>" href="<?php echo esc_url($text_grid_link['url']); ?>" title="<?php echo esc_attr($text_grid_link['title']);?>">
                                        <?php echo $text_grid_link['title']; ?>
                                    </a>
                                <?php } ?>
                                </div>
                                <?php if ( !empty( $text_grid_textarea ) ) { ?>
                                    <p><?php echo $text_grid_textarea; ?></p>
                                <?php } ?>

                            </div>
                            <?php $cnt++; ?>
                        </div>
                    <?php endwhile;	?>
                </div>
            <?php endif; ?>
            <!-- text grid repeater ends here -->
        </div>
    </div>
</section>