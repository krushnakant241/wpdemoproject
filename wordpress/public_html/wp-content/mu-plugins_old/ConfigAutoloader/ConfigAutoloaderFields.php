<?php
/**
 * Fields Configuration
 * Looks into the theme's `fields` directory for a config file, which it
 * expects to list the various Fields features the theme wants to activate.
 * This includes Fields Fields (TODO) and Settings Pages.
 */
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once __DIR__ . '/ConfigAutoloaderBase.php';

class ConfigAutoloaderFields extends ConfigAutoloaderBase
{
    public function include($configArray, $args = false)
    {
        $fieldsDirectory = $this->baseDirectory . 'src/fields/';

        // skip processing if the ACF plugin isn't activated.
        if (! function_exists('acf_add_local_field_group')) {
            return;
        }

        foreach($configArray as $field) {
            $field_data = null;

            if (is_array($field)) {
                $field_data = $field;
            } else {
                $file = $fieldsDirectory . strval($field) . '.php';

                if (file_exists($file)) {
                    $field_data = include $file;
                } else {
                    trigger_error(
                        'ConfigAutoloaderFields: Unknown fields: "' .
                        htmlentities($field) . '". (Could not locate file "' .
                        $file . '")',
                        E_USER_WARNING
                    );

                    continue;
                }
            }

            if ($field_data) {      
                acf_add_local_field_group($field_data);
            }
        }
    }
}

