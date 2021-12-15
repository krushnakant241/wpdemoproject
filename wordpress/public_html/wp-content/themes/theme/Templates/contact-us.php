<?php 

/*

Template Name: Contact Page

*/

get_header();

$map_iframe = get_field('map_iframe');

?>
<div class="page_header__top">
	<div class="container">
		<div class="row_content">
		    <h1><?php echo esc_html__('Contacting TRAMS'); ?></h1>
		</div>
	</div>	
</div>
<section class="contact_us">

	<div class="container">
		<div class="row">
			<div class="contact_us__row">
				<div class="contact_us__row__right">
					<div class="contact_num">
						<ul>
							<li>Phone: <?php the_field("sbm_theme_options_footer2_phone", "option"); ?></li>
							<li>Fax: <?php the_field("sbm_theme_options_footer2_fax", "option"); ?></li>
						</ul>

					</div>
					<div class="contact_social">
						<ul>
							<li>Email: <a href="mailto:<?php the_field("sbm_theme_options_footer2_email", "option"); ?>" title="<?php the_field("sbm_theme_options_footer2_email", "option"); ?>"><?php the_field("sbm_theme_options_footer2_email", "option"); ?></a></li>
							<li>Facebook: <a href="<?php echo esc_url( the_field("sbm_theme_options_footer2_fb_link", "option")); ?>" title="<?php echo esc_attr(    the_field("sbm_theme_options_footer2_fb", "option")); ?>"  target="_blank"><?php the_field("sbm_theme_options_footer2_fb", "option"); ?></a></li>
							<li>Twitter: <a href="<?php echo esc_url( the_field("sbm_theme_options_footer2_twitter_link", "option") ); ?>" title="<?php echo esc_attr( the_field("sbm_theme_options_footer2_twitter", "option")); ?>"  target="_blank"><?php the_field("sbm_theme_options_footer2_twitter", "option"); ?></a></li>
						</ul>
					</div>
					<div class="address">
						<ul>
							<li><strong><?php echo esc_html('Location'); ?></strong></li>
							<li><?php the_field("sbm_theme_options_footer1_detail1", "option"); ?></li>
						</ul>
						<ul>
							<li><strong><?php echo esc_html('POSTAL ADDRESS'); ?></strong></li>
							<li><?php the_field("sbm_theme_options_footer1_detail2", "option"); ?></li>
						</ul>
					</div>
				</div>
				<div class="contact_us__row__left">
					<div class="map_sec">
						<iframe src="<?php echo $map_iframe ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
				
			</div>
		</div>
	</div>
</section>

<div class="contact_us_action_bar">
	<?php the_content();?>
</div>
<?php get_footer(); ?>