<?php
/**
 * @package Planview Product Launch
 */
?>

<article id="topics-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php if ( get_field('pv_event_subtitle') ) printf( '<h2 class="subtitle">%s</h2>' ) ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php if ( is_user_logged_in() ) : ?>
			<div class="topics-area">
				<div class="chat-wrapper">
					<?php if ( have_rows( 'pv_event_speakers' ) ) : ?>
						<div class="topics-rep-info">
							<div class="topics-rep-header">
								<h3 class="topics-rep-title"><?php _ex( 'Representatives', 'Heading', 'launch'); ?></h3>
							</div>
							<div class="topics-rep-body">
							<ul class="media-list">
							<?php while ( have_rows( 'pv_event_speakers' ) ) : the_row(); ?>
								<li class="media">
									<?php if ( $launch_speaker_photo = get_sub_field('photo') ) {
										var_dump($launch_speaker_photo)
										// printf(
										// 	'<img src="%1$s" alt=%2$s height="%3$s" width="%4$s" class="media-object pull-left" />',
										// 	$launch_speaker_photo['thumbnail']
										// );
									} ?>
								</li>
							<?php endwhile; ?>
							</ul>
							</div>
						</div>
					<?php endif; ?>
					<div class="chat-inner">
						<div class="chat-header">
							<h2 class="chat-title"><?php _ex('Chat', 'Heading', 'launch'); ?></h2>
						</div>
						<div class="chat-body">
							<iframe src="<?php echo esc_url( get_field( 'pv_event_topic_chat' ) ); ?>" class="topic-chat-iframe"></iframe>
						</div>
					</div>
				</div>

				<div class="main-topic-outer">
					<div class="topics-video-wrapper limelight-video-respond"<?php echo ( ( $launch_vid_controls_height = get_field( 'pv_event_vid_controls_height' ) ) ? ' data-controls-height="' . $launch_vid_controls_height . '"' : '' ) ?><?php echo ( ( $launch_vid_controls_width = get_field( 'pv_event_vid_controls_width' ) ) ? ' data-controls-width="' . $launch_vid_controls_width . '"' : '' ) ?>>
						<?php the_field( 'pv_event_topic_playlist'); ?>
					</div>
					<div class="topics-below-video">
						<div class="topics-whats-new-wrapper">
							<div class="topics-whats-new-inner">
								<div class="topics-whats-new-header">
									<h2><?php _ex( "What&rsquo;s New in 11.2", 'Heading', 'launch') ?></h2>
								</div>
								<div class="topics-whats-new-body">
									<?php the_field( 'pv_event_topic_sponsor_desc' ); ?>
								</div>
							</div>
						</div>
						<?php if ( $launch_topic_resources = get_field( 'pv_event_resources' ) ) : ?>
							<div class="topics-resources-wrapper">
								<div class="topics-resources-inner">
									<div class="topics-resources-header">
										<h2><?php _ex( 'Resources', 'Heading', 'launch' ); ?></h2>
									</div>
									<div class="topics-resources-body">
										<ul class="topics-resources-list">
										<?php foreach ( $launch_topic_resources as $post ) : setup_postdata( $post ); ?>
											<li>
												<?php printf(
													'<a href="%1$s" title="%2$s">%3$s</a>',
													esc_url( get_permalink() ),
													esc_attr( get_the_title() ),
													get_the_title()
												); ?>
											</li>
										<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; //User logged in ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'launch' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
