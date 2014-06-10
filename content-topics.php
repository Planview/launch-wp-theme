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

		<?php if ( is_user_logged_in() ) : ?>
			<div class="topics-area">

				<div class="main-topic-outer">
					<div class="topics-video-wrapper limelight-video-respond"<?php echo ( ( $launch_vid_controls_height = get_field( 'pv_event_vid_controls_height' ) ) ? ' data-controls-height="' . $launch_vid_controls_height . '"' : '' ) ?><?php echo ( ( $launch_vid_controls_width = get_field( 'pv_event_vid_controls_width' ) ) ? ' data-controls-width="' . $launch_vid_controls_width . '"' : '' ) ?>>
						<?php the_field( 'pv_event_topic_playlist'); ?>
					</div>
					<div class="topics-below-video">
						<div class="topics-content-wrapper">
							<div class="topics-content-inner">
								<div class="topics-content-header">
									<h2 class="topics-content-title"><?php _ex( "What&rsquo;s New in 11.2", 'Heading', 'launch') ?></h2>
								</div>
								<div class="topics-content-body">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
						<?php if ( $launch_topic_resources = get_field( 'pv_event_presentation_resources' ) ) : ?>
							<div class="topics-resources-wrapper">
								<div class="topics-resources-inner">
									<div class="topics-resources-header">
										<h2 class="topics-resources-title"><?php _ex( 'Resources', 'Heading', 'launch' ); ?></h2>
									</div>
									<div class="topics-resources-body">
										<ul class="topics-resources-list">
										<?php foreach ( $launch_topic_resources as $post ) : setup_postdata( $post ); ?>
											<li>
												<?php printf(
													'<a href="%1$s" title="%2$s" target="_blank"><span class="fa %4$s"></span> %3$s</a>',
													esc_url( get_permalink() ),
													esc_attr( get_the_title() ),
													get_the_title(),
													launch_icon_class( get_field( 'pv_event_resource_doc_type' ) )
												); ?>
											</li>
										<?php endforeach; wp_reset_postdata(); ?>
										</ul>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="chat-wrapper">
					<div class="chat-inner">
						<div class="chat-header">
							<h2 class="chat-title"><?php _ex('Chat', 'Heading', 'launch'); ?></h2>
						</div>
						<div class="chat-body">
							<?php echo do_shortcode( get_field( 'pv_event_topic_chat' ) ); ?>
						</div>
					</div>
					<?php if ( have_rows( 'pv_event_speakers' ) ) : $launch_count = 0; ?>
						<div class="topics-rep-inner">
							<div class="topics-rep-header">
								<h2 class="topics-rep-title"><?php _ex( 'Experts', 'Heading', 'launch'); ?></h2>
							</div>
							<div class="topics-rep-body">
							<ul class="media-list">
							<?php while ( have_rows( 'pv_event_speakers' ) ) : the_row(); $launch_count += 1; ?>
								<li class="media">
									<?php if ( $launch_speaker_photo = get_sub_field('photo') ) {
										printf(
											'<img src="%1$s" alt="%2$s" height="%3$s" width="%4$s" class="media-object pull-left img-rounded" />',
											launch_maybe_https($launch_speaker_photo['sizes']['thumbnail']),
											esc_attr( $launch_speaker_photo['alt'] ),
											esc_attr( $launch_speaker_photo['sizes']['thumbnail-height'] * 0.67 ),
											esc_attr( $launch_speaker_photo['sizes']['thumbnail-width'] * 0.67 )
										);
									} ?>
									<div class="media-body">
										<h4 class="media-heading"><?php the_sub_field( 'name' ); ?></h4>
										<h4 class="topics-rep-job-title"><small><?php the_sub_field( 'title' ); ?></small></h4>
										<button class="btn btn-small btn-default" data-toggle="collapse" data-target="#rep<?php echo $launch_count ?>"><span class="fa fa-info-circle"></span> <?php _ex( 'More Information', 'Toggle Button', 'launch' ); ?></button>
									<div id="rep<?php echo $launch_count; ?>" class="collapse topic-rep-bio">
										<?php the_sub_field( 'bio' ); ?>
										<?php if ( get_sub_field( 'email' ) || get_sub_field( 'twitter') ) : ?>
											<ul class="list-unstyled">
												<?php if ( get_sub_field( 'twitter' ) ) { ?><li><a href="https://twitter.com/<?php echo esc_attr( trim( get_sub_field( 'twitter' ) ) ); ?>" target="_blank"><span class="fa fa-twitter-square"></span> <?php the_sub_field( 'twitter' ); ?></a></li><?php } ?>
												<?php if ( get_sub_field( 'email' ) ) { ?><li><a href="<?php echo antispambot( esc_attr( 'mailto:' . sanitize_email( get_sub_field( 'email' ) ) ) ); ?>"><span class="fa fa-envelope"></span> <?php echo antispambot( get_sub_field( 'email' ) ); ?></a></li><?php } ?>
											</ul>
										<?php endif; ?>
									</div>
									</div>
								</li>
							<?php endwhile; ?>
							</ul>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; //User logged in ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
