<?php
/**
 * Template file for displaying the sidebar.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

/**
 * Check if the sidebar-1 has widgets.
 */
if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	<aside class="sidebar" role="complementary">
		<h2 class="screen-reader-text"><?php _e( 'Sidebar', 'rindby' ); ?></h2>
		<div class="sidebar-content">
			<?php
			/**
			 * Display the widget area.
			 */
			dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</aside>
<?php }
