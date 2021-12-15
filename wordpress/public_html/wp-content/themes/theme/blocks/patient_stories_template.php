<?php 

$patient_stories_heading = get_field('patient_stories_heading');
$patient_stories_title = get_field('patient_stories_title');
$patient_stories_image = get_field('patient_stories_image');
$patient_stories_content = get_field('patient_stories_content');
$patient_stories_url = get_field('patient_stories_url');
$patient_stories_links = get_field('patient_stories_links');
$patient_stories_page_link = get_field('patient_stories_page_link');

?>
    
<section class="patient-stories">
	<div class="container">
		
			<?php if(!empty($patient_stories_heading)) {?>
			
				<div class="patient-stories__wrapper_heading">
						<h2><?php echo $patient_stories_heading;?></h2>
				</div>
			<?php }?>
				<div class="patient-stories__wrap">
					<div class="trams-story_slider__wrap__inner" style="background: url(<?php echo esc_url($patient_stories_image['url']); ?>)no-repeat center /cover;">
						<div class="content">
							
							<?php if ( !empty( $patient_stories_title ) ) { ?>
								<h2><?php echo $patient_stories_title; ?></h2>
							<?php } ?>

							<?php if ( !empty( $patient_stories_content ) ){
									echo $patient_stories_content; 		
						 		} ?>

					 		<?php if ( !empty( $patient_stories_url ) ) { ?>
								<div class="button">
									 <a href="<?php echo esc_url($patient_stories_url['url']); ?>" target="<?php echo $patient_stories_url['target']; ?>" title="<?php echo esc_attr($patient_stories_url['title']);?>">
									 	<?php echo $patient_stories_url['title'] ;?>
									 	
									 </a>
								</div>
							<?php } ?>

							<?php if ( have_rows('patient_stories_links')) { ?>
								<ul>
									<?php while( have_rows('patient_stories_links')): the_row(); 
												
										?>
										<li><i class="fa fa-angle-right" aria-hidden="true"></i>
											<a href="<?php echo get_sub_field('story_link')['url']; ?>" target="<?php echo get_sub_field('story_link')['target']; ?>"><?php echo get_sub_field('story_link')['title']; ?></a>
										</li>
									<?php  endwhile;?>	
								</ul>
							<?php } ?>		

						</div>
					</div>
				</div>	
				<?php if(!empty($patient_stories_page_link)) {?>
			
				<div class="patient-stories__wrapper_pagelink">
						<i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?php echo esc_url($patient_stories_page_link['url']);?>" title="<?php echo esc_attr($patient_stories_page_link['title'])?>" target="<?php echo $patient_stories_page_link['target'];?>">
							<?php echo $patient_stories_page_link['title']; ?>
						</a>
				</div>
			<?php }?>
		
	</div>
</section>
