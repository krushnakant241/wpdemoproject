<?php

return [
	'fields' => [
		[
			'key' => 'trams_collaborative_title',
			'label' => 'Add Title',
			'name' => 'collaborative_title',
			'type' => 'text',
		],
		[
			'key' => 'trams_collaborative_editor_top',
			'label' => 'Add Content For Top',
			'name' => 'collaborative_content_top',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'trams_collaborative_image',
			'label' => 'Add Logo',
			'name' => 'collaborative_image',
			'type' => 'image',
		],
		[
			'key' => 'trams_collaborative_repeater',
			'label' => 'Add Key Points',
			'name' => 'collaborative_repeater',
			'type' => 'repeater',
			'layout'       => 'block',
			'button_label' => '',
			'sub_fields'   => [
						[
							'key' => 'collaborative_block_image',
							'label' => 'Add Image',
							'name' => 'block_image',
							'type' => 'image',
						],
						[
							'key' => 'collaborative_block_title',
							'label' => 'Add Title',
							'name' => 'block_title',
							'type' => 'text',
						],
						[
							'key' => 'collaborative_block_description',
							'label' => 'Add Description',
							'name' => 'block_description',
							'type' => 'textarea',
						],
					],
		],
		[
			'key' => 'trams_collaborative_editor_bottom',
			'label' => 'Add Content For Bottom',
			'name' => 'collaborative_content_bottom',
			'type' => 'wysiwyg',
		]
	],
];
