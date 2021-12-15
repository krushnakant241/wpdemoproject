<div class="header__navigation fade-in ">
	<nav class="navbar navbar-expand-xxl">
		<div class="container">
			<div class ="main_header row">
				<div class="trans-logo">
						<?php 
						if (get_field('sbm_theme_options_header_logo', 'option')) :?>
							<a class="navbar-brand ms-5 ms-md-0" href="<?php echo home_url();?>">
								<img src="<?php the_field('sbm_theme_options_header_logo', 'option');?>" alt="<?php echo esc_attr('Austin Health');?>">
							</a>
						<?php endif; ?>	
				</div>
				<div class="collapse navbar-collapse" id="navbarText">
				<div class="close"></div>
				<a class="menulinks"><i></i></a>
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

					<div class="search-icon d-xxl-block">
						<form action="/" method="get">
							<div class="search-box" style="display: block;">
								<input type="text" name="s" id="search" value="<?php the_search_query(); ?>"  placeholder="Search">
								<div class="iocn"><i class="fas fa-search"></i><input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" /></div>
									
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>
