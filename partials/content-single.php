<?php
/**
 * Template part for single view of posts.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<p class="entry-meta">
			<?php
			/**
			 * Display date and time of the post, linked to the single view.
			 */
			rindby_the_date( false );

			/**
			 * Display comment and trackback counts.
			 */
			rindby_the_reaction_count(); ?>
		</p>
	</header>
	<div class="entry-content">
		<?php
		/**
		 * Display the post thumbnail.
		 */
		the_post_thumbnail( 'large' );

		/**
		 * Display the content.
		 */
		rindby_the_content();

		/**
		 * Display post pagination.
		 */
		rindby_link_pages(); ?>
	</div>
	<footer class="entry-meta">
		<p><?php
			/**
			 * Display the footer meta.
			 */
			rindby_footer_meta(); ?></p>
	</footer>
</article>
