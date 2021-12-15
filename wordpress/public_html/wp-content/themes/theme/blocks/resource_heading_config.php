<?php
return [
	
	'fields' => [
		[
			'key'          => 'resource_title',
			'label'        => 'Title',
			'name'         => 'resource_block_title',
			'type'         => 'text'
		],
		[
			'key'          => 'resource_heading_content',
			'label'        => 'Resource Content Box',
			'name'         => 'resource_heading_content_repeater',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add new resource',
			'sub_fields'   => [
			
				[
					'key'   => 'resource_image_block',
					'label' => 'Resource Image',
					'name'  => 'resource_image',
					'type'  => 'image'
				],
				
				[
					'key'   => 'resource_content_block',
					'label' => 'Content',
					'name'  => 'resource_content',
					'type'  => 'text'
				]
			]
		],
		[
			'key' => 'resource_heading_css_class',
			'name' => 'resource_heading_css_class',
			'label' => 'Add Class',
			'type' => 'text',
			'placeholder' => 'Add Custom Class For CSS'
		]
	],
	
];
