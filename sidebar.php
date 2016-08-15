<?php
/**
 * Template file for displaying the sidebar
 *
 * @version 1.0
 */
if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	<aside id="sidebar" role="complementary">
		<h2 class="screen-reader-text"><?php _e( 'Sidebar', 'rindby' ); ?></h2>
		<div id="sidebar-content">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</aside>
<?php }