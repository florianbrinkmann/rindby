<?php
/**
 * Page template.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

/**
 * Include header.php.
 */
get_header(); ?>
	<main role="main" class="main">
		<?php
		/**
		 * Check if we have a page.
		 */
		while ( have_posts() ) {
			/**
			 * Setup data of page.
			 */
			the_post();

			/**
			 * Include partials/content-page.php.
			 */
			get_template_part( 'partials/content', 'page' );

			/**
			 * Include comments.php.
			 */
			comments_template();
		} // End while(). ?>
	</main>
<?php
/**
 * Include sidebar.php.
 */
get_sidebar();

/**
 * Include footer.php.
 */
get_footer();
