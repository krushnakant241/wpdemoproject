<?php

return [
	'fields' => [
		[
			'key' => 'trams_pagerheader_title',
			'label' => 'Pager Title',
			'name' => 'pagerheader_title',
			'type' => 'text',
		],
		[
			'key' => 'trams_pagerheader_subtitle',
			'label' => 'Pager Sub Title',
			'name' => 'pagerheader_subtitle',
			'type' => 'text',
		],
		
		[
			'key' => 'trams_pagerheader_textarea',
			'label' => 'Pager Description',
			'name' => 'pagerheader_textarea',
			'type' => 'textarea',
		],
		[
			'key' => 'trams_pagerheader_text_color',
			'label' => 'Description Text Color',
			'name' => 'pagerheader_text_color',
			'type' => 'radio',
			'choices' => array(
				'black' => 'Black',
				'white' => 'White'
			)
		],
		[
		'key' => 'trams_pagerheader_img',
		'label' => 'Background Image',
		'name' => 'pagerheader_img',
		'type' => 'image',
		],
		[
		'key' => 'trams_pagerheader_mobile_image',
		'label' => 'Background Image For Mobile',
		'name' => 'pagerheader_mobile_img',
		'type' => 'image',
		],
	],
];
