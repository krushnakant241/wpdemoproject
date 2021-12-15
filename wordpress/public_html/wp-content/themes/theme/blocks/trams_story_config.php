<?php

return [
	'fields' => [
		[
			'key' => 'trams_story_section',
			'label' => 'Trams Story',
			'name' => 'story_section',
			'type'         => 'repeater',
			'layout'       => 'block',	
			'button_label' => 'Add Story',
			'sub_fields'   => [
							[
								'key' => 'trams_story_heading',
								'label' => 'Heading',
								'name' => 'story_heading',
								'type' => 'text',
							],
							[
								'key' => 'trams_story_image',
								'label' => 'Background Image',
								'name' => 'story_image',
								'type' => 'image',
							],
							[
								'key' => 'trams_story_content',
								'label' => 'Content',
								'name' => 'story_content',
								'type' => 'textarea',
							],
							[
								'key' => 'trams_story_url',
								'label' => 'Story Url(CTA)',
								'name' => 'story_url',
								'type' => 'link',
							],
							[
								'key' => 'trams_story_links',
								'label' => 'Add Story links',
								'name' => 'story_link_section',
								'type'         => 'repeater',
								'layout'       => 'block',	
								'button_label' => 'Add Link',
								'sub_fields'   => [
													[
														'key' => 'trams_story_link',
														'label' => 'Story link',
														'name' => 'story_link',
														'type' => 'link',
													],
												],
							],
			],
		],
	],
];
