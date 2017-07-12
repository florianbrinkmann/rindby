<?php
/**
 * Header template.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php
	/**
	 * Check if we are on a single view and pings are open.
	 */
	if ( is_singular() && pings_open() ) { ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php }

	/**
	 * Fire wp_head action, which includes styles, scripts, et cetera, from core, themes, and plugins.
	 */
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<a class="screen-reader-text" href="#main"><?php _e( '[Skip to Content]', 'rindby' ); ?></a>
	<header class="branding" role="banner">
		<?php
		/**
		 * Displays the website title and description.
		 */
		rindby_the_branding();

		/**
		 * Display the nav menu.
		 */
		wp_nav_menu(
			[
				'theme_location' => 'header-menu',
				'depth'          => 1,
			]
		); ?>
	</header>
