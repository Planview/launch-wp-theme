<?php 
/**
 * Display the Resources Library
 */
 

get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">
					<?php if ( get_field( 'pv_event_resources_archive_title', 'option' ) ) {
							the_field( 'pv_event_resources_archive_title', 'option' );
						} else {
							_ex('Resource Library', 'Page Title', 'launch');
						} ?>
				</h1>
			</header><!-- .page-header -->
			<?php if ( is_user_logged_in() ) : ?>
				<div class="page-content">
					<div class="page-intro">
						<?php the_field('pv_event_resources_archive_intro', 'option'); ?>
					</div>
					<div class="library-listing">
						<?php $launch_library_posts = launch_library_sort(); ?>
						<?php if ( ! empty( $launch_library_posts ) ) : $launch_section_count = 0 ?>
							<?php foreach ( $launch_library_posts as $section_title => $section ) : ?>
								<?php echo ( 0 == ($launch_section_count % 2) ? '<div class="row">' : '' ); ?>
									<div class="col-sm-6">
										<div class="panel panel-default library-resources-panel">
											<div class="panel-heading">
												<h2 class="panel-title"><?php echo $section_title ?></h2>
											</div>
											<div class="panel-body">
												<?php foreach ( $section as $subsection_title => $subsection ) : ?>
													<h3 class="library-type-heading"><?php echo $subsection_title ?></h3>
													<ul class="list-unstyled">
														<?php foreach ( $subsection as $post ) : setup_postdata( $post ); ?>
															<?php get_template_part( 'content', 'library' ); ?>
														<?php endforeach; ?>
													</ul>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								<?php echo ( 1 == ($launch_section_count % 2) ? '</div>' : '' ); ?>
								<?php $launch_section_count += 1; ?>
							<?php endforeach; ?>
						<?php endif; wp_reset_postdata(); ?>					
					</div>
				</div>
			<?php endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); 
