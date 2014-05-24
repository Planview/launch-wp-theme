<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Planview Product Launch
 */
?><!DOCTYPE html>
<!--[if lte IE 6]><html <?php language_attributes(); ?> class="lt-ie9 no-js"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--><![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<div class="alert alert-danger">
	<?php the_field('launch_unsupported_browser', 'option'); ?>
</div>
<![endif]-->
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header bg-size" role="banner">
		<div class="header-inner">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title bg-size"><?php bloginfo( 'name' ); ?></h1></a>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<a class="skip-link sr-only" href="#content"><?php _e( 'Skip to content', 'launch' ); ?></a>

				<?php wp_nav_menu( array( 
					'theme_location' => ( is_user_logged_in() ? 'primary_logged_in' : 'primary' ),
					'container_class' => 'menu',
					'fallback_cb' => false,
					'menu_class' => 'main-navigation-list',
					'depth' => 2,
					'walker' => new Launch_Bootstrap_Nav_Walker(),
				) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="<?php echo ( is_front_page() ? 'front-content' : 'site-content' ); ?>">
