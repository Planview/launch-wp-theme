<?php 
/**
 * This is the file for registering all the theme options
 */

register_field_group(array (
    'id' => 'launch_login-message',
    'title' => 'Login Message',
    'fields' => array (
        array (
            'key' => 'field_535aaa9c56390',
            'label' => 'Login Message',
            'name' => 'launch_login_message',
            'type' => 'textarea',
            'instructions' => 'Text should be HTML wrapped in <code>&lt;&hellip; class="message"&gt;&hellip;&lt;/&hellip;"&gt;</code>',
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'formatting' => 'html',
        ),
        array (
            'key' => 'field_537e48c52f01a',
            'label' => 'Unsupported Browser Message',
            'name' => 'launch_unsupported_browser',
            'type' => 'textarea',
            'instructions' => 'This can be plain text or valid HTML',
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'formatting' => 'html',
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'launch-theme-options',
                'order_no' => 0,
                'group_no' => 0,
            ),
        ),
    ),
    'options' => array (
        'position' => 'normal',
        'layout' => 'no_box',
        'hide_on_screen' => array (
        ),
    ),
    'menu_order' => 0,
));
register_field_group(array (
    'id' => 'acf_survey-button',
    'title' => 'Survey Button',
    'fields' => array (
        array (
            'key' => 'field_5380e4e08bace',
            'label' => 'Link Text',
            'name' => 'launch_survey_text',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
        ),
        array (
            'key' => 'field_5380e5028bacf',
            'label' => 'Link Target URL',
            'name' => 'launch_survey_url',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
        ),
        array (
            'key' => 'field_5380e5228bad0',
            'label' => 'Link Class',
            'name' => 'launch_survey_class',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
        ),
        array (
            'key' => 'field_5380e57d8bad1',
            'label' => 'Open Link in a New Window',
            'name' => 'launch_survey_target',
            'type' => 'true_false',
            'message' => '',
            'default_value' => 0,
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'launch-theme-options',
                'order_no' => 0,
                'group_no' => 0,
            ),
        ),
    ),
    'options' => array (
        'position' => 'side',
        'layout' => 'default',
        'hide_on_screen' => array (
        ),
    ),
    'menu_order' => 0,
));