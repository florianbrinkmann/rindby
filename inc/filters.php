<?php
/**
 * All add_filter calls.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

/**
 * Remove more jump from read more links.
 */
add_filter( 'the_content_more_link', 'rindby_remove_more_jump_link' );

/**
 * Filter body classes.
 */
add_filter( 'body_class', 'rindby_filter_body_class' );
