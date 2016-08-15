<?php
/**
 * Template for 404 error
 *
 * @version 1.0
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
					<?php get_search_form(); ?>
				</div>
			</article>
		</div>
	</main>
<?php get_sidebar();
get_footer(); ?>