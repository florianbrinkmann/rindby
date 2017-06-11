<?php
/**
 * Template file for displaying a single post
 *
 * @version 1.0
 */
get_header(); ?>
	<main role="main" id="main">
		<?php while ( have_posts() ) {
			the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php if ( 'post' == get_post_type() ) { ?>
						<div class="entry-meta">
							<?php rindby_the_date(); ?>
						</div>
					<?php } ?>
				</header>
				<div class="entry-content">
					<?php the_post_thumbnail( 'large' );
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-link"><span>' . __( 'Pages:', 'rindby' ) . '</span>',
						'after'  => '</div>'
					) ); ?>
				</div>
			</article>
			<div id="author-info" class="clearfix">
				<div id="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 92 ); ?>
				</div>
				<div id="author-description">
					<h2><?php /* translators: s=author name */
						printf( __( 'About %s', 'rindby' ), get_the_author() ); ?></h2>
					<p><?php the_author_meta( 'description' ); ?></p>

				</div>
			</div>
			<?php the_post_navigation();
			comments_template( '', true );
		} ?>
	</main>
<?php get_sidebar();
get_footer();