<?php
/**
 * Functions which are not called from template files and
 * cannot be grouped into another file.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

/**
 * Load translation from translate.wordpress.org if available.
 */
function rindby_load_translation() {
	/**
	 * Check if there is no AJAX call an we are not on
	 * a login page or on the comments page.
	 */
	if ( ( ! defined( 'DOING_AJAX' ) && ! 'DOING_AJAX' ) || ! rindby_is_login_page() || ! rindby_is_wp_comments_post() ) {
		load_theme_textdomain( 'rindby' );
	}
}

/**
 * Check if we are on the login page.
 *
 * @return bool true if on wp-login.php or wp-register.php, false otherwise.
 */
function rindby_is_login_page() {
	return in_array( $GLOBALS['pagenow'], [ 'wp-login.php', 'wp-register.php' ], true );
}

/**
 * Check if we are on the wp-comments-post.php.
 *
 * @return bool true if we are on the wp-comments-post.php, false otherwise.
 */
function rindby_is_wp_comments_post() {
	return in_array( $GLOBALS['pagenow'], [ 'wp-comments-post.php' ], true );
}

/**
 * Add theme support for feed links, title tag, post formats, Post thumbnails and html5.
 * Sets content width.
 */
function rindby_add_theme_support() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats',
		[
			'aside',
			'link',
			'gallery',
			'status',
			'quote',
			'image',
			'video',
			'audio',
			'chat',
		]
	);
	add_theme_support( 'html5',
		[
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		]
	);
	add_theme_support( 'post-thumbnails' );
}

/**
 * Set the content width.
 */
function rindby_set_content_width() {
	/**
	 * Set the content width to 1147.
	 */
	$content_width = 956;

	/**
	 * Make the content width filterable.
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'rindby_content_width', $content_width );
}

/**
 * Enqueue scripts and styles.
 */
function rindby_scripts_styles() {
	/**
	 * Check if we are on a single view with open comments and
	 * the threaded comments option enabled.
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		/**
		 * Enqueue comments reply script.
		 */
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Enqueue stylesheet.
	 */
	if ( is_rtl() ) {
		wp_enqueue_style( 'rindby-style', get_theme_file_uri( 'css/rindby-rtl.css' ), [], null );
	} else {
		wp_enqueue_style( 'rindby-style', get_theme_file_uri( 'css/rindby.css' ), [], null );
	}
}

/**
 * Register menus.
 */
function rindby_menus() {
	register_nav_menus(
		[
			'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu',
		]
	);
}

/**
 * Register sidebar.
 */
function rindby_register_sidebars() {
	register_sidebar(
		[
			'name'          => __( 'Sidebar', 'rindby' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}

