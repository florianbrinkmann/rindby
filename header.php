<?php
/**
 * Header template
 *
 * @version 1.0.3
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
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
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
                </a>
            </h1>
		<?php } else { ?>
            <p class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
                </a>
            </p>
		<?php }
		$description = get_bloginfo( 'description' );
		if ( $description != "" ) {
			printf( '<p class="site-description">%1$s</p>', $description );
		}
		wp_nav_menu( array(
			'theme_location' => 'header-menu',
			'depth'          => 1
		) ); ?>
    </header>