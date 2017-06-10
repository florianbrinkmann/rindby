<?php
/**
 * Functions which are not called from template files and
 * cannot be grouped into another file.
 *
 * @version 1.1.4
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

add_action( 'after_setup_theme', 'rindby_load_translation' );

/**
 * Check if we are on the login page
 *
 * @return bool true if on wp-login.php or wp-register.php, false otherwise.
 */
function rindby_is_login_page() {
	return in_array( $GLOBALS['pagenow'], [ 'wp-login.php', 'wp-register.php' ], true );
}

/**
 * Check if we are on the wp-comments-post.php
 *
 * @return bool true if we are on the wp-comments-post.php, false otherwise.
 */
function rindby_is_wp_comments_post() {
	return in_array( $GLOBALS['pagenow'], [ 'wp-comments-post.php' ], true );
}
