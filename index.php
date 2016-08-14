<?php get_header(); ?>
	<main role="main" id="main">
		<?php if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_format() );
			}
			the_posts_pagination( array(
				'type'      => 'list',
				'prev_text' => '«',
				'next_text' => '»',
			) );
		} else {
			get_template_part( 'content', 'none' );
		} ?>
	</main>
<?php get_sidebar();
get_footer(); ?>