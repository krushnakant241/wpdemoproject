<div class="header__contact container-fluid d-flex align-items-center justify-content-center">
	<div class="header__contact__wrapper d-flex align-items-center">
		<?php
		if (get_field('sbm_theme_options_contact_phone', 'option')) :
		?>
			<a href="tel:<?= the_field('sbm_theme_options_contact_phone', 'option'); ?>" class="header__contact__wrapper__tel">
				<img class="header__contact__wrapper__tel__icon" src="/wp-content/themes/theme/src/img_large/phone-icon.svg" alt="">
				<?= the_field('sbm_theme_options_contact_phone', 'option'); ?>
			</a>
		<?php endif; ?>
		<?php
		if (get_field('sbm_theme_options_contact_email', 'option')) :
		?>
			<a href="mailto:<?= the_field('sbm_theme_options_contact_email', 'option'); ?>" class="header__contact__wrapper__mail">
				<img class="header__contact__wrapper__mail__icon" src="/wp-content/themes/theme/src/img_large/mail-icon.svg" alt="">
				<?= the_field('sbm_theme_options_contact_email', 'option'); ?>
			</a>
		<?php endif;
		if (have_rows('sbm_theme_options_contact_social_icons_repeater', 'option')) :
		?>
			<ul class="d-md-flex d-none social_media_icon">
				<?php
				while (have_rows('sbm_theme_options_contact_social_icons_repeater', 'option')) : the_row();
				?>
					<li class="me-3"><a href="<?= the_sub_field('sbm_theme_options_contact_social_icons_repeater_url', 'option'); ?>" title="<?= the_sub_field('sbm_theme_options_contact_social_icons_repeater_name'); ?>"><i class="<?= the_sub_field('sbm_theme_options_contact_social_icons_repeater_icon'); ?>"></i></a></li>
				<?php endwhile; ?>
			</ul>
		<?php
		endif;
		?>
		
		<form action="/" method="get" class="d-xxl-none d-flex header__contact__wrapper__search">
			<div class="search-box" style="display: block;">
				<div class="search-input">
					<input type="text" name="s" id="search" value="<?php the_search_query(); ?>"  placeholder="">
					<input type="submit" id="searchsubmit"
					value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
				</div>
				<div class="iocn"><i class="fas fa-search"></i></div>
			</div>
		</form>
		
	</div>
</div>
