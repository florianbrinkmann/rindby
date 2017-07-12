<?php
/**
 * Template file for displaying a single post.
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
		 * Check if we have posts.
		 */
		if ( have_posts() ) {
			/**
			 * Loop through them.
			 */
			while ( have_posts() ) {
				/**
				 * Setup the post data.
				 */
				the_post();

				/**
				 * Include partials/content-single.php.
				 */
				get_template_part( 'partials/content', 'single' );

				/**
				 * Include link to next and previous posts.
				 */
				the_post_navigation();

				/**
				 * Include comments.php.
				 */
				comments_template();
			} // End while().
		} else {
			/**
			 * Include partials/content-none.php.
			 */
			get_template_part( 'partials/content', 'none' );
		} // End if().
		?>
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
