<?php 

$collaborative_title = get_field('collaborative_title');
$collaborative_content_top = get_field('collaborative_content_top'); 
$collaborative_image = get_field('collaborative_image'); 
$collaborative_repeater = get_field('collaborative_repeater'); 
$collaborative_content_bottom = get_field('collaborative_content_bottom'); 

?>

<section class="global-collaborative">
	<div class="container">
		<div class="">
			<div class="global-collaborative__wrapper">
				<div class="global-collaborative__wrapper__inner">
					
					<?php if ( !empty( $collaborative_title ) ) { ?>
						<h2><?php echo $collaborative_title; ?></h2>
					<?php } ?>
					
					<div class="top_content_wrap">
						<?php if ( !empty( $collaborative_content_top ) ) { ?>
							<div class="left-content">
								<?php echo $collaborative_content_top; ?>
							</div>
						<?php } ?>

						<?php if ( !empty( $collaborative_image ) ) { ?>
							<div class="right-content">
								<div class="image">
									<img src="<?php echo esc_url($collaborative_image['url']); ?>" alt=
									"<?php echo esc_html__('Collaborative Image'); ?>">
								</div>
							</div>
						<?php } ?>
					</div>

					 <div class="keypoint_content_wrap">

	                    <?php foreach($collaborative_repeater as $key => $keypoint_content){ ?>
	                        <div class="keypoint_content_wrap_inner">
	                            <div class="keypoint-content">
	                               
	                                <?php if ( !empty( $keypoint_content['block_image'] ) ) { ?>
	                                    <div class="image">
	                                        <img src="<?php echo esc_url($keypoint_content['block_image']['url']); ?>" alt="<?php echo esc_html__('Image') ?>">
	                                    </div>
	                                <?php } ?>

	                                <?php if ( !empty( $keypoint_content['block_title'] ) ) { ?>  
	                                    <h5><?php echo $keypoint_content['block_title']; ?></h5>
	                                <?php } ?>

	                                <?php if ( !empty( $keypoint_content['block_description'] ) ) { ?>
	                                    <p><?php echo $keypoint_content['block_description']; ?></p>
	                                <?php } ?>

	                            </div>
	                        </div>
	                    <? } ?>
		                
	                </div>

	                <?php if ( !empty( $collaborative_content_bottom ) ) { ?>
		                <div class="bottom_content_wrap">
		                	<?php echo $collaborative_content_bottom; ?>
		                </div>
	                <?php } ?>

				</div>
			</div>
		</div>
	</div>	
</section>