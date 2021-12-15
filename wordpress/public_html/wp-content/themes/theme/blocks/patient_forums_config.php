<?php


return [
	'fields' => [
		[
			'key' => 'trams_patient_forum_heading',
			'label' => 'Add Title',
			'name' => 'patient_forum_heading',
			'type' => 'text',
		
		],
		[
			'key' => 'trams_patient_forum_large_img',
			'label' => 'Upload Section Banner Image',
			'name' => 'patient_forum_large_img',
			'type' => 'image',
			'return_format' =>'array',
			'preview_size' => 'medium',
			'mime_type'=>'png,jpg,'
		],
		[
			'key' => 'trams_patient_forum_description',
			'label' => 'Add Description',
			'name' => 'patient_forum_description',
			'type' => 'textarea',
		
		],
		[
			'key' => 'trams_patient_forum_repeater_title',
			'label' => 'Add Forum Content Title',
			'name' => 'patient_forum_repeater_title',
			'type' => 'text',
		
		],
		[
			'key' => 'trams_patient_forum_content_box',
			'label' => 'Add Forum Content',
			'name' => 'patient_forum_content_box',
			'type' => 'repeater',
			'layout'       => 'block',
			'sub_fields'   => [
					[
						'key' => 'trams_patient_forum_content_box_img',
						'label' => 'Upload Image',
						'name' => 'content_box_img',
						'type' => 'image',
						'return_format' =>'array',
						'preview_size' => 'medium',
						'mime_type'=>'png,jpg,'
					],
					[
						'key' => 'trams_patient_forum_content_box_content',
						'label' => 'Add Content',
						'name' => 'content_box_content',
						'type' => 'wysiwyg',
						
					],
					[
						'key' => 'trams_patient_forum_content_box_link',
						'label' => 'Add Link',
						'name' => 'content_box_link',
						'type' => 'link',
						
					],
				
			],
		],
		[
			'key' => 'trams_patient_forum_mailing_list',
			'label' => 'Add Mailing List Nots',
			'name' => 'forum_mailing_list',
			'type' => 'wysiwyg',
		
		],
		[
			'key' => 'trams_patient_forum_other_website_title',
			'label' => 'Add Other Website Section Title',
			'name' => 'other_website_title',
			'type' => 'text',
		
		],
		[
			'key' => 'trams_patient_forum_other_website_box',
			'label' => 'Add Other Website Section Links',
			'name' => 'patient_forum_other_website_box',
			'type' => 'repeater',
			'layout'       => 'block',
			'sub_fields'   => [
					[
						'key' => 'trams_patient_forum_content_box_link',
						'label' => 'Add Link',
						'name' => 'content_box_link',
						'type' => 'link',
						
					],
				
			],
		],



		
	],
];
