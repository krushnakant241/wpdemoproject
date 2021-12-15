<?php

/**
 * Plugin Name: Config Autoloader
 * Description: An autoloader that enables custom post types, blocks and more to be autoloaded.
 * Version: 1.0.0
 * Author: Peter Kavanagh
 * Author URI: https://smithbrothersmedia.com.au/
 * License: UNLICENSED
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!is_blog_installed()) {
	return;
}

require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderComponents.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderStyles.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderScripts.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderTypes.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderFields.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderFunctions.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderOptions.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderMenus.php';
require_once __DIR__ . '/ConfigAutoloader/ConfigAutoloaderBlocks.php';

class ConfigAutoloader
{
	private $baseDirectory;

	private $configurationFile;

	private $configuration;

	private $namespace;

	private static $loadedModules = array();


	/**
	 * The root directory of the theme.
	 * When loading components, the `$baseDirectory` is set to the component's
	 * directory, but we need to maintain a reference to the "overall base
	 * directory" (which we call the root directory), for the purpose of
	 * loading components from within another component.
	 */
	private static $rootDirectory = null;

	public function __construct($baseDirectory, $configFileLocation, $namespace = null)
	{
		$this->baseDirectory = $baseDirectory;
		$this->namespace = $namespace;

		if (self::$rootDirectory === null) {
			self::$rootDirectory = $baseDirectory;
		}

		if ($configFileLocation) {
			$this->configurationFile = $this->baseDirectory . $configFileLocation;
		} else {
			$this->configurationFile = $this->baseDirectory . 'src/@config.php';
		}


		if (file_exists($this->configurationFile)) {
			$this->configuration = require_once $this->configurationFile;

			if ($this->configuration && is_array($this->configuration)) {
				$this->deployConfigInit($this->configuration);
			}
		}
	}

	/**
	 * We expect $configuration to be an array containing a
	 * list of definitions.
	 */
	public function deployConfigInit($configuration)
	{
		// defines the array keys, their correspending "config auto-loader",
		// and the order in which they are loaded.
		$modules = array(
			'functions' => 'ConfigAutoloaderFunctions',
			'components' => 'ConfigAutoloaderComponents',
			'types' => 'ConfigAutoloaderTypes',
			'options' => 'ConfigAutoloaderOptions',
			'fields' => 'ConfigAutoloaderFields',
			'menus' => 'ConfigAutoloaderMenus',
			'blocks' => 'ConfigAutoloaderBlocks',
			'styles' => 'ConfigAutoloaderStyles',
			'scripts' => 'ConfigAutoloaderScripts'
		);

		foreach ($modules as $key => $autoloader) {
			if (array_key_exists($key, $configuration)) {
				// only load the configuration if it hasn't already been done.
				if (!$this->hasModuleBeenLoaded($key)) {
					// Components are always loaded relative to the theme root
					// directory, whereas all other configurations are relative
					// to the "thing" being loaded (the overall theme or a
					// component).
					if ($key == 'components') {
						$tmp = new $autoloader(
							$configuration[$key],
							self::$rootDirectory
						);
					} else {
						$tmp = new $autoloader(
							$configuration[$key],
							$this->baseDirectory
						);
					}

					$this->registerLoadedModule($key);
				}
			}
		}
	}

	private function hasModuleBeenLoaded($name)
	{
		if ($this->namespace) {
			return array_key_exists($this->namespace . ':' . $name, self::$loadedModules);
		} else {
			return array_key_exists($name, self::$loadedModules);
		}
	}

	private function registerLoadedModule($name)
	{
		if ($this->namespace) {
			self::$loadedModules[$this->namespace . ':' . $name] = $name;
		} else {
			self::$loadedModules[$name] = $name;
		}
	}
}
