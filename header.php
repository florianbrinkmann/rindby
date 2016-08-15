<?php
/**
 * Header template
 *
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php if ( is_singular() && pings_open() ) { ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php }
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">
	<a class="screen-reader-text" href="#main"><?php _e( '[Skip to Content]', 'rindby' ); ?></a>
	<header id="branding" role="banner">
		<?php if ( is_front_page() && is_home() ) { ?>
			<h1 class="site-title">
				<?php if ( is_paged() ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php }
					bloginfo( 'name' );
					if ( is_paged() ) { ?>
				</a>
			<?php } ?>
			</h1>
		<?php } else { ?>
			<p class="site-title">
				<?php if ( ! is_front_page() ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php }
					bloginfo( 'name' );
					if ( ! is_front_page() ) { ?>
				</a>
			<?php } ?>
			</p>
		<?php }
		$description = get_bloginfo( 'description' );
		if ( $description != "" ) {
			echo "<p class='site-description'>$description</p>";
		} ?>
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</header>