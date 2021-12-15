<?php
if (!defined('ABSPATH')) exit;

/**
 * Description: A setup of menus and the boostrap nav walker
 */

// Add theme menus
add_action('init', function () {
	register_nav_menus(
		array(
			'header-main' => 'Header Main',
			'footer-left' => 'Footer Left',
			'footer-center' => 'Footer Center',
			'footer-right' => 'Footer Right',
			'quick-link' => 'Quick Links',
			'quick-link-bottom' => 'Quick Links Bottom',
		)
	);
});



// Register Bootstrap 5 Nav Walker
add_action('after_setup_theme', function () {
	require_once('class-bootstrap-5-navwalker.php');
	add_theme_support( 'post-thumbnails' );
	add_theme_support('align-wide');
});


// Allow classes to be added to menu items
// https://stackoverflow.com/questions/26180688/how-to-add-class-to-link-in-wp-nav-menu
function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function add_menu_list_item_class($classes, $item, $args)
{
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);
