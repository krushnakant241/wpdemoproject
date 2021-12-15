<div class="header__navigation logo_header_sec">
	<nav class="navbar navbar-expand-xxl">
		<div class="container-fluid">
			<div></div>
			<a class="navbar-brand ms-5 ms-md-0" href="<?php echo home_url();?>">
				<img src="/wp-content/themes/theme/src/img_large/logo-header.png" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<img src="/wp-content/themes/theme/src/img_large/menu-icon.svg" alt="">
			</button>

			<div class="collapse navbar-collapse" id="navbarText">

				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-main',
					'container' => false,
					'menu_class' => '',
					'fallback_cb' => '__return_false',
					'items_wrap' => '<ul id="main-navbar" class="navbar-nav  %2$s">%3$s</ul>',
					'depth' => 2,
					'walker' => new bootstrap_5_wp_nav_menu_walker()
				));
				?>

				<div class="search-icon d-xxl-block d-none">
					<form action="/" method="get">
						<div class="search-box" style="display: block;">
							<input type="text" name="s" id="search" value="<?php the_search_query(); ?>"  placeholder="">
							<div class="iocn"><i class="fas fa-search"></i></div>
								<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
						</div>
					</form>
				</div>
			</div>
			<a href="" class="quote-btn d-xxl-flex d-none">REQUEST A QUOTE</a>
		</div>
	</nav>
</div>
