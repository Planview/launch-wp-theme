<?php 
	register_field_group(array (
		'id' => 'acf_front-page-fields',
		'title' => 'Front Page Fields',
		'fields' => array (
			array (
				'key' => 'field_537ea93051caf',
				'label' => 'Redirect Logged in Users to New page',
				'name' => 'launch_logged_in_home',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5363f4f8e415c',
				'label' => 'Jumbotron',
				'name' => 'launch_front_jumbtron',
				'type' => 'wysiwyg',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5363f50fe415d',
				'label' => 'Main Content Sections',
				'name' => 'launch_front_main_content',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5363f60ee415f',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'full',
						'media_upload' => 'yes',
					),
				),
				'row_min' => 2,
				'row_limit' => 4,
				'layout' => 'table',
				'button_label' => 'Add Section',
			),
			array (
				'key' => 'field_5363f545e415e',
				'label' => 'Bottom Content',
				'name' => 'launch_front_bottom_content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'custom_fields',
			),
		),
		'menu_order' => 0,
	)
);