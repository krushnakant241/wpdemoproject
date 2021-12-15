<?php

/**
 * example.php
 * 
 * This block shows most common ACF block features and provides a simple template for usage.
 * 
 * Styles: add into /theme/src/scss/blocks/ folder with the same name as the block e.g. example.scss
 * Scripts: add into /theme/src/js/blocks/ folder with the same name as the block e.g. example.js
 */

return [
	'fields' => [
		[
			'key' => 'action_title',
			'label' => 'Action Bar Title',
			'name' => 'action_title',
			'type' => 'text',
		],
		[
			'key' => 'action_content',
			'label' => 'Action Bar Content',
			'name' => 'action_content',
			'type' => 'textarea',
		],
		[
			'key' => 'action_link',
			'label' => 'Action Bar Link',
			'name' => 'action_link',
			'type' => 'link',
		],
	],
];