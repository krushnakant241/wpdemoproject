<?php get_header(); ?>
<section id="primary" class="content-area mt-5">
	<div id="content" class="site-content" role="main">

						<?php if ( have_posts() ) : ?>
			<div class="container eko-search">
								<header class="page-header">
										<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
								</header><!-- .page-header -->

								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>

								<h3><?php the_title(); ?></h3>

								<p><?php the_excerpt();?></p>
								<p>
									<a href="<?php echo get_permalink();?>"> 
									Read more...
									</a>
								</p>

								<?php endwhile; ?>
							</div>

						<?php else : ?>

								<?php echo esc_html_e('No search found'); ?>

						<?php endif; ?>

			</div><!-- #content .site-content -->
				</section><!-- #primary .content-area -->

<?php get_footer(); ?>
