<?php
/**
 * Template part for normal posts
 *
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<p class="entry-meta">
			<a href="<?php the_permalink(); ?>"><?php rindby_the_date(); ?></a>
			<?php rindby_get_comment_and_trackback_count(); ?>
		</p>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_post_thumbnail( 'large' );
		rindby_the_content();
		wp_link_pages( array(
			'before' => '<div class="page-link"><span>' . __( 'Pages:', 'rindby' ) . '</span>',
			'after'  => '</div>'
		) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<p><?php rindby_footer_meta(); ?></p>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->