<?php

return [
	'fields' => [
		[
			'key' => 'frequentlyasked_questions_title',
			'label' => 'FAQ Title',
			'name' => 'faq_title',
			'type' => 'text',
		],
		[
			'key' => 'trams_faq_question_',
			'label' => 'Add Frequently Asked Questions',
			'name' => 'trams_faq_question_row',
			'type' => 'repeater',
			'layout'       => 'block',
			'button_label' => 'Add New FAQ',
			'sub_fields'   => [
						[
							'key' => 'trams_faq_question',
							'label' => 'Question',
							'name' => 'faq_question',
							'type' => 'text',
						],
						[
							'key' => 'trams_faq_answer',
							'label' => 'Answer',
							'name' => 'faq_answer',
							'type' => 'textarea',
						],
					],
		],
		
		[
			'key' => 'trams_faq_button',
			'label' => 'CTA Button',
			'name' => 'faq_button',
			'type' => 'link',
		]
	],
];
