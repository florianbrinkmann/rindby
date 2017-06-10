<?php

/**
 * Add theme support for feed links, title tag, post formats, Post thumbnails and html5.
 * Sets content width
 */
function rindby_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats',
		[
			'aside',
			'link',
			'gallery',
			'status',
			'quote',
			'image',
			'video',
			'audio',
			'chat',
		]
	);
	add_theme_support( 'html5',
		[
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		] );
	add_theme_support( 'post-thumbnails' );

	/**
	 * Set content width
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 1147;
	}
}

add_action( 'after_setup_theme', 'rindby_setup' );

/**
 * Enqueue scripts and styles
 */
function rindby_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'rindby-style', get_template_directory_uri() . '/css/rindby.css', [], null );
	wp_enqueue_style( 'rindby-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i', [], null );
}

add_action( 'wp_enqueue_scripts', 'rindby_scripts_styles' );

/**
 * Register menus
 */
function rindby_menus() {
	register_nav_menus(
		[
			'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu',
		]
	);
}

add_action( 'init', 'rindby_menus' );

/**
 * Register sidebar
 */
function rindby_register_sidebars() {
	register_sidebar(
		[
			'name'          => __( 'Sidebar', 'rindby' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}

add_action( 'widgets_init', 'rindby_register_sidebars' );

/**
 * Remove #more-hash from read more link to prevent the page jump
 *
 * @param $link
 *
 * @return mixed
 */
function rindby_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end - $offset );
	}

	return $link;
}

add_filter( 'the_content_more_link', 'rindby_remove_more_jump_link' );

/**
 * Display content with improved read more link
 *
 * @return void
 */
function rindby_the_content() {
	the_content(
		sprintf(
			'<span class="screen-reader-text">%s</span><span aria-hidden="true">%s</span>',
			sprintf(
			/* translators: %s: Name of current post */
				__( 'Continue reading %s', 'rindby' ),
				the_title_attribute( [ 'echo' => false, ] )
			),
			__( 'Continue reading', 'rindby' )
		)
	);
}

/**
 * Display meta data for post
 *
 * @return void
 */
function rindby_footer_meta() {
	$categories_list = get_the_category_list( ', ' );
	/* translators: text before list of tags in post meta */
	$tag_list = get_the_tag_list( __( ' Tags: ', 'rindby' ), ', ' );
	/* translators: 1=categories list; 2=author name; 3=tag list with */
	printf( __( 'Published in %1$s by %2$s.%3$s', 'rindby' ), $categories_list, get_the_author(), $tag_list );
}

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own rindby_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function rindby_comments( $comment, $args, $depth ) { ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="comment">
		<header class="comment-meta comment-author vcard">
			<?php
			echo get_avatar( $comment, 60 );
			printf( '<p><cite class="fn">%1$s</cite>',
				get_comment_author_link()
			);
			printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a></p>',
				esc_url( get_comment_link( $comment->comment_ID ) ),
				get_comment_time( 'c' ),
				/* translators: Comment date. 1=date, 2=time */
				sprintf( __( '%1$s @ %2$s', 'rindby' ), get_comment_date(), get_comment_time() )
			);
			?>
		</header>
		<?php if ( '0' == $comment->comment_approved ) { ?>
			<p class="comment-awaiting-moderation">Dein Kommentar wartet auf Moderation.</p>
		<?php } ?>
		<section class="comment-content comment">
			<?php comment_text(); ?>
			<?php edit_comment_link( __( '(Edit)', 'rindby' ), '<p class="edit-link">', '</p>' ); ?>
		</section>
		<div class="reply">
			<?php comment_reply_link(
				array_merge( $args,
					[
						'reply_text' => __( 'Reply', 'rindby' ),
						'after'      => ' <span>&darr;</span>',
						'depth'      => $depth,
						'max_depth'  => $args['max_depth']
					]
				)
			); ?>
		</div>
	</article>
	<?php
}

/**
 * Adds no-sidebar class to body element if sidebar-1 is not active
 *
 * @param $classes
 *
 * @return array
 */
function rindby_filter_body_class( $classes ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter( 'body_class', 'rindby_filter_body_class' );

/**
 * Include the inc/template-tags.php.
 */
include( locate_template( 'inc/template-tags.php' ) );

/**
 * Include the inc/template-functions.php.
 */
include( locate_template( 'inc/template-functions.php' ) );
