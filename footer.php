<?php
/**
 * Footer template.
 *
 * @version 1.1.4
 *
 * @package Rindby
 */

?>
<footer id="footer">
	<?php
	/**
	 * Display the menu from the footer-menu theme location.
	 */
	wp_nav_menu(
		[
			'theme_location' => 'footer-menu',
			'depth'          => 1,
		]
	); ?>
	<p class="theme-author"><?php
		/**
		 * Display theme author hint.
		 */
		printf(
			__( 'Theme: Rindby by %s', 'rindby' ),
			sprintf(
				'<a rel="nofollow" href="%s">Florian Brinkmann</a>',
				__( 'https://florianbrinkmann.com/en/', 'rindby' )
			)
		); ?></p>
</footer>
</div>
<?php
/**
 * Run the wp_footer action, which is used by plugins to enqueue scripts, et cetera.
 */
wp_footer(); ?>
</body>
</html>
