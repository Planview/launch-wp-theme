<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Planview Product Launch
 */

if ( ! function_exists( 'launch_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function launch_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'launch' ); ?></h1>
		<ul class="nav-links">

			<?php if ( get_previous_posts_link() ) : ?>
			<li class="previous"><?php previous_posts_link( __( '<span class="meta-nav fa fa-chevron-left"></span> Previous Page', 'launch' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_next_posts_link() ) : ?>
			<li class="next"><?php next_posts_link( __( 'Next Page <span class="meta-nav fa fa-chevron-right"></span>', 'launch' ) ); ?></li>
			<?php endif; ?>

		</ul><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'launch_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function launch_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'launch' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'launch' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'launch' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'launch_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function launch_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'launch' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function launch_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'launch_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'launch_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so launch_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so launch_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in launch_categorized_blog.
 */
function launch_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'launch_categories' );
}
add_action( 'edit_category', 'launch_category_transient_flusher' );
add_action( 'save_post',     'launch_category_transient_flusher' );


/**
 * Conditional Tag for gt IE8 on our style
 */
function launch_ie_style_conditional($output, $handle) {
    if ( $handle !== 'launch-style' && $handle !== 'launch-style-blessed1' )
    	return $output;

    return "<!--[if gt IE 8]><!-->\n" . $output . "<!--<![endif]-->\n";
}
add_filter( 'style_loader_tag', 'launch_ie_style_conditional', 10, 2 );

/**
 * Polyfills for IE8
 */
function launch_ie_polyfills() { ?>
<!--[if lte IE 8]>
    <style>.bg-size{-ms-behavior:url('<?php echo get_template_directory_uri() . '/vendor/background-size-polyfill/backgroundsize.min.htc' ?>')}</style>
    <script src="<?php echo get_template_directory_uri() . '/vendor/respond/dest/respond.min.js' ?>"></script>
<![endif]-->
<?php }
add_action( 'wp_head', 'launch_ie_polyfills', 60 );
