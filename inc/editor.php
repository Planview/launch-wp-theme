<?php 
/**
 * This file contains additional settings for TinyMCE
 */

/**
 * Make the editor respect empty `<span>` elements
 */
function launch_tinymce_settings_filter ( $settings ) {
    if ( !isset( $settings['extended_valid_elements'] ) ) {
        $settings['extended_valid_elements'] = 'span[*]';
    } else {
        $settings['extended_valid_elements'] .= ',span[*]';
    }
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'launch_tinymce_settings_filter' );

/**
 * Add a custom style sheet onto the TinyMCE Editor
 */
function launch_add_editor_styles() {
    add_editor_style( 'css/editor.css' );
}
add_action( 'init', 'launch_add_editor_styles' );