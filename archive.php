<?php
/**
 * Template for archives like categories, tags
 *
 * @version 1.0.3
 */
get_header(); ?>
    <main role="main" id="main">
		<?php if ( have_posts() ) { ?>
            <header class="archive-header">
                <h1>
					<?php the_archive_title(); ?>
                </h1>
            </header>
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_format() );
			}
			the_posts_pagination( array(
				'type'      => 'list',
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			) );
		} else {
			get_template_part( 'content', 'none' );
		}
		?>
    </main>
<?php
get_sidebar();
get_footer(); ?>