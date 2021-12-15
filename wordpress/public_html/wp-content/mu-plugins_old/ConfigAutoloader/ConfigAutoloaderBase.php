<?php

/**
 * Fields Configuration
 * Looks into the theme's `fields` directory for a config file, which it
 * expects to list the various Fields features the theme wants to activate.
 * This includes Fields Fields (TODO) and Settings Pages.
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ConfigAutoloaderBase
{
	protected $baseDirectory;

	public function __construct($config, $baseDirectory)
	{
		$this->baseDirectory = $baseDirectory;

		if (!empty($config)) {
			$this->include($config);
		}
	}

	/**
	 * include this configuration set in the website. Essentially, take the
	 * config array passed and "do something" with it.
	 * Stub method, expected to be implemented by sub-classes who know what "do
	 * something" means.
	 */
	public function include($config, $args = false)
	{
	}

	public function isRemote($src)
	{
		return (substr($src, 0, 4) === 'http' || substr($src, 0, 2) === '//');
	}

	public function importAcfFields($config, $typeAssign, $typeId, $typePrefix = "")
	{
		if (isset($config['@fields'])) {
			foreach ($config['@fields'] as $groupIndex => $group) {
				$group_data = array();

				// extract the group data. It is either passed in directly, or it's
				// the name of a `fields` file that contains the definition
				if (is_array($group)) {
					$group_data = $group;
				} else {
					$file = $this->baseDirectory . 'src/fields/' . strval($group) . '.php';

					if (file_exists($file)) {
						$group_data = include $file;
					} else {
						trigger_error(
							'ConfigAutoloaderBase: Unknown fields: "' .
								htmlentities($group) . '". (Could not locate file "' .
								$file . '")',
							E_USER_WARNING
						);
					}
				}

				// merge defaults, assign to block type
				$group_data = array_merge(
					array('location' => array(array($typeAssign))),
					$group_data
				);

				if (!isset($group_data['title'])) throw new Error("missing group title");
				if (!isset($group_data['key'])) {
					$_groupKey = "group_" . $typePrefix . acf_slugify(isset($group['name']) ? $group['name'] : $group['title']) . "-" . $groupIndex;
					$group_data['key'] = $_groupKey;
				};
				foreach ($group_data['fields'] as $fieldIndex => $field) {
					// $typeId."_".
					$_fieldName = (isset($field['name']) ? $field['name'] : acf_slugify($field['label']));
					if (!isset($field['name'])) {
						$group_data['fields'][$fieldIndex]['name'] = $_fieldName;
					};
					if (!isset($field['key'])) {
						$_fieldKey = "field_" . $_fieldName . "-" . $groupIndex;
						$group_data['fields'][$fieldIndex]['key'] = $_fieldKey;
					};
					if (isset($field['sub_fields'])) {
						foreach ($field['sub_fields'] as $subFieldIndex => $subField) {
							// $typeId."_".
							$_subFieldName = (isset($subField['name']) ? $subField['name'] : acf_slugify($subField['label']));
							if (!isset($subField['name'])) {
								$group_data['fields'][$fieldIndex]['sub_fields'][$subFieldIndex]['name'] = $_subFieldName;
							};
							if (!isset($subField['key'])) {
								$_subFieldKey = "field_" . $_subFieldName . "-" . $groupIndex;
								$group_data['fields'][$fieldIndex]['sub_fields'][$subFieldIndex]['key'] = $_subFieldKey;
							};
						}
					}
				}
				acf_add_local_field_group($group_data);
			};
		}
	}

	public function importAcfOptions($config, $parent = false)
	{
		if (isset($config['@options'])) {

			foreach ($config['@options'] as $pageIndex => $page) {



				if (!isset($parent)) {

					// $defaults = [
					//   'page_title'    => 'Settings',
					//   'menu_title'    => 'Settings',
					//   // 'menu_slug'     => 'settings',
					//   'icon_url' => 'dashicons-forms',
					//   // 'capability'    => 'edit_posts',
					//   // 'parent_slug' => "edit.php?post_type={$typeId}",
					//   // 'autoload' => true,
					// ];

					// $options_data = array_merge($defaults, $page);

					// acf_add_options_page($options_data);

				} else {
					$options_data = array_merge($page, array(
						'parent_slug' => $parent['menu_slug']
					));

					$childOption = acf_add_options_sub_page($options_data);
				};
			}
		}
	}

	public function importDependencies($config)
	{
		if (isset($config['@scripts'])) {

			require_once __DIR__ . '/ConfigAutoloaderScripts.php';

			new ConfigAutoloaderScripts($config['@scripts'], true);
		};
		if (isset($config['@styles'])) {

			require_once __DIR__ . '/ConfigAutoloaderStyles.php';

			new ConfigAutoloaderStyles($config['@styles'], true);
		};
	}
}
