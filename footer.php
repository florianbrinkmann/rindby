<?php
/**
 * Footer template
 *
 * @version 1.0.4
 */
?>
<footer id="footer">
	<?php wp_nav_menu( array(
		'theme_location' => 'footer-menu',
		'depth'          => 1
	) ); ?>
    <p class="theme-author"><?php printf(
			__( 'Theme: Rindby by %s', 'rindby' ),
			sprintf( '<a rel="nofollow" href="%s">Florian Brinkmann</a>',
				esc_url( __( 'https://en.florianbrinkmann.de', 'rindby' ) ) )
		) ?></p>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>