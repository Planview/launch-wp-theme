<?php
/**
 * Functions to control topic areas
 */

function launch_topics_pre_get_posts( $query ) {
	if ( is_admin() || ! is_post_type_archive( 'topics' ) )
		return;

	$query->set( 'orderby', 'menu_order' );
	$query->set( 'order', 'ASC' );
}
add_action( 'pre_get_posts', 'launch_topics_pre_get_posts' );