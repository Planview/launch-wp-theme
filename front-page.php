<?php 
/**
 * This is the template for a static front page on the site
 *
 * Template Name: Front Page
 */

get_header(); ?>

<div class="launch-jumbotron">
	<div class="container">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php the_field( 'launch_front_jumbtron' ); ?>
	</div>
</div>
<div class="launch-front-content">
	<div class="container">
		<?php if ( have_rows( 'launch_front_main_content' ) ) :
			$launch_front_sections = get_field( 'launch_front_main_content' );
			$launch_front_number_of_sections = count( $launch_front_sections );
			$launch_front_section_class = 'col-md-' . ( 12 / $launch_front_number_of_sections ); ?>
			<div class="row">
			<?php while ( have_rows( 'launch_front_main_content' ) ) : the_row(); ?>
				<div class="front-content-section <?php echo esc_attr( $launch_front_section_class ); ?>">
					<?php the_sub_field( 'content' ); ?>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php if ( get_field('launch_front_bottom_content' ) ) : ?>
<div class="launch-front-bottom">
	<div class="container">
		<?php the_field( 'launch_front_bottom_content' ); ?>
	</div>
</div>
<?php endif; ?>
<?php get_footer();