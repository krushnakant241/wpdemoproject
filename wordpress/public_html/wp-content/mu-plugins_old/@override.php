<?php
/**
 * Plugin Name:  Wordpress Override Config
 * Description:  Override Wordpress config defaults.
 * Version:      1.0.0
 * Author:       Peter Kavanagh
 * Author URI:   https://smithbrothersmedia.com.au/
 */

if(! defined('ABSPATH')) exit; // Exit if accessed directly

if (!is_blog_installed()) {
    return;
}

add_action( 'after_setup_theme', function () {
    // support wp_head "title" tag.
    add_theme_support('title-tag');
});

// replace "wordpress" link with site url.
add_filter('login_headerurl', function() {
    return site_url();
});

// replace "wordpress" link text with site url.
add_filter('login_headertext', function() {
    return '<style>.login h1{display:none !important;}</style>';
});

