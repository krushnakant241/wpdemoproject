<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// define('WP_DEBUG',         true);
// define('WP_DEBUG_DISPLAY', true);
// @ini_set('display_errors', 0);

// Load SBM helpers, site options & our WP cleanup
include_once 'inc/sbm_helpers.php';
include_once 'inc/sbm_options.php';
include_once 'inc/sbm_menus.php';

// Load ACF Gutenberg Blocks
include_once 'inc/sbm_blockloader.php';

// Load Styles & Scripts
include_once 'inc/sbm_enqueuescripts.php';
