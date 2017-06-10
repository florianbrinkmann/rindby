<?php
/**
 * Template for archives like categories, tags.
 *
 * @version 1.1.4
 *
 * @package Rindby
 */

/**
 * Include header.php.
 */
get_header(); ?>
	<main role="main" id="main">
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
				 * Setup post data.
				 */
				the_post();

				/**
				 * Include template partial (default content.php).
				 */
				get_template_part( 'content', get_post_format() );
			} // End while().

			/**
			 * Display the posts pagination.
			 */
			rinbdy_the_posts_pagination();
		} else {
			/**
			 * Display the content-none.php if we have no posts.
			 */
			get_template_part( 'content', 'none' );
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
