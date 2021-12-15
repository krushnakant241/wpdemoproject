<?php
/**
 * Scripts Configuration
 * Looks into the theme's `scripts` directory for a config file, which it
 * expects to list the front-end and admin scripts that are required, and will
 * trigger the `enqueue` function to add them to the page.
 */

	if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once __DIR__ . '/ConfigAutoloaderBase.php';

class ConfigAutoloaderScripts extends ConfigAutoloaderBase
{
  private $scriptDefaults = array(
    'path' => null,
    'admin' => null,
    'dependencies' => array(),
    'version' => false,
    'footer' => true,
    'data' => null
  );

  private $scripts = [
    'front' => [],
    'back' => []
  ];

  public function include($configArray, $args = false)
  {
    foreach($configArray as $configKey => $config) {

      $script = shortcode_atts($this->scriptDefaults, $config);

      $is_remote = $this->isRemote($config['path']);
      $filename = "{$configKey}.js";

      $script['path'] = $is_remote?$config['path']:theme_uri($config['path']);

      if (!$is_remote)
        $script['version'] = get_asset_version($filename);

      $script['id'] = $configKey;

      if ($script['admin'] === null || $script['admin'] === true) {
        $this->scripts['front'][] = $script;
      }
      
      if ($script['admin'] !== null) {
        $this->scripts['back'][] = $script;
      }

    }
      
    if (!empty($this->scripts['front'])) {

      $scripts = $this->scripts['front'];
      
      if (!$args) {
      
        add_action('wp_enqueue_scripts', function() use ( $scripts ) {
          
            $this->enqueueScripts($scripts);

        });

      } else {

        $this->enqueueScripts($scripts);
        
      }

    }
      
    if (!empty($this->scripts['back'])) {

      $scripts = $this->scripts['back'];
      
      if (!$args) {
      
        add_action('admin_enqueue_scripts', function() use ( $scripts ) {
          
            $this->enqueueScripts($scripts);

        });

      } else {

        $this->enqueueScripts($scripts);
        
      }

    }

  }

    public function enqueueScripts($scripts)
    { 
        foreach($scripts as $script) {
            wp_enqueue_script(
                $script['id'],
                $script['path'],
                $script['dependencies'],
                $script['version'],
                $script['footer']
            );

            // include any data that the caller wants embedded in the page.
            // TODO: The data is always added to an object named `SBM`. We
            //   should make that configurable.
            if ($script['data']) {
                wp_localize_script(
                    $script['id'],
                    'SBM',
                    $script['data']
                );
            }
        }
    }
}

