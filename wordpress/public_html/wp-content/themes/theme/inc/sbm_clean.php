<?php
if (!defined('ABSPATH')) exit;

/**
 * Description: Remove or clean up Wordpress defaults.
 */

// Turn off auto update
define('WP_AUTO_UPDATE_CORE', false);
add_filter('auto_update_theme', '__return_false');
