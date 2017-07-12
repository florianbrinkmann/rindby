<?php
/**
 * Functions file.
 *
 * @package Rindby
 */

/**
 * Include the template tag functions (functions which are directly called from template files).
 */
include( locate_template( 'inc/template-tags.php' ) );

/**
 * Include the file with template functions.
 */
include( locate_template( 'inc/template-functions.php' ) );

/**
 * Include the filter functions file.
 */
include( locate_template( 'inc/filter-functions.php' ) );

/**
 * Include the file with all action calls.
 */
include( locate_template( 'inc/filters.php' ) );

/**
 * Include the file with all filter calls.
 */
include( locate_template( 'inc/actions.php' ) );
