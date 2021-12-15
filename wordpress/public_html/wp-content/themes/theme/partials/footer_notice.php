<div class="footer container">
		<div class="footer__row row">
			
			<?php if (get_field("sbm_theme_options_footer_copyright", "option")) { ?>
				<div class="col-lg-12 col-md footer__row__notice footer__row__notice__left">
						<?php the_field("sbm_theme_options_footer_copyright", "option"); ?>	
				</div>
			<?php } ?>
		</div>
	
</div>
