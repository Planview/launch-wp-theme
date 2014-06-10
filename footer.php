<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Planview Product Launch
 */
?>

	</div><!-- #content -->
	<?php if ( is_user_logged_in() && get_field( 'launch_survey_url', 'option' ) ) : ?>
	<div class="survey-link-wrapper">
		<?php printf(
			'<a href="%1$s" class="survey-link%3$s"%4$s><span class="text-hide">%5$s</span></a>',
			esc_url( get_field( 'launch_survey_url', 'option' ) ),
			null,
			( get_field( 'launch_survey_class', 'option' ) ? ' ' . esc_attr( 'launch_survey_class', 'option' ) : '' ),
			( get_field( 'launch_survey_target', 'option' ) ? ' target="_blank"' : '' ),
			get_field( 'launch_survey_text', 'option' )
		); ?>
	</div>
	<?php endif; ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-inner">
			<?php    /**
				* Displays a navigation menu
				* @param array $args Arguments
				*/
				$launch_footer_menu_args = array(
					'theme_location' => ( is_user_logged_in() ? 'footer_logged_in' : 'footer' ),
					'container' => 'div',
					'container_class' => 'menu-footer-container',
					'menu_class' => 'menu-footer-list',
					'fallback_cb' => false,
					'depth' => 1,
				);
			
				wp_nav_menu( $launch_footer_menu_args ); ?>
			<p class="footer-branding">
				<a href="http://www.planview.com" target="_blank"><img src="<?php echo get_template_directory_uri() . '/img/Planview-Logo-White-White.png' ?>" alt="<?php _e( 'Planview', 'launch' ); ?>"></a>
			</p><!-- .site-info -->
			<div class="footer-bottom">
				<div class="footer-legal">
					<span class="copyright"><?php printf( __( '&copy; %s Planview, Inc., All Rights Reserved.', 'launch' ), date('Y') ); ?></span>
					<?php    /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$launch_footer_legal_args = array(
							'theme_location' => 'legal',
							'container' => false,
							'menu_class' => 'footer-legal-menu',
							'echo' => true,
							'fallback_cb' => false,
							'depth' => 1,
						);
					
						wp_nav_menu( $launch_footer_legal_args ); ?>
				</div>
				<div class="footer-follow">
					<?php    /**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$launch_footer_follow_args = array(
							'theme_location' => 'follow',
							'menu_class' => 'footer-follow-menu',
							'echo' => true,
							'fallback_cb' => false,
							'depth' => 1,
						);
					
						wp_nav_menu( $launch_footer_follow_args ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
