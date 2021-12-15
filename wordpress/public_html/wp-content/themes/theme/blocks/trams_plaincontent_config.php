<?php

return [
	'fields' => [
		[
			'key' => 'trams_plain_content_size',
			'label' => 'Plain Content Size Option',
			'name' => 'plain_content_size',
			'type' => 'radio',
			'choices' => array(
				'full' => 'Full',
				'one_third' => 'One Third',
				'two_third' => 'Two Third',
				'one_half' => 'One Half',
				'half' => 'Half Half Version',

				)
		],
		[
			'key' => 'trams_plain_content_title',
			'label' => 'Add Plain Content Heading',
			'name' => 'plain_content_title',
			'type' => 'text',
		],
		[
			'key' => 'trams_plain_content',
			'label' => 'Plain Content',
			'name' => 'plain_content',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'trams_plain_content_half_version',
			'label' => 'Add Content with Image, Title and Text in Second Half',
			'name' => 'plain_content_half_version',
			'type' => 'wysiwyg',
		],
		[
			'key' => 'trams_plain_content_cta',
			'label' => 'CTA button',
			'name' => 'plain_content_cta',
			'type' => 'link',
		],
		[
			'key' => 'trams_plain_content_img',
			'label' => 'Upload Image',
			'name' => 'plain_content_img',
			'type' => 'image',
			'return_format' =>'array',
			'preview_size' => 'medium'
		],
		[
			'key' => 'trams_plain_content_img_align',
			'label' => 'Image Alignment - Left/Right',
			'name' => 'plain_content_img_align',
			'type' => 'radio',
			'choices' => array(
				'right' => 'Right',
				'left' => 'Left'
				
			)
		],
		[
			'key' => 'trams_plain_content_css_class',
			'name' => 'plain_content_css_class',
			'label' => 'Add Class',
			'type' => 'text',
			'placeholder' => 'Add Custom Class For CSS'
		],
		[
			'key' => 'trams_plain_content_bgcolor',
			'name' => 'plain_content_bgcolor',
			'label' => 'Add background color',
			'type' => 'text',
			'placeholder' => '#______'
		],
		[
			'key' => 'trams_plain_content_padding',
			'name' => 'plain_content_padding',
			'label' => 'Add Padding',
			'type' => 'text',
			'placeholder' => 'Add Padding Css',
			'instructions' => 'Please add css in (top right bottom left) "0px 0px 0px 0px" formate'
		],
		[
			'key' => 'trams_plain_content_border',
			'name' => 'plain_content_border',
			'label' => 'Add Border',
			'type' => 'text',
			'placeholder' => 'Add Border Css'
		],
	],
];
