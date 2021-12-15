<?php
/**
 * Styles Configuration
 * Looks into the theme's `styles` directory for a config file, which it
 * expects to list the front-end and admin styles that are required, and will
 * trigger the `enqueue` function to add them to the page.
 */

	if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once __DIR__ . '/ConfigAutoloaderBase.php';

class ConfigAutoloaderStyles extends ConfigAutoloaderBase
{
  private $styleDefaults = array(
    'path' => null,
    'admin' => null,
    'dependencies' => array(),
    'version' => false,
    'media' => 'all'
  );

  private $styles = [
    'front' => [],
    'back' => []
  ];

  public function include($configArray, $args = false)
  {
    foreach($configArray as $configKey => $config) {

      $style = shortcode_atts($this->styleDefaults, $config);

      $is_remote = $this->isRemote($config['path']);
      $filename = $config['path'];

      $style['path'] = $is_remote?$config['path']:theme_uri($config['path']);

      if (!$is_remote)
        $style['version'] = get_asset_version($filename);

      $style['id'] = $configKey;

      if ($style['admin'] === null || $style['admin'] === true) {
        $this->styles['front'][] = $style;
      }
      
      if ($style['admin'] !== null) {
        $this->styles['back'][] = $style;
      }

    }
      
    if (!empty($this->styles['front'])) {

      $styles = $this->styles['front'];
      
      if (!$args) {

        add_action('wp_enqueue_scripts', function() use ( $styles ) {
          
            $this->enqueueScripts($styles);

        });

      } else {

        $this->enqueueScripts($styles);
        
      }

    }
      
    if (!empty($this->styles['back'])) {

      $styles = $this->styles['back'];
      
      if (!$args) {
      
        add_action('admin_enqueue_scripts', function() use ( $styles ) {
          
            $this->enqueueScripts($styles);

        });

      } else {

        $this->enqueueScripts($styles);
        
      }

    }

  }

  public function enqueueScripts($styles)
  { 
    foreach($styles as $style)
    {
      wp_enqueue_style($style['id'], $style['path'], $style['dependencies'], $style['version'], $style['media']);
    }
  }

}

