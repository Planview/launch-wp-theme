<?php 
/**
 * The content for the library page
 */

if ( is_post_type_archive( 'library' ) ) :
?>
<li>
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"<?php echo ( 'video' !== get_field('pv_event_resource_doc_type') ? ' target="_blank"' : '' ) ?>>
		<span class="fa <?php echo launch_icon_class( get_field( 'pv_event_resource_doc_type' ) ); ?>"></span> <?php the_title(); ?>
	</a>
</li>
<?php elseif ( is_single() ) : ?>
<article id="library-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php if ( get_field('pv_event_subtitle') ) printf( '<h2 class="subtitle">%s</h2>' ) ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if ( is_user_logged_in() ) : ?>
			<div class="video-page-wrapper">
				<div class="limelight-video-respond library-video"<?php echo ( ( $launch_vid_controls_height = get_field( 'pv_event_vid_controls_height' ) ) ? ' data-controls-height="' . $launch_vid_controls_height . '"' : '' ) ?><?php echo ( ( $launch_vid_controls_width = get_field( 'pv_event_vid_controls_width' ) ) ? ' data-controls-width="' . $launch_vid_controls_width . '"' : '' ) ?>>
					<?php the_field( 'pv_event_resource_video_code' ); ?>
				</div>
			</div>
			<div class="library-content">
				<?php the_content(); ?>
			</div>
		<?php endif; //User logged in ?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php endif; ?>