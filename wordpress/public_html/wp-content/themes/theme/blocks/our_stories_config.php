<?php


return [
	'fields' => [

		[
			'key' => 'our_story',
			'label' => 'Add Storys',
			'name' => 'our_story_section',
			'type'         => 'repeater',
			'layout'       => 'block',	
			'button_label' => 'New Story',
			'sub_fields'   => [

						[
						'key' => 'our_story_title',
						'label' => 'Add Story Title',
						'name' => 'story_title',
						'type' => 'text',
						],
						[
							'key' => 'our_story_content',
							'label' => 'Add Story Content',
							'name' => 'story_content',
							'type' => 'textarea',
						],
						[
							'key' => 'our_story_description',
							'label' => 'Add Story Description',
							'name' => 'story_description',
							'type' => 'wysiwyg',
						],
						[
							'key' => 'our_story_video',
							'label' => 'Add Story Video',
							'name' => 'story_video',
							'type' => 'link',
						],
						[
							'key' => 'our_story_links',
							'label' => 'Add Story links',
							'name' => 'our_story_link_section',
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
						
						[
							'key' => 'our_story_image',
							'label' => 'Add Story Image',
							'name' => 'story_image',
							'type' => 'image',
						],
						[
							'key' => 'our_story_show_video',
							'label' => 'Show Video?',
							'name' => 'story_show_video',
							'type' => 'checkbox',
							'choices' => array(
								'yes' => 'Yes',
							)
						],
						[
							'key' => 'our_story_embed_video',
							'label' => 'Add Video Embed code',
							'name' => 'story_embed_video',
							'type' => 'textarea',
						]

			],
		],	
	],
];
