<?php 

	get_header(); ?>

<section class="trams-news-event-list-section blog_section_in">
	
	<div class="page_header__top">
		<div class="container">
			<div class="row_content">
			    <h1><?php echo esc_html__('Blog'); ?></h1>
			</div>
		</div>	
	</div>

	<div class="trams_filter_show d-flex ">
		<div class="container">
			<div class="filte_label"><?php echo esc_html('Filter by:')?> </div>
			<div class="list_posts_category list_posts  mb-5">
				<?php wp_dropdown_categories( array('show_option_all' => __('All Categories')));?>
				<i class="fas fa-angle-down"></i> 
			</div>
	

		</div>			

	</div>

		
			<?php 
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	$args = array(
		  
	'post_type' => 'post',
	'posts_per_page'  => '2',
	'paged' => $paged,
	'post_status ' =>'publish',
		  
		  );
	$show_news_events = new WP_Query( $args );
	?>

	<div class="container">
		<div class="news_events__wrapper " id="get_ajax_post"></div>
						
	</div>
						

</section>		

<?php 
get_footer();
