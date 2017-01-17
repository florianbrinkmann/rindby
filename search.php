<?php
/**
 * Template for search results
 *
 * @version 1.0.3
 */
get_header(); ?>
    <main role="main" id="main">
		<?php if ( have_posts() ) { ?>
            <header class="archive-header">
                <h1 class="archive-title">
					<?php printf( __( 'Search results for: %s', 'rindby' ), get_search_query() ); ?>
                </h1>
            </header>
			<?php while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_format() );
			}
			the_posts_pagination( array(
				'type'      => 'list',
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			) );
		} else { ?>
            <header class="archive-header">
                <h1 class="archive-title">
					<?php /* translators: s=search query */
					printf( __( 'Nothing found for %s', 'rindby' ), get_search_query() ); ?>
                </h1>
            </header>
			<?php get_search_form();
		} ?>
    </main>
<?php
get_sidebar();
get_footer(); ?>