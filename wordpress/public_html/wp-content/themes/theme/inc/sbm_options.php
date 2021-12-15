<?php
if (!defined('ABSPATH')) exit;

/**
 * Description: A collection of common site options used on every SBM theme build
 */

/**
 * Register the standard WordPress theme options SBM uses
 */
function sbm_register_theme_options()
{
	if (!function_exists('acf_add_options_page')) {
		return;
	}

	$theme_options = [
		'page_title'    => 'SBM Theme Options',
		'menu_title'    => 'Options',
		'menu_slug' => 'sbm_theme_options',
		'icon_url' => 'dashicons-forms',
		'capability'    => 'edit_posts',
		'autoload' => true,
	];

	acf_add_options_page($theme_options);

	// Build our contact options

	$general_options = [
		'page_title'  => 'General Options',
		'menu_title'  => 'General',
		'menu_slug' => 'sbm_theme_options_general',
		'icon_url' => 'dashicons-forms',
		'parent_slug' => 'sbm_theme_options',
	];

	$header_options = [
		'page_title'  => 'Header Options',
		'menu_title'  => 'Header',
		'menu_slug' => 'sbm_theme_options_header',
		'icon_url' => 'dashicons-forms',
		'parent_slug' => 'sbm_theme_options',
	];

	$footer_options = [
		'page_title'  => 'Footer Options',
		'menu_title'  => 'Footer',
		'menu_slug' => 'sbm_theme_options_footer_section',
		'icon_url' => 'dashicons-forms',
		'parent_slug' => 'sbm_theme_options',
	];



	$contact_options = [
		'page_title'  => 'Contact Options',
		'menu_title'  => 'Contacts',
		'menu_slug' => 'sbm_theme_options_contact',
		'icon_url' => 'dashicons-forms',
		'parent_slug' => 'sbm_theme_options',
	];

	// Build our embed options
	$embed_options = [
		'page_title'  => 'Global Embeds',
		'menu_title'  => 'Embeds',
		'menu_slug' => 'sbm_theme_options_embed',
		'icon_url' => 'dashicons-forms',
		'parent_slug' => 'sbm_theme_options',
	];

	$general_options = acf_add_options_sub_page($general_options);
	$header_options = acf_add_options_sub_page($header_options);
	$footer_options = acf_add_options_sub_page($footer_options);
	$contact_options = acf_add_options_sub_page($contact_options);
	$embed_options = acf_add_options_sub_page($embed_options);

	// Build our contact options fields
	
	$general_options_field_group = [

		'title' => 'General Logo',
		'fields' => [
			[
				'key' => 'sbm_theme_options_home_news_events_tab',
				'name' => 'sbm_theme_options_home_news_events_tab',
				'label' => 'Home Page',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_news_events_title1',
				'name' => 'sbm_theme_options_news_events_title1',
				'label' => 'Add Title',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_news_events_url1',
				'name' => 'sbm_theme_options_news_events_url1',
				'label' => 'Add Url',
				'type' => 'link',
			],

			[
				'key' => 'sbm_theme_options_healthcare_news_events_tab',
				'name' => 'sbm_theme_options_healthcare_news_events_tab',
				'label' => 'For Healthcare Providers Page',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_news_events_title2',
				'name' => 'sbm_theme_options_news_events_title2',
				'label' => 'Add Title',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_news_events_url2',
				'name' => 'sbm_theme_options_news_events_url2',
				'label' => 'Add Url',
				'type' => 'link',
			],
			
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'sbm_theme_options_general',
				]
			]
		]
	];


	$header_options_field_group = [

		'title' => 'Header Logo',
		'fields' => [
			[
				'key' => 'sbm_theme_options_header_logo',
				'name' => 'sbm_theme_options_header_logo',
				'label' => 'Upload Header Logo',
				'type' => 'image',
				'return_format' => 'url',
				'preview_size' => 'medium',
				
			],
			
		

		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'sbm_theme_options_header',
				]
			]
		]
	];

	$footer_options_field_group = [

		'title' => 'Footer Sections',
		'fields' => [
			[
				'key' => 'sbm_theme_options_footer_block_1',
				'name' => 'sbm_theme_options_footer_block_1',
				'label' => 'Footer Block 1',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_footer1_title1',
				'name' => 'sbm_theme_options_footer1_title1',
				'label' => 'Add Title',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer1_detail1',
				'name' => 'sbm_theme_options_footer1_detail1',
				'label' => 'Add Content',
				'type' => 'textarea',
			],
			[
				'key' => 'sbm_theme_options_footer1_title2',
				'name' => 'sbm_theme_options_footer1_title2',
				'label' => 'Add Title',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer1_detail2',
				'name' => 'sbm_theme_options_footer1_detail2',
				'label' => 'Add Content',
				'type' => 'textarea',
			],
		
			[
				'key' => 'sbm_theme_options_footer_block_2',
				'name' => 'sbm_theme_options_footer_block_2',
				'label' => 'Footer Block 2',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_footer2_title1',
				'name' => 'sbm_theme_options_footer2_title1',
				'label' => 'Add Title',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer2_phone',
				'name' => 'sbm_theme_options_footer2_phone',
				'label' => 'Phone',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer2_fax',
				'name' => 'sbm_theme_options_footer2_fax',
				'label' => 'Fax',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer2_email',
				'name' => 'sbm_theme_options_footer2_email',
				'label' => 'Email',
				'type' => 'text',
			],
		
			[
				'key' => 'sbm_theme_options_footer2_fb',
				'name' => 'sbm_theme_options_footer2_fb',
				'label' => 'Facebook Page',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer2_fb_link',
				'name' => 'sbm_theme_options_footer2_fb_link',
				'label' => 'Facebook Link',
				'type' => 'url',
			],
			[
				'key' => 'sbm_theme_options_footer2_twitter',
				'name' => 'sbm_theme_options_footer2_twitter',
				'label' => 'Twitter Page',
				'type' => 'text',
			],
				[
				'key' => 'sbm_theme_options_footer2_twitter_link',
				'name' => 'sbm_theme_options_footer2_twitter_link',
				'label' => 'Twitter Link',
				'type' => 'url',
			],
			[
				'key' => 'sbm_theme_options_footer_block_3',
				'name' => 'sbm_theme_options_footer_block_3',
				'label' => 'Footer Block 3',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_footer3_title1',
				'name' => 'sbm_theme_options_footer3_title1',
				'label' => 'Add Title',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_footer_qlinks',
				'name' => 'sbm_theme_options_footer_qlinks',
				'label' => 'Quick Links',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'sbm_theme_options_q_link',
						'name' => 'sbm_theme_options_q_link',
						'label' => 'Add Link',
						'type' => 'link',
						
					],
				],
			],
			[
				'key' => 'sbm_theme_options_footer_block_4',
				'name' => 'sbm_theme_options_footer_block_4',
				'label' => 'Footer Block 4',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_footer4_twitter',
				'name' => 'sbm_theme_options_footer4_twitter',
				'label' => 'Twitter URL',
				'type' => 'url',
			],
			[
				'key' => 'sbm_theme_options_footer4_fb',
				'name' => 'sbm_theme_options_footer4_fb',
				'label' => 'Facebook URL',
				'type' => 'url',
			],
			[
				'key' => 'sbm_theme_options_footer4_utube',
				'name' => 'sbm_theme_options_footer4_utube',
				'label' => 'Youtube URL',
				'type' => 'url',
			],
			[
				'key' => 'sbm_theme_options_footer4_image1',
				'name' => 'sbm_theme_options_footer4_image1',
				'label' => 'Upload Logo',
				'type' => 'image',
				'return_format' => 'url',
				'preview_size' => 'medium'
			],
			[
				'key' => 'sbm_theme_options_footer4_image2',
				'name' => 'sbm_theme_options_footer4_image2',
				'label' => 'Upload Logo',
				'type' => 'image',
				'return_format' => 'url',
				'preview_size' => 'medium'
			],
			[
				'key' => 'sbm_theme_options_footer_bottom',
				'name' => 'sbm_theme_options_footer_bottom',
				'label' => 'Footer Bottom',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_footer_copyright',
				'name' => 'sbm_theme_options_footer_copyright',
				'label' => 'Add Content',
				'type' => 'text',
			],
			

		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'sbm_theme_options_footer_section',
				]
			]
		]
	];




	$contact_options_field_group = [

		'title' => 'Global Contact Details',
		'fields' => [
			[
				'key' => 'sbm_theme_options_contact_physical_tab',
				'name' => 'sbm_theme_options_contact_physical_tab',
				'label' => 'Location and Phone',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_contact_phone',
				'name' => 'sbm_theme_options_contact_phone',
				'label' => 'Phone Number',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_contact_email',
				'name' => 'sbm_theme_options_contact_email',
				'label' => 'Email',
				'type' => 'text',
			],
			[
				'key' => 'sbm_theme_options_contact_address',
				'name' => 'sbm_theme_options_contact_address',
				'label' => 'Addresss',
				'type' => 'textarea',
			],
			[
				'key' => 'sbm_theme_options_contact_map_url',
				'name' => 'sbm_theme_options_contact_map_url',
				'label' => 'Map Url',
				'instructions' => 'Provide a link to Google maps location',
				'type' => 'url',
			],
			[
				'key' => 'sbm_theme_options_contact_map_embed',
				'name' => 'sbm_theme_options_contact_map_embed',
				'label' => 'Map Embed',
				'type' => 'textarea',
			],
			[
				'key' => 'sbm_theme_options_contact_social_tab',
				'name' => 'sbm_theme_options_contact_social_tab',
				'label' => 'Social Media',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_contact_social_icons_repeater',
				'name' => 'sbm_theme_options_contact_social_icons_repeater',
				'label' => 'Social Icons',
				'type' => 'repeater',
				'sub_fields' => [
					[
						'key' => 'sbm_theme_options_contact_social_icons_repeater_icon',
						'name' => 'sbm_theme_options_contact_social_icons_repeater_icon',
						'label' => 'Social Icon',
						'type' => 'text',
						'instructions' => 'Use any class name from Font Awesome 5',
						'default_value' => 'fas fa-hashtag',
					],
					[
						'key' => 'sbm_theme_options_contact_social_icons_repeater_name',
						'name' => 'sbm_theme_options_contact_social_icons_repeater_name',
						'label' => 'Social Name',
						'type' => 'text',
					],
					[
						'key' => 'sbm_theme_options_contact_social_icons_repeater_url',
						'name' => 'sbm_theme_options_contact_social_icons_repeater_url',
						'label' => 'Social URL',
						'type' => 'url',
					]
				]
			],
			[
				'key' => 'sbm_theme_options_contact_footer_tab',
				'name' => 'sbm_theme_options_contact_footer_tab',
				'label' => 'Footer Links',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_contact_footer_left',
				'name' => 'sbm_theme_options_contact_footer_left',
				'label' => 'Footer Left',
				'type' => 'textarea',
			],
			[
				'key' => 'sbm_theme_options_contact_footer_center',
				'name' => 'sbm_theme_options_contact_footer_center',
				'label' => 'Footer Center',
				'type' => 'textarea',
			],
			[
				'key' => 'sbm_theme_options_contact_footer_right',
				'name' => 'sbm_theme_options_contact_footer_right',
				'label' => 'Footer Right',
				'type' => 'textarea',
			],

		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'sbm_theme_options_contact',
				]
			]
		]
	];

	// Build our embed options fields
	$embed_options_field_group = [
		'title' => 'Global Embeds',
		'fields' => [
			[
				'key' => 'sbm_theme_options_embed_tracking_tab',
				'name' => 'sbm_theme_options_embed_tracking_tab',
				'label' => 'Tracking',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_head_html',
				'name' => 'sbm_theme_options_embed_head_html',
				'label' => 'Head',
				'instructions' => 'Inject HTML into the head section of all pages',
				'type' => 'textarea',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_body_html',
				'name' => 'sbm_theme_options_embed_body_html',
				'label' => 'Body',
				'instructions' => 'Inject HTML into the body section of all pages',
				'type' => 'textarea',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_footer_html',
				'name' => 'sbm_theme_options_embed_footer_html',
				'label' => 'Footer',
				'instructions' => 'Inject HTML into the footer section of all pages',
				'type' => 'textarea',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_style_tab',
				'name' => 'sbm_theme_options_embed_style_tab',
				'label' => 'Styles',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_head_style',
				'name' => 'sbm_theme_options_embed_head_style',
				'label' => 'Footer',
				'instructions' => 'Add style code into the header',
				'type' => 'textarea',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_superheader_tab',
				'name' => 'sbm_theme_options_embed_superheader_tab',
				'label' => 'Super Header',
				'type' => 'tab',
				'new_lines' => '',
			],
			[
				'key' => 'sbm_theme_options_embed_superheader_content',
				'name' => 'sbm_theme_options_embed_superheader_content',
				'label' => 'Super Header',
				'instructions' => 'Add a message to the very top of all pages',
				'type' => 'text',
			],
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'sbm_theme_options_embed',
				]
			]
		]
	];

	acf_add_local_field_group($footer_options_field_group);
	acf_add_local_field_group($embed_options_field_group);
	acf_add_local_field_group($contact_options_field_group);
	acf_add_local_field_group($header_options_field_group);
	acf_add_local_field_group($general_options_field_group);
	
}

/**
 * Apply the standard WordPress theme options
 */
function sbm_theme_options_header()
{
	if (get_field('sbm_theme_options_embed_head_html', 'option')) {
		the_field('sbm_theme_options_embed_head_html', 'option');
	}
	if (get_field('sbm_theme_options_embed_head_style', 'option')) {
		echo '<style>';
		the_field('sbm_theme_options_embed_head_style', 'option');
		echo '</style>';
	}
}

function sbm_theme_options_body()
{
	if (get_field('sbm_theme_options_embed_body_html', 'option')) {
		the_field('sbm_theme_options_embed_body_html', 'option');
	}
}

function sbm_theme_options_footer()
{
	if (get_field('sbm_theme_options_embed_footer_html', 'option')) {
		the_field('sbm_theme_options_embed_footer_html', 'option');
	}
}



add_action('acf/init', 'sbm_register_theme_options');
add_action('wp_head', 'sbm_theme_options_header', 90);
add_action('wp_body_open', 'sbm_theme_options_body', 90);
add_action('wp_footer', 'sbm_theme_options_footer', 90);
