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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-inner">
			<?php    /**
				* Displays a navigation menu
				* @param array $args Arguments
				*/
				$launch_footer_menu_args = array(
					'theme_location' => 'footer',
					'container' => 'div',
					'container_class' => 'menu-footer-container',
					'menu_class' => 'menu-footer-list',
					'fallback_cb' => false,
					'depth' => 1,
				);
			
				wp_nav_menu( $launch_footer_menu_args ); ?>
			<div class="site-info">
				<p>Coming Soon</p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
