<?php
if (!defined('ABSPATH')) exit;

/**
 * Description: A collection of common functions used throughout SBM theme builds
 */

/**
 * Are we local or remote
 */
function sbm_isRemote($src)
{
	return (substr($src, 0, 4) === 'http' || substr($src, 0, 2) === '//');
}


/**
 * constructs the full path based on the given relative path, assumed to be
 * relative to the theme directory. The relative path must contain the starting
 * slash.
 */
function sbm_theme_path($relative = '')
{
	// use a static local here, so we only calculate this value once.
	static $theme_base_path = null;
	if ($theme_base_path == null) {
		$theme_base_path = get_stylesheet_directory();
	}

	if (!(substr($relative, 0, 1) == '/')) {
		$relative = '/' . $relative;
	}

	return $theme_base_path . $relative;
}

/**
 * constructs a full URI based on the given relative URI. assumed to be
 * relative to the theme directory. The relative URI must be passed with the
 * starting slash (i.e. /css/main.css, not css/main.css)
 */
function sbm_theme_uri($relative = '')
{
	// use a static local here, so we only calculate this value once.
	static $theme_base_uri = null;
	if ($theme_base_uri == null) {
		$theme_base_uri = get_stylesheet_directory_uri();
	}

	if (!(substr($relative, 0, 1) == '/')) {
		$relative = '/' . $relative;
	}

	return $theme_base_uri . $relative;
}

/**
 * returns a version number for the theme asset, based on an asset cache file
 * (automatically generated in the gulp build process)
 */
function sbm_get_asset_version($relativeUrl)
{
	$result = null;
	static $assetMappings = null;
	if ($assetMappings == null) {
		$assetFilepath = sbm_theme_path('/assets.json');

		$fileContents = null;
		if (file_exists($assetFilepath)) {
			$fileContents = file_get_contents($assetFilepath);
		}

		if ($fileContents) {
			$assetMappings = json_decode($fileContents, true);
		} else {
			$assetMappings = array();
		}
	}

	if (array_key_exists($relativeUrl, $assetMappings)) {
		$result = $assetMappings[$relativeUrl];
	}

	return $result;
}

/**
 * Async or defer scripts when loaded using wp_enqueue_script
 */
function sbm_async_defer_script($tag, $handle)
{
	$defer_handles = [
		//'sbm-main'
	];

	$async_handles = [
		'sbm-main',
		'vendor-fontawesome-script'
	];

	if (in_array($handle, $defer_handles)) {
		return str_replace('src=', 'defer src=', $tag);
	}

	if (in_array($handle, $async_handles)) {

		return str_replace('src=', 'async src=', $tag);
	}

	return $tag;
}
add_filter('script_loader_tag', 'sbm_async_defer_script', 10, 2);

//add_filter("the_content", "eko_content_break_text");
	function eko_content_break_text($text){
		
		
			$length = 180;
		    if(strlen($text)<$length+10) return $text;//don't cut if too short

		    $break_pos = strpos($text, ' ', $length);//find next space after desired length
		    $visible = substr($text, 0, $break_pos);
		    return balanceTags($visible);	
	    
	
}

add_action('wp_enqueue_scripts', 'eko_ajax_filter_posts_scripts');
function eko_ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('trams_custom_script', get_template_directory_uri() . '/assets/js/ajax-script.js',array('jquery'),'',true);

  wp_enqueue_script('trams_custom_script');


  wp_localize_script( 'trams_custom_script', 'trams_vars', array(
     
        'ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}


add_action( 'wp_ajax_trams_show_posts', 'trams_show_posts' );  
add_action( 'wp_ajax_nopriv_trams_show_posts', 'trams_show_posts' );


function trams_show_posts(){
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	$category = $_POST['category'];
	//$tag = $_POST['tag'];
	$tax_query = array('relation' => 'AND');

	$category = $category>0 ? $category : '';
	//$tag = $tag>0 ? $tag : '';
  
	$args = array(
		    'cat' => $category,
		    //'tag_id' => $tag,
		    'post_type' => 'post',
		    'posts_per_page' => -1,
		 	//  'offset' => $offset,
		    'post_status ' =>'publish',
		    'paged' => $paged,
		  );
	$trams_post = new WP_Query( $args );
	if ( $trams_post->have_posts() ) {
   	$show_content="";
    while ( $trams_post->have_posts() ) {
        $trams_post->the_post();
       	 	$post_id =  $trams_post->post->ID;

       	 	$category_object = get_the_category($post_id);
       	 	$category_name = $category_object[0]->name;
      	 	$post_content = get_the_content($post_id);
       	 	
 					$show_content .='<div class="col-lg-6 news_events__wrapper__inner mb-4 blog_inner_content">
														<div class="news_events__wrapper__inner__image" style="background: url('.get_the_post_thumbnail_url( $post_id ).') no-repeat center /cover; ">
															<div class="content">';
																
																if ( !empty( $category_name ) ) {
																	$show_content .='<strong class="blog_cat">'. $category_name .'</strong>';
																}
																
																if ( !empty( get_the_title($post_id) ) ) {
																	$show_content .='<h3>'. get_the_title($post_id) .'</h3>';
																}

																if ( !empty( $post_content)  ) {
																		$show_content .='<div class="content_excerpt">
																		<p>'. $post_content .'</p>
																		<div class="read-more-link button">';
																		$show_content .='<a href="'.get_the_permalink($post_id).'">'.esc_html('Read more').'</a>';
																	$show_content .='</div></div>';
																	 
																}

									$show_content .='		</div>
														</div>
													</div>';

	    }
	   
	}else{
		 $show_content.="<div class='not_found'>". esc_html(" Related Posts not found.")."</div>";
	  
			// $nextpage = $paged+1;
	}
 
	  //  wp_reset_query();
 	wp_send_json($show_content);
	die();
}

// Register Custom Post Type For News And Events
function tarms_custom_post_news_event() {

	$labels = array(
		'name'                  => 'News & Event',
		'singular_name'         => 'news_and_events',
		'menu_name'             => 'News & Event',
		'name_admin_bar'        => 'News & Event',
		'archives'              => 'Item News & Event',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent News & Event:',
		'all_items'             => 'All News & Events',
		'add_new_item'          => 'Add New News Or Event',
		'add_new'               => 'Add News Or Event',
		'new_item'              => 'New News Or Event',
		'edit_item'             => 'Edit News Or Event',
		'update_item'           => 'Update News Or Event',
		'view_item'             => 'View News Or Event',
		'view_items'            => 'View News Or Events',
		'search_items'          => 'Search News Or Event',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'News Or Event Featured Image',
		'set_featured_image'    => 'Set News Or Event featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter News Or Event list',
	);
	$args = array(
		'label'                 => 'News Or Event',
		'description'           => 'Trams News Or Event List',
		'labels'                => $labels,
		'show_in_rest' 			=> true,
		'rewrite'            => array( 'slug' => 'news-event' , 'with_front' => false),
		'supports'              => array( 'title','excerpt', 'editor', 'thumbnail', 'page-attributes', 'excerpt'),
		'taxonomies'            => array( 'project_category', 'project_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'trams_news_event', $args );
	flush_rewrite_rules();

}
add_action( 'init', 'tarms_custom_post_news_event', 0 );

// Register Custom Taxonomy
function trams_custom_taxonomy_ne() {

	$labels = array(
		'name'                       => 'Categories',
		'singular_name'              => 'Category',
		'menu_name'                  => 'Categories',
		'all_items'                  => 'All Categories',
		'parent_item'                => 'Parent Category',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Category',
		'add_new_item'               => 'Add New Category',
		'edit_item'                  => 'Edit Category',
		'update_item'                => 'Update Category',
		'view_item'                  => 'View Category',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest' 		         => true,
	);
	register_taxonomy( 'news_event_category', 'trams_news_event', $args );

}
add_action( 'init', 'trams_custom_taxonomy_ne', 0 );


// Register Custom Taxonomy
function trams_custom_tag_ne() {

	$labels = array(
		'name'                       => 'News Or Event Tags',
		'singular_name'              => 'Tag',
		'menu_name'                  => 'Tags',
		'all_items'                  => 'All Tags',
		'parent_item'                => 'Parent Category',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Tag',
		'add_new_item'               => 'Add New Tag',
		'edit_item'                  => 'Edit Tag',

		'update_item'                => 'Update Tag',
		'view_item'                  => 'View Tag',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest' 				 => true,
	);
	register_taxonomy( 'news_event_tag', 'trams_news_event', $args );

}
add_action( 'init', 'trams_custom_tag_ne', 0 );




add_action( 'wp_ajax_eko_show_projects', 'eko_show_projects' );  
add_action( 'wp_ajax_nopriv_eko_show_projects', 'eko_show_projects' );


function eko_show_projects(){
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	$category = $_POST['category'];
	$tag = $_POST['tag'];
	$tax_query = array('relation' => 'AND');

	if($category>0)
    {
        $tax_query[] =  array(
                'taxonomy' => 'project_category', //double check your taxonomy name in you dd 
		        'field'    => 'id',
		        'terms'    => $category,
            );
    }
   	if ($tag>0)
    {
        $tax_query[] =  array(
			'taxonomy' => 'project_tag', //double check your taxonomy name in you dd 
			'field'    => 'id',
			'terms'    => $tag,
        );
    }

	
	$args = array(
		    'tax_query' => $tax_query,
		    'post_type' => 'eko_project',
		    'posts_per_page' => -1,
		 	//  'offset' => $offset,
		    'post_status ' =>'publish',
		    'paged' => $paged,
		  );
	$eko_project = new WP_Query( $args );

	

	if ( $eko_project->have_posts() ) {
   	$data="<div class='row'>";
    while ( $eko_project->have_posts() ) {
     	   $eko_project->the_post();

       	 	$post_id       =  $eko_project->post->ID;
       	 	$project_price =  get_field('eko_proj_price',$post_id);
       	 	$project_panel =  get_field('eko_proj_panel',$post_id);
       	 	$project_kw    =  get_field('eko_proj_kw',$post_id);
       	 	$category_object = get_the_category($post_id);
       	 	//$category_name = $category_object[0]->name;
  			$categories = get_the_terms( $post_id, 'project_category' );
			  $noun_saving1 =  get_template_directory_uri().'/assets/images/noun_saving-white.png';
			  $Component1 =  get_template_directory_uri().'/assets/images/Component-white.png';
			  $blot1 =  get_template_directory_uri().'/assets/images/blot-white.png';
  			if($categories){
  				$category_name = $categories[0]->name;
  			}else{
  				$category_name = '' ;
  			}

      	 	$post_content = get_the_content($post_id);
       	 	
   		 	$data .="<div class='col-6'>
   		 				<div class='blog-box-wrap'>";
	   		 		$data.=	"<div class='solar-image'>
			 							<a href='".get_the_permalink()."''>
										<img src='".esc_url(get_the_post_thumbnail_url($post_id,'medium_large'))."' alt='".esc_attr(get_the_title($post_id))."' title='".esc_attr(get_the_title($post_id))."' />
									</a>
							</div>";
					$data.="<div class='solar-meta'>";
						$data .= "<div class='solar-content-wrap'>";
				
								$data.=	"<div class='solar-exerpt'>
												<div class='solar-title'>".get_the_title($post_id)."</div>
												<div class='eko-post-content'>". get_the_excerpt()."</div>
										</div>
										<div class='solar-content-right'>
												<div class='solar_right_con'>
													<ul>
														<li>
															<img src='".$noun_saving1."'> 
															<strong>$".$project_price."K"."</strong>
														</li>
														<li>
															<img src='".$Component1."'> 
															<strong>".$project_panel."</strong>
															</li>
														<li>
															<img src='".$blot1."'> 
															<strong>".$project_kw."</strong>
														</li>
													</ul>
												</div>
												<div class='read-more'>
													<a href='".get_the_permalink()."'>
													<i class='fas fa-angle-right'></i>Read more</a>
												</div>
										</div>
								</div>
						   </div>";

			$data .="</div>
				</div>";
	    }
	    $data.="</div";
	}else{
		 $data.="<div class='not_found'>". esc_html(" Related Projects not found.")."</div>";
	  
			// $nextpage = $paged+1;
	}
  
 	wp_send_json($data);
	die();
}

add_shortcode('projects_meta_fields','show_custom_meta_fields');
function show_custom_meta_fields(){
	 global $post;
  	   $proj_fields="";
    
       $project_price= get_field('eko_proj_price',$post->ID);
       $project_panel= get_field('eko_proj_panel',$post->ID);
       $project_kw= get_field('eko_proj_kw',$post->ID);
	   $noun_saving =  get_template_directory_uri().'/assets/images/noun_saving.png';
	   $Component =  get_template_directory_uri().'/assets/images/Component.png';
	   $blot =  get_template_directory_uri().'/assets/images/blot.png';
	   $noun_saving_label = esc_html('Saved per annum');
	   $Component_label = esc_html('Panels');
	   $blot_label = esc_html('System size');

      $proj_fields.="
      <div class='solar_right_con'>
		<ul>
			<li> 
				<img src='".$noun_saving."'> 
				<strong>$".$project_price."K"."</strong>
				<h6>".$noun_saving_label."</h6>
			</li>
			<li> 
				<img src='".$Component."'>
				<strong>".$project_panel."</strong>
				<h6>".$Component_label."</h6>
			</li>
			<li> 
				<img src='".$blot."'>
				<strong>".$project_kw."</strong>
				<h6>".$blot_label."</h6>
			</li>
		</ul>
	  </div>
      ";
       return $proj_fields;
}


function eko_widgets_init() {

    register_sidebar( array(
        'name' => 'Footer Section 1',
        'id' => 'footer_sec_1',
        'before_widget' => '<div class="footer__row__right__wrapper__list ">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="eko_widget">',
        'after_title' => '</h2>',
    ) );


    register_sidebar( array(
        'name' => 'Footer Section 2',
        'id' => 'footer_sec_2',
        'before_widget' => '<div class="footer__row__right__wrapper__list ">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="eko_widget">',
        'after_title' => '</h2>',
    ) );


    register_sidebar( array(
        'name' => 'Footer Section 3',
        'id' => 'footer_sec_3',
        'before_widget' => '<div class="footer__row__right__wrapper__list ">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="eko_widget">',
        'after_title' => '</h2>',
    ) );

      register_sidebar( array(
        'name' => 'Footer Section 4',
        'id' => 'footer_sec_4',
        'before_widget' => '<div class="footer__row__right__wrapper__list ">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="eko_widget">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'eko_widgets_init' );

function trams_news_events_shortcode(){
	global $post;
	
	if ( $post->post_name == "home" ) {
		$sbm_theme_options_news_events_title = get_field('sbm_theme_options_news_events_title','option');
		$sbm_theme_options_news_events_url = get_field('sbm_theme_options_news_events_url1','option'); 	
	}elseif ( $post->post_name == "for-healthcare-providers" ) {
		$sbm_theme_options_news_events_title = get_field('sbm_theme_options_news_events_title2','option');
		$sbm_theme_options_news_events_url = get_field('sbm_theme_options_news_events_url2','option'); 	
	}		
	$show_news_events = get_posts( 
								array(
									'posts_per_page' => 2,
									'post_type'      => 'trams_news_event',
									'post_status'    => 'publish'
								) 
							);
	$show_content ="";
	$show_content .='<section class="news_events main_home_newsevents">
						<div class="container">';
							if ( !empty( $sbm_theme_options_news_events_title ) ) {
				$show_content .='<div class="news_events__title">
									<h2>'. $sbm_theme_options_news_events_title .'</h2>
								</div>';
							}

				$show_content .='<div class="row news_events__wrapper ">';

								foreach ($show_news_events as $key => $news_events) {

									$event_date = get_field('event_date', $news_events->ID);
									$event_url = get_field('event_url', $news_events->ID);
									$cta_text = get_field('cta_text', $news_events->ID);
									$disclaimer = get_field('disclaimer', $news_events->ID);
									$event_type = get_the_terms($news_events->ID,'news_event_category');

									$show_content .='<div class="col-lg-6 news_events__wrapper__inner">
														<div class="news_events__wrapper__inner__image" style="background: url('.get_the_post_thumbnail_url( $news_events->ID ).') no-repeat center /cover; ">
															<div class="content ">';
																
																if ( !empty( $event_type ) ) {
																	$show_content .='<strong>'. $event_type[0]->name .'</strong>';
																}
																
																if ( !empty( get_the_title($news_events->ID) ) ) {
																	$show_content .='<h3>'. get_the_title($news_events->ID) .'</h3>';
																}

																if ( !empty( $event_date ) ) {
																	$show_content .='<div class="date">'. $event_date .'</div>';
																}

																if ( !empty( $event_url ) ) {
																	$show_content .='<div class="button">
																						<a href="'. $event_url['url'] .'"  target="'. $event_url['target'] .'">'. $event_url['title'] .'</a>
																					</div>';
																}

																if ( !empty( $cta_text ) ) {
																	$show_content .='<p class="text">'. $cta_text.'</p>';
																}

																if ( !empty( $disclaimer)  ) {
																	$show_content .='<span>'. $disclaimer .'</span>';
																}

									$show_content .='		</div>
														</div>
													</div>';														
								}

	$show_content .='		</div>';

						if ( !empty( $sbm_theme_options_news_events_url ) ) {
			$show_content .='<div class="news_events__page_link">					
								<a href="'. $sbm_theme_options_news_events_url["url"] .'" target="'. $sbm_theme_options_news_events_url["target"] .'"> <i class="fa fa-angle-right" aria-hidden="true"></i> '. $sbm_theme_options_news_events_url["title"] .'</a>
							</div>';
						}

	$show_content .='</div>
					</section>';	
					
	return $show_content;
}

add_shortcode('trams_news_events_shortcode','trams_news_events_shortcode');


function trams_custom_redirects() {

    if ( is_page('resources') && !isset($_COOKIE['trams_resource_visit']) )  {
    	
    		wp_redirect(home_url('/disclaimer'));
    		die;
	}
     if ( is_page('disclaimer') && isset($_COOKIE['trams_resource_visit']) && $_COOKIE['trams_resource_visit']==1)  {
    	
    	//	wp_redirect(home_url('/resources'));
    	//	die;
	}
    	// if( isset($_COOKIE['trams_resource_visit']) && $_COOKIE['trams_resource_visit']==1){
    	// 	echo "yes";
    	// 	}else{
    	// 		echo "no";
    	// 	}

}
add_action( 'template_redirect', 'trams_custom_redirects' );


add_action( 'wp_ajax_trams_set_cookies', 'trams_set_cookies' );  
add_action( 'wp_ajax_nopriv_trams_set_cookies', 'trams_set_cookies' );

function trams_set_cookies(){

	if(!isset($_COOKIE['trams_resource_visit'])) {
 	
	// set a cookie for 1 year
		setcookie('trams_resource_visit', '1' , time()+31556926,'/');
	 
	}

	$trams_cookies = $_COOKIE['trams_resource_visit'];
	wp_send_json($trams_cookies);
	die();
	 
     
	
}