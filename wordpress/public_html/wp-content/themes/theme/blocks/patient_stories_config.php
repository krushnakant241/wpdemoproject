<?php

return [
	'fields' => [
		
							[
								'key' => 'trams_patient_stories_heading',
								'label' => 'Patient Block Heading',
								'name' => 'patient_stories_heading',
								'type' => 'text',
							],
							[
								'key' => 'trams_patient_stories_image',
								'label' => 'Background Image',
								'name' => 'patient_stories_image',
								'type' => 'image',
							],
							[
								'key' => 'trams_patient_stories_title',
								'label' => 'Story Title',
								'name' => 'patient_stories_title',
								'type' => 'text',
							],
							
							[
								'key' => 'trams_patient_stories_content',
								'label' => 'Add Content',
								'name' => 'patient_stories_content',
								'type' => 'textarea',
							],
							[
								'key' => 'trams_patient_stories_url',
								'label' => 'Story Url(CTA)',
								'name' => 'patient_stories_url',
								'type' => 'link',
							],
							[
								'key' => 'trams_patient_stories_links',
								'label' => 'Add Story links',
								'name' => 'patient_stories_links',
								'type'         => 'repeater',
								'layout'       => 'block',	
								'button_label' => 'Add Link',
								'sub_fields'   => [
													[
														'key' => 'trams_story_link',
														'label' => 'Story link',
														'name' => 'stories_links',
														'type' => 'link',
													],
												],
							],
							[
								'key' => 'trams_patient_stories_page_link',
								'label' => 'All Patient Story link',
								'name' => 'patient_stories_page_link',
								'type' => 'link',
							],
			
		],
	
];
