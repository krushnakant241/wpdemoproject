<?php
return [
	'fields' => [

		[
			'key' => 'trams_highlightbar_title',
			'label' => 'Add Highlight Content',
			'name' => 'highlightbar_title',
			'type' => 'textarea',
		],
		[
			'key' => 'trams_highlightbar_expand',
			'label' => 'Expanded Version',
			'name' => 'highlightbar_expand',
			'type' => 'checkbox',
			'choices' => array(
				'yes' => 'Yes',
			
			)
		],
		[
			'key' => 'trams_highlightbar_writing_by',
			'label' => 'Author name',
			'name' => 'highlightbar_author_name',
			'type' => 'text',
		],
		[
			'key' => 'trams_highlightbar_link',
			'label' => 'Highlight CTA Link',
			'name' => 'highlightbar_link',
			'type' => 'link',
		]
	],
];
