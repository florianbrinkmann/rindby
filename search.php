<?php
/**
 * Template for search results.
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
				<h1 class="archive-title">
					<?php printf( __( 'Search results for: %s', 'rindby' ), get_search_query() ); ?>
				</h1>
			</header>
			<?php
			/**
			 * Loop the posts.
			 */
			while ( have_posts() ) {
				/**
				 * Setup post.
				 */
				the_post();

				/**
				 * Include partial for displaying post content.
				 */
				get_template_part( 'partials/content', get_post_format() );
			} // End while().

			/**
			 * Display posts pagination.
			 */
			rindby_the_posts_pagination();
		} else { ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php /* translators: s=search query */
					printf( __( 'Nothing found for %s', 'rindby' ), get_search_query() ); ?>
				</h1>
			</header>
			<?php
			/**
			 * Display search form.
			 */
			get_search_form();
		} // End if(). ?>
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
