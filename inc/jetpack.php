<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Planview Product Launch
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function launch_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'launch_jetpack_setup' );
