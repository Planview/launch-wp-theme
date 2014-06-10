<?php
/**
 * @package Planview Product Launch
 */
?>

<article id="presentations-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php if ( get_field('pv_event_subtitle') ) printf( '<h2 class="subtitle">%s</h2>' ) ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if ( is_user_logged_in() ) : ?>
			<div class="presentations-area">

				<div class="main-presentation-outer">
					<div class="presentations-video-wrapper limelight-video-respond"<?php echo ( ( $launch_vid_controls_height = get_field( 'pv_event_vid_controls_height' ) ) ? ' data-controls-height="' . $launch_vid_controls_height . '"' : '' ) ?><?php echo ( ( $launch_vid_controls_width = get_field( 'pv_event_vid_controls_width' ) ) ? ' data-controls-width="' . $launch_vid_controls_width . '"' : '' ) ?>>
						<?php the_field( 'pv_event_presentation_video'); ?>
					</div>
					<?php if ( $launch_question_form = get_field( 'pv_event_presentation_qa_form' ) ) : ?>
						<div class="presentation-question-wrapper">
							<h2 class="presentation-question-title"><?php _ex( 'Ask A Question', 'Heading', 'launch' ); ?></h2>
							<div class="presentation-question-inner">
								<?php gravity_form($launch_question_form->id, false, false, false, '', true, 1); ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="presentations-below-video">
						<div class="presentations-content-wrapper">
							<div class="presentations-content-inner">
								<div class="presentations-content-header">
									<h2 class="presentations-content-title"><?php _ex( "What&rsquo;s New in 11.2", 'Heading', 'launch') ?></h2>
								</div>
								<div class="presentations-content-body">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="presentations-sidebar">
						<?php the_field( 'pv_event_presentation_abstract' ); ?>
						<?php if ( $launch_topic_resources = get_field( 'pv_event_presentation_resources' ) ) : ?>
							<div class="presentations-resources-wrapper">
								<div class="presentations-resources-inner">
									<div class="presentations-resources-header">
										<h2 class="presentations-resources-title"><?php _ex( 'Resources', 'Heading', 'launch' ); ?></h2>
									</div>
									<div class="presentations-resources-body">
										<ul class="presentations-resources-list">
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

					<?php if ( have_rows( 'pv_event_speakers' ) ) : $launch_count = 0; ?>
						<div class="presentations-rep-inner">
							<div class="presentations-rep-header">
								<h2 class="presentations-rep-title"><?php _ex( 'Speakers', 'Heading', 'launch'); ?></h2>
							</div>
							<div class="presentations-rep-body">
							<ul class="media-list">
							<?php while ( have_rows( 'pv_event_speakers' ) ) : the_row(); $launch_count += 1; ?>
								<li class="media">
									<?php if ( $launch_speaker_photo = get_sub_field('photo') ) {
										printf(
											'<img src="%1$s" alt="%2$s" height="%3$s" width="%4$s" class="media-object pull-left img-rounded" />',
											launch_maybe_https($launch_speaker_photo['sizes']['thumbnail']),
											esc_attr( $launch_speaker_photo['alt'] ),
											esc_attr( $launch_speaker_photo['sizes']['thumbnail-height'] * 0.33 ),
											esc_attr( $launch_speaker_photo['sizes']['thumbnail-width'] * 0.33 )
										);
									} ?>
									<div class="media-body">
										<h4 class="media-heading"><?php the_sub_field( 'name' ); ?></h4>
										<h4 class="presentations-rep-job-title"><small><?php the_sub_field( 'title' ); ?></small></h4>
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
