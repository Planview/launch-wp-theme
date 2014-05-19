<?php 
/**
 * This is where all the custom fields get set up
 */


if ( ! defined( 'ACF_LITE' ) ) define( 'ACF_LITE' , true );

require ( get_template_directory() . '/vendor/advanced-custom-fields/acf.php' );
require ( get_template_directory() . '/vendor/acf-repeater/acf-repeater.php' );
if ( ! class_exists( 'acf_options_page_plugin' ) )
	require ( get_template_directory() . '/vendor/acf-options-page/acf-options-page.php' );

if ( function_exists( "acf_add_options_sub_page" ) ) {
	acf_add_options_sub_page(array(
        'title' => _x('Theme Options', 'Option page title', 'launch'),
        'parent' => 'themes.php',
        'slug' => 'launch-theme-options',
        'capability' => 'edit_theme_options'
    ));
}

if ( function_exists( "register_field_group" ) ) {
	include ( get_template_directory() . '/inc/custom-fields/front-page.php' );
	include ( get_template_directory() . '/inc/custom-fields/theme-options.php' );
}
