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
			'key' => 'trams_feature_grid_title',
			'label' => 'Feature Grid Title',
			'name' => 'feature_grid_title',
			'type' => 'text',
		],

		[
			'key' => 'trams_feature_grid_repeater',
			'label' => 'Feature Grid Content Box',
			'name' => 'feature_grid_field_repeater',
			'type' => 'repeater',
			'layout'       => 'block',
			'button_label' => '',
			'sub_fields'   => [
						[
							'key' => 'feature_block_image',
							'label' => 'Add Feature Image',
							'name' => 'feature_image',
							'type' => 'image',
						],
						[
							'key' => 'feature_block_title',
							'label' => 'Add Feature Title',
							'name' => 'feature_title',
							'type' => 'text',
						],
						[
							'key' => 'feature_block_description',
							'label' => 'Add Feature Description',
							'name' => 'feature_description',
							'type' => 'wysiwyg',
						],
					],
		],
		[
			'key' => 'trams_feature_grid_align',
			'label' => 'Content Alignment',
			'name' => 'content_alignment',
			'type' => 'radio',
			'choices' => array(
					'left' => 'Left',
					'center' => 'Center'
				)
		],
		[
			'key' => 'trams_feature_grid_bg',
			'label' => 'Background Color',
			'name' => 'feature_grid_bg_color',
			'type' => 'text',
			'placeholder' => '#______'
		],
		[
			'key' => 'trams_feature_grid_url',
			'label' => 'Add Feature Url',
			'name' => 'feature_grid_url',
			'type' => 'link',
		]
	]
];
