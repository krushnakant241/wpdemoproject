<?php

/**
 * Plugin Name:  Wordpress Cleanup
 * Description:  Remove Wordpress defaults.
 * Version:      1.0.0
 * Author:       Peter Kavanagh
 * Template:     smithbrothersmedia
 * Author URI:   https://smithbrothersmedia.com.au/
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!is_blog_installed()) {
	return;
}

// remove admin color picker.
remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");

// remove wordpress admin bar link.
add_action('wp_before_admin_bar_render', function () {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}, 0);



add_filter('show_admin_bar', '__return_false');

remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version

remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// disable gutenberg styles in Frontend
add_action('wp_print_styles', function () {
	wp_dequeue_style('wp-block-library');
}, 100);

// override empty "from" email/name in outbound emails.
add_filter('wp_mail_from', function ($original_email_address) {
	return ($original_email_address === 'wordpress@_') ? "admin@" . $_SERVER['HTTP_HOST'] : $original_email_address;
});
add_filter('wp_mail_from_name', function ($original_email_from) {
	return ($original_email_from === 'Wordpress') ? 'Site Admin' : $original_email_from;
});

add_action('admin_menu', function () {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'normal');// Remove "At a Glance"
	// remove_meta_box('dashboard_activity', 'dashboard', 'normal');// Remove "Activity" which includes "Recent Comments"
	// remove_meta_box('dashboard_quick_press', 'dashboard', 'side');// Remove Quick Draft
	remove_meta_box('dashboard_primary', 'dashboard', 'core'); // Remove WordPress Events and News
});

add_action('admin_init', function () {
	add_filter('admin_footer_text', function () {
		return '';
	}, 11);
});

add_action('init', function () {

	// disable wp emoji's
	remove_action('wp_head', 'print_emoji_detection_script', 7);

	remove_action('admin_print_scripts', 'print_emoji_detection_script');

	remove_action('wp_print_styles', 'print_emoji_styles');

	remove_action('admin_print_styles', 'print_emoji_styles');

	remove_filter('the_content_feed', 'wp_staticize_emoji');

	remove_filter('comment_text_rss', 'wp_staticize_emoji');

	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

	add_filter('tiny_mce_plugins', function ($plugins) {
		if (is_array($plugins)) {
			return array_diff($plugins, array('wpemoji'));
		} else {
			return array();
		}
	});

	// remove the REST API endpoint.
	remove_action('rest_api_init', 'wp_oembed_register_route');

	// turn off oEmbed auto discovery.
	add_filter('embed_oembed_discover', '__return_false');

	// don't filter oEmbed results.
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

	// remove oEmbed discovery links.
	remove_action('wp_head', 'wp_oembed_add_discovery_links');

	// remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action('wp_head', 'wp_oembed_add_host_js');

	add_filter('tiny_mce_plugins', function ($plugins) {
		return array_diff($plugins, array('wpembed'));
	});

	// remove all embeds rewrite rules.
	add_filter('rewrite_rules_array', function ($rules) {
		foreach ($rules as $rule => $rewrite) {
			if (false !== strpos($rewrite, 'embed=true')) {
				unset($rules[$rule]);
			}
		}
		return $rules;
	});

	// remove filter of the oEmbed result before any HTTP requests are made.
	remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
});
