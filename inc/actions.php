<?php
/**
 * All add_action calls.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

/**
 * Load the translation file.
 */
add_action( 'after_setup_theme', 'rindby_load_translation' );

/**
 * Run add_theme_support() calls.
 */
add_action( 'after_setup_theme', 'rindby_add_theme_support' );

/**
 * Set content width.
 */
add_action( 'after_setup_theme', 'rindby_set_content_width' );

/**
 * Enqueue styles and scripts.
 */
add_action( 'wp_enqueue_scripts', 'rindby_scripts_styles' );

/**
 * Register menu locations.
 */
add_action( 'init', 'rindby_menus' );

/**
 * Register widget area.
 */
add_action( 'widgets_init', 'rindby_register_sidebars' );
