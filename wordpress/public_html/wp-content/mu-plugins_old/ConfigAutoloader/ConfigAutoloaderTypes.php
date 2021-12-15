<?php
/**
 * Post Type Register
 * Looks into the theme's `types` directory for a config file, which it
 * expects to list of custom post types the theme wants to register.
 */

	if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
  require_once __DIR__ . '/ConfigAutoloaderBase.php';

  class ConfigAutoloaderTypes extends ConfigAutoloaderBase
  {

    /**
     * We expect $fields to be an array containing a list of file names
     * relative to the base directory which contain the field definitions
     */
    public function include($configArray, $args = false)
    {
      // loop through each type schema.
      foreach ($configArray as $typeKey) {
  
        $type_schema = include(get_template_directory() . "/src/types/{$typeKey}.php");

        // merge defaults.
        $type_data = array_merge([
          'label'                 => __( 'Post Type', 'text_domain' ),
          'description'           => __( 'Post Type Description', 'text_domain' ),
          'supports'              => false,
          'taxonomies'            => [],
          'hierarchical'          => false,
          'public'                => false,
          'show_ui'               => false,
          'show_in_menu'          => false,
          'menu_position'         => 0,
          'show_in_admin_bar'     => false,
          'show_in_nav_menus'     => false,
          'can_export'            => false,
          'has_archive'           => false,
          'exclude_from_search'   => false,
          'publicly_queryable'    => false,
          'capability_type'       => 'page',
        ], $type_schema);

        $this->importAcfFields($type_data, array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => $typeKey,
        ), $typeKey);
        
        // $this->importAcfOptions($type_data, array(
        //   'parent_slug' => "edit.php?post_type={$typeKey}"
        // ), $typeKey);

        // register type.
        register_post_type($typeKey, $type_data);

        if (isset($type_data['@options'])) {

          foreach($type_data['@options'] as $pageIndex=>$subpage) {
  
            $type_data = array_merge($subpage, array(
              'parent_slug' => "edit.php?post_type={$typeKey}"
            ));
            
            $childPage = acf_add_options_page($type_data);
  
            $this->importAcfFields($type_data, array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => $childPage['menu_slug'],
            ), $childPage['menu_slug']);
  
          }
  
        }

        $this->importDependencies($type_data);

      }
    }

  }

