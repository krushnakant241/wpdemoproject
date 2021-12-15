<?php

return [
	'fields' => [
		[
			'key' => 'trams_feature_title',
			'name' => 'feature_content_heading',
			'label' => 'Feature Heading',
			'type' => 'text',
		],
		[
			'key' => 'trams_feature_content_header',
			'name' => 'feature_content_header',
			'label' => 'Require header?',
			'type' => 'radio',
			'choices' => array(
				'No'	=> 'No',
				'Yes'	=> 'Yes',
			
			),
		],
		[
			'key' => 'trams_feature_content',
			'name' => 'feature_content',
			'label' => 'Feature Content',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'trams_feature_content_size',
			'name' => 'feature_content_size',
			'label' => 'Content size',
			'type' => 'radio',
			'choices' => array(
				'one_third'	=> 'One Third',
				'two_third'	=> 'Two Third',
				'half'	=> 'Half'
			),
		],
		[
			'key' => 'trams_feature_content_aligntment',
			'name' => 'feature_content_aligntment',
			'label' => 'Require Content Left/Right',
			'type' => 'radio',
			'choices' => array(
				'left'	=> 'Left',
				'right'	=> 'Right',
			
			),
		],
		[
			'key' => 'trams_feature_content_url',
			'name' => 'feature_content_url',
			'label' => 'CTA URL',
			'type' => 'link',
		],
		[
			'key' => 'trams_feature_content_bg_require',
			'name' => 'feature_content_bg_require',
			'label' => 'Require Header Image?',
			'type' => 'radio',
			'choices' => array(
				'No'	=> 'No',
				'Yes'	=> 'Yes',
			
			),
		],
		[
			'key' => 'trams_feature_content_bg_color',
			'name' => 'feature_content_bg_color',
			'label' => 'Add background color',
			'type' => 'text',
			'placeholder' => '#______'
		],
		[
			'key' => 'trams_feature_content_bg',
			'name' => 'feature_content_bg',
			'label' => 'Upload Image',
			'type' => 'image',
			'return_format' =>'array',
			'preview_size' => 'medium',
			'mime_types'    => 'jpg, jpeg, png',
		],
		[
			'key' => 'trams_feature_content_mobile_bg',
			'name' => 'feature_content_mobile_bg',
			'label' => 'Upload Image For Mobile',
			'type' => 'image',
			'return_format' =>'array',
			'preview_size' => 'medium',
			'mime_types'    => 'jpg, jpeg, png',
		],
		[
			'key' => 'trams_feature_content_img_position',
			'name' => 'feature_content_img_position',
			'label' => 'Image Foreground on Left/Right',
			'type' => 'radio',
			'choices' => array(
				'left'	=> 'Left',
				'right'	=> 'Right',
			
			),
		],

		[
			'key' => 'trams_feature_content_bg_option',
			'name' => 'feature_content_bg_option',
			'label' => 'Background Image display as - Left/Right OR Full',
			'type' => 'radio',
			'choices' => array(
				'left'	=> 'Left',
				'right'	=> 'Right',
				'full'	=> 'Full'
			),
		],
	


	],
];
