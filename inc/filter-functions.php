<?php
/**
 * Functions that filter something.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

/**
 * Remove #more-hash from read more link to prevent the page jump.
 *
 * @param string $link Post permalink.
 *
 * @return string Filtered link.
 */
function rindby_remove_more_jump_link( $link ) {
	/**
	 * Get position of #more hash.
	 */
	$offset = strpos( $link, '#more-' );

	/**
	 * Check if we have a #more.
	 */
	if ( $offset ) {
		/**
		 * Get the end position of the URL.
		 */
		$end = strpos( $link, '"', $offset );

		/**
		 * Check if we have an end.
		 */
		if ( $end ) {
			/**
			 * Remove the #more part.
			 */
			$link = substr_replace( $link, '', $offset, $end - $offset );
		}
	}

	return $link;
}

/**
 * Adds no-sidebar class to body element if sidebar-1 is not active.
 *
 * @param array $classes Body classes array.
 *
 * @return array Array of body classes.
 */
function rindby_filter_body_class( $classes ) {
	/**
	 * Check if the sidebar has no widgets.
	 */
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		/**
		 * Add no-sidebar class.
		 */
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
