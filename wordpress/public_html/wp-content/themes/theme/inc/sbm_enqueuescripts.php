<?php
if (!defined('ABSPATH')) exit;

/**
 * Description: A place to enqueue our styles and scripts. Most should be built using the gulp process.
 */

function sbm_enqueue_style()
{
	wp_enqueue_style('sbm-main-style', sbm_theme_uri('main.css'), false, sbm_get_asset_version('main.css'), 'ALL');
}

function sbm_enqueue_script()
{
	wp_enqueue_script('sbm-main-script', sbm_theme_uri('main.js'), '', sbm_get_asset_version('main.js'));
	wp_enqueue_script('vendor-fontawesome-script', sbm_theme_uri('/src/vendor/fontawesome/js/fontawesome5.min.js'), '', '1', true);


}

add_action('wp_enqueue_scripts', 'sbm_enqueue_style');
add_action('wp_enqueue_scripts', 'sbm_enqueue_script');




function trams_admin_enqueue($hook) {
  
    if ('post.php' !== $hook) {
        return;
    }
    wp_enqueue_script('admin-plain-content',sbm_theme_uri( '/assets/js/plain_content.js'));
}

add_action('admin_enqueue_scripts', 'trams_admin_enqueue');

