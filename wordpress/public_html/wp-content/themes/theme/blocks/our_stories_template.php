<?php

$our_story_section = get_field('our_story_section');
$story_title = get_field('story_title');
$story_content = get_field('story_content');
$story_description = get_field('story_description');
$story_video = get_field('story_video');
$our_story_link_section = get_field('our_story_link_section'); 
$story_image = get_field('story_image');

?>

<section class="our-story full">
    <div class="container">
        <div class="">
            <div class="our-story__wrapper">

                <?php foreach ($our_story_section as $key => $our_story_content) { 
                    $video_show = !empty($our_story_content['story_show_video'])? $our_story_content['story_show_video'][0]:'no';
                    ?>
                    <div class="our-story__wrapper__inner">
                        <div class="content_wrap">
                                <?php if ( !empty( $our_story_content['story_title'] ) ) { ?>
                                    <h2><?php echo $our_story_content['story_title']; ?></h2>
                                <?php } ?>
                                <div class="our-story__wrapper__inner__item">
                                    <div class="left-content">
                                        <!-- This Div is for mobile view  -->
                                        <div class="mobile-h2"></div>
                                        <!-- End of Div for mobile view -->
                                        <div class="content_title_des">
                                        <?php if ( !empty( $our_story_content['story_content'] ) ) { ?>
                                            <div class="story-content">
                                                <?php echo $our_story_content['story_content']; ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ( !empty( $our_story_content['story_description'] ) ) { ?>
                                            <div class="story-description">
                                                <?php echo $our_story_content['story_description']; ?>
                                            </div>
                                        <?php } ?> 
                                        </div> 

                                        <div class="button-item">
                                            <?php if ( !empty( $our_story_content['story_video']['url'] ) ) { ?>
                                                <div class="button">
                                                    <a href="<?php echo $our_story_content['story_video']['url']; ?>" target="<?php echo $our_story_content['story_video']['target']; ?>"><?php echo $our_story_content['story_video']['title'] ?></a>
                                                </div>
                                            <?php } ?>

                                            <?php if ( !empty( $our_story_content['our_story_link_section'] ) ) { ?>
                                                <ul>
                                                    <?php foreach ($our_story_content['our_story_link_section'] as $key => $story_links) { ?>
                                                        <li><i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?php echo $story_links['story_link']['url']; ?>" target="<?php echo $story_links['story_link']['target']; ?>"> <?php echo $story_links['story_link']['title']; ?></a></li>
                                                    <?php } ?>  
                                                </ul>
                                            <?php } ?>  
                                        </div>
                                    </div>
                                    
                                    <?php if ( !empty( $our_story_content['story_image'] ) && $video_show!=='yes'  ) { ?>
                                        <div class="right-content">
                                            <div class="image">
                                                <img src="<?php echo esc_url($our_story_content['story_image']['url']); ?>" alt="<?php echo esc_attr('story image'); ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                   
                                     <?php if ( $video_show=='yes' && !empty($our_story_content['story_embed_video']) ) { ?>
                                        <div class="right-content story_embed_video" >
                                            
                                                <img id="play-video" src="<?php echo esc_url($our_story_content['story_image']['url']); ?>" alt="<?php echo esc_html__('story image'); ?>" class="img-responsive">

                                                <img id="play-video-btn" src="<?php echo esc_url(sbm_theme_uri().'assets/images/play_button.png'); ?>" alt="<?php echo esc_attr('story image'); ?>" class="play-video-btn">
                                            
                                            <div class="youtube-video" style="display: none; position: absolute; ">
                                                <?php echo $our_story_content['story_embed_video'];?>
                                            </div>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>  
</section>