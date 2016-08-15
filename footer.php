<?php
/**
 * Footer template
 *
 * @version 1.0
 */
?>
<footer id="footer">
	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
	<p class="theme-author"><?php _e( 'Theme: Hannover by <a rel="nofollow" href="https://florianbrinkmann.de">Florian Brinkmann</a>', 'rindby' ) ?></p>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>