<?php
$single_featured_image =get_the_post_thumbnail_url(get_the_ID(),'full');
	get_header();
	?>
	<section class="trams-single-post">
		<div class="container-fluid p-0">
			<div class="single-featured-image" style="background:url(<?php echo esc_url($single_featured_image); ?>) no-repeat center center">
				
			</div>
			
			
		</div>
		<div class="container">
				
			
		<?php if ( have_posts() ) : 
			
			while ( have_posts() ) : the_post();
				
				the_content();
				
			endwhile;
			
		else :

			_e( 'Sorry, Not found any post' );

		endif;
		?>

		<div class="eko_reusable_block_post mt-5">
				
		</div>

		</div>
	</section>
	<?php 
	get_footer();
