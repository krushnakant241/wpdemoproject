
<?php

	get_header();

	if ( have_posts() ) : ?>
		<div class="trams-pages">
	<?php	while ( have_posts() ) : the_post(); ?>
			
			<?php the_content();
				
		endwhile; ?>
		</div>
		<?php 
	else :

		_e( 'Sorry, No posts matched your criteria.');

	endif;

get_footer();
	?>
