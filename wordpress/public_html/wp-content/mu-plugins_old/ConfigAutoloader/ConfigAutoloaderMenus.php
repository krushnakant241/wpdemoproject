<?php
/**
 * Menus Configuration
 * Looks into the theme's `menus` directory for a config file, which it
 * expects to list the menu locations required by the theme. This autoloader
 * handles registering those locations.
 */

	if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once __DIR__ . '/ConfigAutoloaderBase.php';

class ConfigAutoloaderMenus extends ConfigAutoloaderBase
{
  public function include($configArray, $args = false)
  {
    foreach ($configArray as $location => $description) {
      register_nav_menu($location, $description);
    }
  }
}

