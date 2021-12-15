<?php 
/*
Template Name: News & Events Template 
*/
	get_header(); ?>

<section class="trams-news-event-list-section">
	
	<div class="page_header__top">
		<div class="container">
			<div class="row_content">
			    <h1><?php echo esc_html__('News & Events'); ?></h1>
			</div>
		</div>	
	</div>

 

		
			<?php 
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	$args = array(
		  
	'post_type' => 'trams_news_event',
	'posts_per_page'  => '2',
	'paged' => $paged,
	'post_status ' =>'publish',
		  
		  );
	$show_news_events = new WP_Query( $args );
	?>

<div class="container">
				
				<div class="news_events__wrapper"> <?php

							if ( $show_news_events->have_posts() ) {

		
		 							  while ( $show_news_events->have_posts() ) {    $show_news_events->the_post();

									$event_date = get_field('event_date', $show_news_events->post->ID);
									$event_url = get_field('event_url', $show_news_events->post->ID);
									$cta_text = get_field('cta_text', $show_news_events->post->ID);
									$event_type = get_the_terms($show_news_events->post->ID,'news_event_category');
									$post_content = get_the_content( $show_news_events->post->ID);
									$event_title = get_the_title($show_news_events->post->ID);
									$disclaimer = get_field('disclaimer', $show_news_events->ID);
									?>

									<div class="col-lg-6 news_events__wrapper__inner mb-4">
											<div class="news_events__wrapper__inner__image"
														 style="background: url(<?php echo get_the_post_thumbnail_url( $show_news_events->post->ID );?>) no-repeat center /cover; ">
															<div class="content">
															<?php 	
																if ( !empty( $event_type ) ) { ?>
																	<strong> <?php echo $event_type[0]->name;?></strong>
																	<?php 
																}
																
																if ( !empty( $event_title ) ) { ?>
																<h3><?php echo $event_title ;?>	</h3>
																<?php 
																}

																if ( !empty( $event_date ) ) { ?>
																	<div class="date"><?php echo $event_date;?></div>
																	<?php 
																}

																if ( !empty( $event_url ) ) { ?>
																
																<div class="button">
																		<a href="<?php echo esc_url($event_url['url']) ?>"  target="<?php echo esc_attr($event_url['target']);?>"><?php echo $event_url['title'];?></a>
																</div>
																<?php 
																}

																if ( !empty( $cta_text ) ) { ?>
																	<p class="text"><?php echo $cta_text;?></p>
																	<?php
																}

																if ( !empty( $disclaimer) ) { ?>
																	<span><?php echo $disclaimer;?></span>
																	<?php
																} ?>

															</div>
														</div>
											</div>
							<?php																											
								}
							} ?>

		</div>

	
		<div class='trams-post-pagignation'>
			<?php 
			$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
		    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		    'format' => '?paged=%#%',
		    'current' => max( 1, get_query_var('paged') ),
		    'total' =>  $show_news_events->max_num_pages
		) );
		
			?>
		
		</div>
						
</div>
					
	
				


</section>		

<?php 
get_footer();
