<?php 
/**
 * Helpers for search results
 */

/**
 * Return the HTML for the icon in search results as a string
 */
function launch_search_icon() {
	global $post;

	$icon_format = '<span class="fa %s"></span> ';

	switch ( $post->post_type ) {
		case 'library':
			return sprintf( $icon_format, launch_icon_class( get_field( 'pv_event_resource_doc_type', $post->ID ) ) );
		case 'presentations':
			return sprintf( $icon_format, 'fa-video-camera' );
		case 'topics':
			return sprintf( $icon_format, 'fa-info-circle');
		default:
			return sprintf( $icon_format, 'fa-file-o' );
	}
}

/**
 * Return the search result type display name as a string
 */
function launch_search_type() {
	global $post;

	switch ( $post->post_type ) {
		case 'library':
			switch ( get_field( 'pv_event_resource_doc_type', $post->ID ) ) {
				case 'pdf':
					return 'PDF';
				case 'video':
					return 'Video';
				case 'slideshare':
					return 'Slideshare';
				default:
					return 'External Resource';
			}
		default:
			$pt_object = get_post_type_object( $post->post_type );
			return $pt_object->labels->singular_name;
	}
}