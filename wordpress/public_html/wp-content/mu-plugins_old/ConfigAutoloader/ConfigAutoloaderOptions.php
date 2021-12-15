<?php

/**
 * Fields Configuration
 * Looks into the theme's `fields` directory for a config file, which it
 * expects to list the various Fields features the theme wants to activate.
 * This includes Fields Fields (TODO) and Settings Pages.
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

require_once __DIR__ . '/ConfigAutoloaderBase.php';

class ConfigAutoloaderOptions extends ConfigAutoloaderBase
{
	public function include($configArray, $args = false)
	{
		if (empty($configArray)) return;

		// skip processing if the ACF plugin isn't activated.
		if (!function_exists('acf_add_options_page')) {
			return;
		}

		$defaults = [
			'page_title'    => 'Options',
			'menu_title'    => 'Options',
			'icon_url' => 'dashicons-forms',
			'capability'    => 'edit_posts',
			'autoload' => true
		];

		$optionsDirectory = $this->baseDirectory . 'src/options/';

		foreach ($configArray as $optionsId) {
			$optionFile = $optionsDirectory . $optionsId . '.php';
			$config = null;

			if (file_exists($optionFile)) {
				$config = include $optionFile;
			} else {
				trigger_error(
					'ConfigAutoloaderOptions: Unknown option: "' .
						htmlentities($optionsId) . '". (Could not locate file "' .
						$optionFile . '")',
					E_USER_WARNING
				);

				continue;
			}

			$options_data = array_merge($defaults, $config);

			$options_data['redirect'] = false;

			$parentPage = acf_add_options_page($options_data);

			$this->importAcfFields($options_data, array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => $parentPage['menu_slug'],
			), $parentPage['menu_slug']);

			if (isset($options_data['@options'])) {

				foreach ($options_data['@options'] as $pageIndex => $subpage) {

					$sub_options_data = array_merge($subpage, array(
						'parent_slug' => $parentPage['menu_slug']
					));

					$childPage = acf_add_options_sub_page($sub_options_data);

					$this->importAcfFields($sub_options_data, array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => $childPage['menu_slug'],
					), $childPage['menu_slug']);
				}
			}
		}
	}
}
