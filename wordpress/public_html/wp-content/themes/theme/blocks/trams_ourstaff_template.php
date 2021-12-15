<?php

$our_staff_title = get_field('trams_our_staff_title');
$our_staff_repeater = get_field('our_staff_repeater');

?>


<section class="our_staff">
    <div class="container">
        <div class="">

            <?php if ( !empty( $our_staff_title ) ) { ?>
                <div class="our_staff__title">
                    <h2><?php echo $our_staff_title; ?></h2>
                </div>
            <?php } ?>

            <?php if ( !empty($our_staff_repeater) ) { ?>
                <div class="our_staff__wrapper">

                    <?php foreach($our_staff_repeater as $key => $our_staff_bio){ ?>
                        <div class="our_staff__wrapper__wrap ">
                            <div class="our_staff__wrapper__wrap__inner">
                               
                                <?php if ( !empty( $our_staff_bio['staff_image'] ) ) { ?>
                                    <div class="our_staff__wrapper__wrap__inner__image">
                                        <img src="<?php echo esc_url($our_staff_bio['staff_image']['url']); ?>" alt="<?php echo esc_html__('Staff Image') ?>">
                                    </div>
                                <?php } ?>

                                <?php if ( !empty( $our_staff_bio['staff_title'] ) ) { ?>  
                                    <h5><?php echo $our_staff_bio['staff_title']; ?></h5>
                                <?php } ?>

                                <?php if ( !empty( $our_staff_bio['staff_description'] ) ) { ?>
                                    <p><?php echo $our_staff_bio['staff_description']; ?></p>
                                <?php } ?>

                            </div>
                        </div>
                    <? } ?>
                
                </div>
            <?php } ?>

        </div>
    </div>
</section>
