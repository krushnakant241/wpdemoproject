<div class="footer container">
	<div class="footer__row row">
		<div class="col-lg-3  footer__row__left ">
			<div class="location">
					<?php if (get_field("sbm_theme_options_footer1_title1", "option")) { ?>
					<div class="footer1-title trans_footer-title">
					<?php the_field("sbm_theme_options_footer1_title1", "option"); ?>	
					</div>
					<?php } ?>
					<?php if (get_field("sbm_theme_options_footer1_detail1", "option")) { ?>
					<div class="footer1_content">
						<?php the_field("sbm_theme_options_footer1_detail1", "option"); ?>	
					</div>
					<?php } ?>
			</div>
			<div class="postal_address">
				<?php if (get_field("sbm_theme_options_footer1_title2", "option")) { ?>
					<div class="footer1-title trans_footer-title">
					<?php the_field("sbm_theme_options_footer1_title2", "option"); ?>	
					</div>
				<?php } ?>
				<?php if (get_field("sbm_theme_options_footer1_detail2", "option")) { ?>
				<div class="footer1_content">
					<?php the_field("sbm_theme_options_footer1_detail2", "option"); ?>	
				</div>
				<?php } ?>
				</div>
				
				
			
		</div>
		<div class="col-lg-3  footer__row__center">
			
			<div class="footer__row__center__wrapper d-block ">

				<?php if (get_field("sbm_theme_options_footer2_title1", "option")) { ?>
					<div class="footer2-title trans_footer-title">
					<?php the_field("sbm_theme_options_footer2_title1", "option"); ?>	
					</div>
				<?php } ?>
				<?php if (get_field("sbm_theme_options_footer2_phone", "option")) { ?>
				<div class="footer2_phone">
					<label>Phone:</label>
					<?php the_field("sbm_theme_options_footer2_phone", "option"); ?>	
				</div>
				<?php } ?>
					
				<?php if (get_field("sbm_theme_options_footer2_fax", "option")) { ?>
				<div class="footer2_fax">
					<label>Fax:</label>
					<?php the_field("sbm_theme_options_footer2_fax", "option"); ?>	
				</div>
				<?php } ?>
				<br>

				<?php if (get_field("sbm_theme_options_footer2_email", "option")) { ?>
				<div class="footer2_email">
					<label>Email:</label>
					
					<a href="mailto:<?php the_field("sbm_theme_options_footer2_email", "option"); ?>" title="<?php the_field("sbm_theme_options_footer2_email", "option"); ?>">
						<?php the_field("sbm_theme_options_footer2_email", "option"); ?>	
					</a>
					
				</div>
				<?php } ?>

			
					<?php if (get_field("sbm_theme_options_footer2_fb", "option")) { ?>
				<div class="footer2_phone">
					<label>Facebook Page:</label>
					<a href="<?php echo esc_url( the_field("sbm_theme_options_footer2_fb_link", "option")); ?>" title="<?php echo esc_attr(    the_field("sbm_theme_options_footer2_fb", "option")); ?>"  target="_blank">
						<?php the_field("sbm_theme_options_footer2_fb", "option"); ?>
					</a>
				</div>
				<?php } ?>


					<?php if (get_field("sbm_theme_options_footer2_twitter", "option")) { ?>
				<div class="footer2_phone">
					<label>Twitter:</label>
					<a href="<?php echo esc_url( the_field("sbm_theme_options_footer2_twitter_link", "option") ); ?>" title="<?php echo esc_attr( the_field("sbm_theme_options_footer2_twitter", "option")); ?>"  target="_blank">
						<?php the_field("sbm_theme_options_footer2_twitter", "option"); ?>
					</a>
				</div>
				<?php } ?>

	
			</div>
		</div>
		<div class="col-lg-3  footer__row__right order-sm-last">
			<div class="footer__row__right__wrapper">
				<?php if (get_field("sbm_theme_options_footer3_title1", "option")) { ?>
					<div class="footer2-title trans_footer-title">
						<?php the_field("sbm_theme_options_footer3_title1", "option"); ?>	
					</div>
				<?php } ?>
				
			<?php if (have_rows("sbm_theme_options_footer_qlinks", "option")): ?>

			<ul class=" footer_quick_links">
				<?php while (have_rows("sbm_theme_options_footer_qlinks", "option")):    the_row();
			        $footer_quick_links = get_sub_field("sbm_theme_options_q_link");
			        $target = "";
			        if ($footer_quick_links["target"]) {
			            $target = $footer_quick_links["target"];
			        }
			        ?>
					<li class="quick_links_li">
						<a href="<?php echo esc_url(       $footer_quick_links["url"]    ); ?>" title="<?php echo esc_attr( $footer_quick_links["title"]); ?>" target="<?php echo $target; ?>"> <?php echo $footer_quick_links[ "title"]; ?>
						</a>
					</li>
				<?php    endwhile; ?>
			</ul>
			<?php endif; ?>
				
			</div>
		</div>
		<div class="col-lg-3  footer__row__right social__section order-first order-lg-last pr-0">
			<div class="footer__row__right__wrapper">
				<ul class="social_icon">

					<?php if (get_field("sbm_theme_options_footer4_twitter", "option")): ?>
					<li>
						<a href="<?php the_field("sbm_theme_options_footer4_twitter",  "option" ); ?>" class="" title="<?php echo esc_attr( " Twitter"); ?>" target="_blank">
							
							<i class="fab fa-twitter"></i>
						</a>
					</li>
					
					<?php endif; ?>
					

					<?php if (get_field("sbm_theme_options_footer4_fb", "option")): ?>
					<li>
						<a href="<?php echo esc_url( the_field("sbm_theme_options_footer4_fb", "option")); ?>" class="" title="<?php echo esc_attr( " Facebook"); ?>" target="_blank">
						
						<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<?php endif; ?>

					<?php if (get_field("sbm_theme_options_footer4_utube", "option")): ?>
					<li>
						<a href="<?php echo esc_url( the_field("sbm_theme_options_footer4_utube", "option") ); ?>" class="" title="<?php echo esc_attr( " Youtube"); ?>" target="_blank">
						
							<i class="fab fa-youtube"></i>
						</a>
					</li>
						
					<?php endif; ?>
				</ul>
				
				<div class="footer4_images">
					<?php if (get_field("sbm_theme_options_footer4_image1", "option")): ?>

					<div class="trams_footer_logo">
						<img src="<?php echo esc_url(  the_field("sbm_theme_options_footer4_image1", "option")  ); ?>" alt="<?php echo esc_attr("Austin Health"); ?>"/>
					</div>
				<?php endif; ?>

				<?php if (get_field("sbm_theme_options_footer4_image2", "option")): ?>
					<div class="trams-footer_global">
							<img src="<?php echo esc_url(  the_field("sbm_theme_options_footer4_image2", "option")  ); ?>" alt="<?php echo esc_attr("Trancheostomy"); ?>"/>
					</div>
				<?php endif; ?>
					
				</div>
			</div>
		</div>





	</div>
</div>
