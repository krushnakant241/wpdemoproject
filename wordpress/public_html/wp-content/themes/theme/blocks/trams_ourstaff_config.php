<?php

return [
	'fields' => [
		[
			'key' => 'trams_our_staff_title',
			'label' => 'Our Staff Title',
			'name' => 'our_staff_title',
			'type' => 'text',
		],
		[
			'key' => 'trams_our_staff_block',
			'label' => 'Our Staff Content Box',
			'name' => 'our_staff_repeater',
			'type' => 'repeater',
			'layout'       => 'block',
			'button_label' => '',
			'sub_fields'   => [
						[
							'key' => 'our_staff_image',
							'label' => 'Add Staff Image',
							'name' => 'staff_image',
							'type' => 'image',
						],
						[
							'key' => 'our_staff_block_title',
							'label' => 'Add Staff Title',
							'name' => 'staff_title',
							'type' => 'text',
						],
						[
							'key' => 'our_staff_block_description',
							'label' => 'Add Staff Description',
							'name' => 'staff_description',
							'type' => 'textarea',
						],
					],
		],
	],
];
