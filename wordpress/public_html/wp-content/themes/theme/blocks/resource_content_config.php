<?php
return [
	
	'fields' => [

		[
			'key'   => 'resource_content_block_heading',
			'label' => 'Resource Content Heading',
			'name'  => 'resource_content_heading',
			'type'  => 'text'
		],	
		[
			'key'          => 'resource_content_block_content',
			'label'        => 'Resource Content Box',
			'name'         => 'resource_content_block_repeater',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add new resource',
			'sub_fields'   => [
			
				[
					'key'   => 'resource_content_image_block',
					'label' => 'Resource Content Image',
					'name'  => 'resource_content_image',
					'type'  => 'image'
				],	
				[
					'key'   => 'resource_content_text_block',
					'label' => 'Resource Content Title',
					'name'  => 'resource_content_text',
					'type'  => 'text'
				],
				[
					'key'   => 'resource_content_description_block',
					'label' => 'Description',
					'name'  => 'resource_content_description',
					'type'  => 'wysiwyg'
				],
			]
		],
		[
			'key'          => 'resource_content_block_two_column',
			'label'        => 'Resource Two Column Box',
			'name'         => 'rcontent_two_column',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add new resource',
			'sub_fields'   => [
			
				[
					'key'   => 'resource_content_2column_img',
					'label' => 'Resource Content Image',
					'name'  => 'rc_image_2column',
					'type'  => 'image'
				],	
				[
					'key'   => 'resource_content_2column_title',
					'label' => 'Resource Content Heading',
					'name'  => 'rc_2column_heading',
					'type'  => 'text'
				],
				[
					'key'   => 'rcontent_2column_left_title',
					'label' => 'Resource Left Column Title',
					'name'  => 'rc_2column_left_title',
					'type'  => 'text'
				],
				[
					'key'   => 'rcontent_2column_left_content',
					'label' => 'Resource Left Column',
					'name'  => 'rc_2column_left_Content',
					'type'  => 'wysiwyg'
				],
					[
					'key'   => 'rcontent_2column_right_title',
					'label' => 'Resource Right Column Title',
					'name'  => 'rc_2column_right_title',
					'type'  => 'text'
				],
				[
					'key'   => 'rcontent_2column_right_content',
					'label' => 'Resource Right Column',
					'name'  => 'rc_2column_right_Content',
					'type'  => 'wysiwyg'
				],
			]
		],
		[
			'key' => 'resource_content_css_class',
			'name' => 'resource_content_css_class',
			'label' => 'Add Class',
			'type' => 'text',
			'placeholder' => 'Add Custom Class For CSS'
		]
	],
	
];
