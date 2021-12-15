<?php

/**
 * Plugin Name: SBM Common Functions
 * Description: A collection of common functions (that otherwise should not be modified).
 * Version: 1.0.0
 * Author: Martin Keenan, Peter Kavanagh
 * Author URI: https://smithbrothersmedia.com.au/
 * License: UNLICENSED
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!is_blog_installed()) {
	return;
}

/**
 * returns a version number for the theme asset, based on an asset cache file
 * (automatically generated in the gulp build process)
 */
function get_asset_version($relativeUrl)
{
	$result = null;
	static $assetMappings = null;
	if ($assetMappings == null) {
		$assetFilepath = theme_path('/assets.json');

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
 * constructs the full path based on the given relative path, assumed to be
 * relative to the theme directory. The relative path must contain the starting
 * slash.
 */
function theme_path($relative = '')
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
 * renders the template file located at $path, extracting the key/value pairs
 * in $context into local variables for use in the template file
 */
function render_partial($path, $context = array())
{
	// based on how 'include' works with variable scoping, the $context
	// variable is available for use within that template
	include $path;
}


/**
 * A variant on the render partial function which returns the result as a
 * string rather than directly echo-ing
 */
function render_partial_to_string($path, $context = array())
{
	$result = '';

	ob_start();
	render_partial($path, $context);
	$result = ob_get_contents();
	ob_end_clean();


	return $result;
}


// include additional common functions
require 'CommonFunctions/ACF.php';
require 'CommonFunctions/Menus.php';
require 'CommonFunctions/Templates.php';
