<?php
/**
 * Template part for normal posts
 *
 * @version 1.1.4
 *
 * @package Rindby
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<p class="entry-meta">
			<?php
			/**
			 * Display date and time of the post, linked to the single view.
			 */
			rindby_the_date();

			/**
			 * Display comment and trackback counts.
			 */
			rindby_the_reaction_count(); ?>
		</p>
	</header><!-- .entry-header -->
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
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<p><?php
			/**
			 * Display the footer meta.
			 */
			rindby_footer_meta(); ?></p>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
