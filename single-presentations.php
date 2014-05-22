<?php
/**
 * The Template for displaying featured presentations
 *
 * @package Planview Product Launch
 */

global $post;
$launch_question_form = get_field( 'pv_event_presentation_qa_form', $post->ID );
gravity_form_enqueue_scripts($launch_question_form->id, true);

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'presentations' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); 