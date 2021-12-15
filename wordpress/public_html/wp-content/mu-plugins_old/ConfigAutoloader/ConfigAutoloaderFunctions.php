<?php
/**
 * Functions Register
 * The `functions` config key is expected to be an array listing out the names
 * of files located in the theme's `functions` directory. We then include each
 * one to execute the code located within each file.
 */
if(! defined('ABSPATH')) {
    exit;
}


require_once __DIR__ . '/ConfigAutoloaderBase.php';


class ConfigAutoloaderFunctions extends ConfigAutoloaderBase
{
    public function include($configArray, $args = false)
    {
        // loop through each function file in the array, and load the PHP it
        // contains.
        foreach ($configArray as $function) {
            $filePath = $this->baseDirectory . 'src/functions/' . $function . '.php';

            if (file_exists($filePath)) {
                include $filePath;
            } else {
                trigger_error(
                    'ConfigAutoloaderFunctions: file path does not exist: "' . htmlentities($function) . '".',
                    E_USER_WARNING
                );
            }
        }
    }
}

