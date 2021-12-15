<?php 

$trams_story_sections = get_field('story_section');

?>
    
<section class="trams-story full">
	<div class="trams-story_slider">
		<?php if ( !empty( $trams_story_sections ) ) { ?>
			<?php foreach ($trams_story_sections as $key => $trams_story_section) { ?>
				<div class="trams-story_slider__wrap">
					<div class="trams-story_slider__wrap__inner" style="background: url(<?php echo esc_url($trams_story_section['story_image']['url']); ?>)no-repeat center /cover;">
						<div class="content">
							
							<?php if ( !empty( $trams_story_section['story_heading'] ) ) { ?>
								<h2><?php echo $trams_story_section['story_heading']; ?></h2>
							<?php } ?>

							<?php if ( !empty( $trams_story_section['story_content'] ) ){
									echo $trams_story_section['story_content']; 		
						 		} ?>

					 		<?php if ( !empty( $trams_story_section['story_url'] ) ) { ?>
								<div class="button">
									 <a href="<?php echo $trams_story_section['story_url']['url']; ?>" target="<?php echo $trams_story_section['story_url']['target']; ?>"><?php echo $trams_story_section['story_url']['title'] ?></a>
								</div>
							<?php } ?>

							<?php if ( !empty( $trams_story_section['story_link_section'] ) ) { ?>
								<ul>
									<?php foreach ($trams_story_section['story_link_section'] as $key => $story_links) { ?>
										<li><a href="<?php echo $story_links['story_link']['url']; ?>" target="<?php echo $story_links['story_link']['target']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $story_links['story_link']['title']; ?></a></li>
									<?php } ?>	
								</ul>
							<?php } ?>		

						</div>
					</div>
				</div>	
			<?php } ?>
		<?php } ?>
	</div>
</section>
