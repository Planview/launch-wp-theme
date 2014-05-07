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