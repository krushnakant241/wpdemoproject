<?php

$patient_forum_heading = get_field('patient_forum_heading');
$patient_forum_large_img = get_field('patient_forum_large_img');
$patient_forum_description = get_field('patient_forum_description');
$patient_forum_repeater_title = get_field('patient_forum_repeater_title');
$patient_forum_content_box = get_field('patient_forum_content_box');
$forum_mailing_list = get_field('forum_mailing_list');
$other_website_title = get_field('other_website_title');
$patient_forum_other_website_box = get_field('patient_forum_other_website_box');

?>
	
<section class="patient-forums">
	<?php if ( !empty( $patient_forum_heading ) ) { ?>
		<div class="container">
			<div class="patient-forums__title">
				<h2><?php echo $patient_forum_heading; ?></h2>
			</div>
		</div>
	<?php } ?>

	<div class="patient-forums__row">
		<?php if ( !empty( $patient_forum_large_img ) ) { ?>
			<div class="image">
				<img src="<?php echo esc_url($patient_forum_large_img['url']); ?>" alt="<?php echo esc_html__('Patient Forum Image'); ?>">
			</div>
		<?php } ?>

		<div class="container">
			<div class="patient-forums__row__wrap">
				<?php if ( !empty( $patient_forum_description ) ) { ?>
					<p><?php echo $patient_forum_description; ?></p>		
				<?php } ?>

				<?php if ( !empty( $patient_forum_repeater_title ) ) { ?>
					<p><?php echo $patient_forum_repeater_title; ?></p>	
				<?php } ?>

				<?php if ( !empty( $patient_forum_content_box ) ) { ?>
					
					<div class="patient-forums__row__wrap__item">
						<?php foreach ($patient_forum_content_box as $key => $patient_forums_content) { ?>
							
							<div class="patient-forums__row__wrap__item__inner">
								<div class="patient-forums_div">
								<?php if ( !empty( $patient_forums_content['content_box_img'] ) ) { ?>
									<div class="item-image">
										<img src="<?php echo esc_url($patient_forums_content['content_box_img']['url']); ?>" alt="<?php echo esc_html__('Patient Forum Content Image'); ?>">
									</div>
								<?php } ?>

								<div class="content">
									<div class="content_in"><?php echo $patient_forums_content['content_box_content']; ?></div>

									<?php if ( !empty( $patient_forums_content['content_box_link'] ) ) { ?>
										<div class="button">
											<a href="<?php echo $patient_forums_content['content_box_link']['url']; ?>" target="<?php echo $patient_forums_content['content_box_link']['target']; ?>">
												<?php echo $patient_forums_content['content_box_link']['title']; ?>
											</a>
										</div>
									<?php } ?>
								</div>
									</div>
							</div>

						<?php } ?>

					</div>	

				<?php } ?>									
			</div>

			<?php if ( !empty( $forum_mailing_list ) ) { ?>
				<div class="patient-forums__row__content">
					<?php echo $forum_mailing_list; ?>
				</div>
			<?php } ?>
			
			<div class="other_websites">
				<?php if ( !empty( $other_website_title ) ) { ?>
					<h2><?php echo $other_website_title; ?></h2>
				<?php } ?>

				<?php if ( !empty( $patient_forum_other_website_box ) ) { ?>
					<ul>
						<?php foreach($patient_forum_other_website_box as $key => $other_website_links ){ ?>
							<li><a href="<?php echo esc_url($other_website_links['content_box_link']['url']); ?>" target="<?php echo $other_website_links['content_box_link']['target']; ?>"><?php echo $other_website_links['content_box_link']['title'] ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
