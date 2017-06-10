<?php
/**
 * Template for 404 error.
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
	<div id="content">
		<article class="page">
			<header class="page-header">
				<h1><?php _e( 'Nothing found&hellip;', 'rindby' ) ?></h1>
			</header>
			<div class="page-content">
				<p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help find a related post.', 'rindby' ); ?></p>
				<?php
				/**
				 * Display the search form.
				 */
				get_search_form(); ?>
			</div>
		</article>
	</div>
</main>
<?php
/**
 * Include the sidebar.php.
 */
get_sidebar();

/**
 * Include the footer.php.
 */
get_footer(); ?>
