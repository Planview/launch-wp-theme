<?php 
/**
 * The archive listing for the topics
 */

get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">
					<?php if ( get_field( 'pv_event_topics_archive_title', 'option' ) ) {
							the_field( 'pv_event_topics_archive_title', 'option' );
						} else {
							_ex('Topic Areas', 'Page Title', 'launch');
						} ?>
				</h1>
			</header><!-- .page-header -->
			<div class="page-content">
				<div class="page-intro">
					<?php the_field('pv_event_topics_archive_intro', 'option'); ?>
				</div>
				<?php if ( have_posts() && is_user_logged_in() ) : ?>
					<div class="topics-listing-wrapper">
						<div class="topics-listing">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="topic">
									<div class="topic-thumbnail hidden-xs">
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
										<?php echo get_the_post_thumbnail( get_the_id(), array(100, 100), array( 'class' => 'topic-thumbnail-img' ) ); ?>
										</a>
									</div>
									<div class="topic-description">
										<?php the_excerpt(); ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer();