<?php
/**
 * Template for archives like categories, tags.
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
		if ( have_posts() ) { ?>
			<header class="archive-header">
				<h1>
					<?php
					/**
					 * Display the archive title.
					 */
					the_archive_title();

					/**
					 * Display the archive description.
					 */
					the_archive_description( '<p>', '</p>' );
					?>
				</h1>
			</header>
			<?php
			/**
			 * Loop through the posts.
			 */
			while ( have_posts() ) {
				/**
				 * Setup post.
				 */
				the_post();

				/**
				 * Include template partial (default content.php).
				 */
				get_template_part( 'partials/content', get_post_format() );
			} // End while().

			/**
			 * Display the posts pagination.
			 */
			rinbdy_the_posts_pagination();
		} else {
			/**
			 * Display the content-none.php if we have no posts.
			 */
			get_template_part( 'partials/content', 'none' );
		} // End if().
		?>
	</main>
<?php
/**
 * Include the sidebar.php.
 */
get_sidebar();

/**
 * Include the footer.php.
 */
get_footer();
