<?php 
/**
 * Redirect to the main presentation
 */

wp_safe_redirect( get_permalink( $post->ID ), 301 );