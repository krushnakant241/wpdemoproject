<?php
/**
 * Components Register
 * The `components` config key is expected to be an array listing out the names
 * of component directories that are to be included in the site.
 * Each component directory is expected to contain an `@config.php` file, which
 * lists all the templates/functions, etc that the component uses.
 */

if(! defined('ABSPATH')) {
    exit;
}


require_once __DIR__ . '/ConfigAutoloaderBase.php';


class ConfigAutoloaderComponents extends ConfigAutoloaderBase
{
    public function include($configArray, $args = false)
    {
        // loop through each component schema.
        foreach ($configArray as $directory) {
            $componentDirectory = $this->baseDirectory . 'src/components/' . $directory . '/';
            $componentConfig = $componentDirectory . '@config.php';

            if (file_exists($componentConfig)) {
                new ConfigAutoloader($componentDirectory, '@config.php', $directory);
            } else {
                trigger_error(
                    'ConfigAutoloaderComponents: Unknown component: "' .
                    htmlentities($directory) . '". (Configuration file "'.
                    $componentConfig . '" does not exist)',
                    E_USER_WARNING
                );
            }
        }
    }
}

