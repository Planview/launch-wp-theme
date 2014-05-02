<?php 
/**
 * This is where all the custom fields get set up
 */


define( 'ACF_LITE' , true );

require ( get_template_directory() . '/vendor/advanced-custom-fields/acf.php' );
require ( get_template_directory() . '/vendor/acf-repeater/acf-repeater.php' );
require ( get_template_directory() . '/vendor/acf-options-page/acf-options-page.php' );

if( function_exists( "register_field_group" ) ) {
	include ( get_template_directory() . '/inc/custom-fields/front-page.php' );
}
