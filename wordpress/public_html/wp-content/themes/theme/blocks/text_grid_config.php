<?php
return [
	
	'fields' => [
		[
			'key'          => 'text_grid_title',
			'label'        => 'Title',
			'name'         => 'text_grid_block_title',
			'type'         => 'text'
		],
		[
			'key'          => 'text_grid_description',
			'label'        => 'Add Description',
			'name'         => 'text_grid_block_description',
			'type'         => 'textarea'
		],
		[
			'key'          => 'text_grid_block',
			'label'        => 'Text Grid Block Content',
			'name'         => 'text_grid_block_repeater',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => '',
			'sub_fields'   => [
			
				[
					'key'   => 'text_grid_block_link',
					'label' => 'Service Link',
					'name'  => 'text_grid_link',
					'type'  => 'link'
				],
				
				[
					'key'   => 'text_grid_block_textarea',
					'label' => 'Description',
					'name'  => 'text_grid_textarea',
					'type'  => 'textarea'
				]
			]
		]
	],
	
];
