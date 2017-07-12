<?php
/**
 * Main template file.
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
			 * Loop the posts.
			 */
			while ( have_posts() ) {
				/**
				 * Setup post data.
				 */
				the_post();

				/**
				 * Include template part to display post content.
				 */
				get_template_part( 'partials/content', get_post_format() );
			} // End while().

			/**
			 * Display posts pagination.
			 */
			rindby_the_posts_pagination();
		} else {
			/**
			 * Include partials/content-none.php.
			 */
			get_template_part( 'partials/content', 'none' );
		} ?>
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
