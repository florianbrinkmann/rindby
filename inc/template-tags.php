<?php
/**
 * Functions, directly called from template files.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

if ( ! function_exists( 'rindby_the_branding' ) ) {
	/**
	 * Display the site’s title and description.
	 */
	function rindby_the_branding() {
		/**
		 * Wrap title into h1 if we are on front page with blog posts.
		 */
		if ( ( is_front_page() && is_home() ) ) { ?>
			<h1 class="site-title">
				<?php
				/**
				 * Check if we are not on the first blog page on the front page
				 * and output a home link.
				 */
				if ( is_paged() ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php }
					/**
					 * Display blog title.
					 */
					bloginfo( 'name' );
					if ( is_paged() ) { ?>
				</a>
			<?php } ?>
			</h1>
		<?php } else { ?>
			<p class="site-title">
				<?php
				/**
				 * Only link title if not on front page.
				 */
				if ( ! is_front_page() ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php }

					/**
					 * Display blog title.
					 */
					bloginfo( 'name' );
					if ( ! is_front_page() ) { ?>
				</a>
			<?php } ?>
			</p>
		<?php } // End if().

		/**
		 * Get blog description.
		 */
		$description = get_bloginfo( 'description' );

		/**
		 * Check if we have a description.
		 */
		if ( "" !== $description ) {
			/**
			 * Display the description.
			 */
			printf( '<p class="site-description">%s</p>', $description );
		}
	}
} // End if().

if ( ! function_exists( 'rindby_the_posts_pagination' ) ) {
	/**
	 * Displays the posts pagination.
	 */
	function rinbdy_the_posts_pagination() {
		/**
		 * Display the posts pagination.
		 */
		the_posts_pagination(
			[
				'type'      => 'list',
				'prev_text' => sprintf(
					'<span class="screen-reader-text">%s</span><span aria-hidden="true">«</span>',
					__( 'Previous', 'rindby' )
				),
				'next_text' => sprintf(
					'<span class="screen-reader-text">%s</span><span aria-hidden="true">»</span>',
					__( 'Next', 'rindby' )
				)
			]
		);
	}
} // End if().

if ( ! function_exists( 'rindby_link_pages' ) ) {
	/**
	 * Display the post pagination.
	 */
	function rindby_link_pages() {
		/**
		 * Display the post pagination.
		 */
		wp_link_pages(
			[
				'before' => '<div class="page-link"><span>' . __( 'Pages:', 'rindby' ) . '</span>',
				'after'  => '</div>',
			]
		);
	}
} // End if().


if ( ! function_exists( 'rindby_the_posts_pagination' ) ) {
	/**
	 * Displays a pagination for archive pages.
	 */
	function rindby_the_posts_pagination() {
		the_posts_pagination( [
			'type'      => 'list',
			'prev_text' => sprintf(
				'<span class="screen-reader-text">%s</span><span aria-hidden="true">«</span>',
				/* translators: screen reader label for »Previous« link of posts navigation */
				__( 'Previous', 'photographus' )
			),
			'next_text' => sprintf(
				'<span class="screen-reader-text">%s</span><span aria-hidden="true">»</span>',
				/* translators: screen reader label for »Next« link of posts navigation */
				__( 'Next', 'photographus' )
			),
		] );
	}
}

if ( ! function_exists( 'rindby_the_reaction_count' ) ) {
	/**
	 * Display number for comments or trackbacks, depending on the parameter.
	 */
	function rindby_the_reaction_count() {
		/**
		 * Get the post reactions, separated by type.
		 */
		$comments_by_type = rindby_get_comments_by_type();

		/**
		 * Save the permalink.
		 */
		$permalink = get_the_permalink();

		/**
		 * Check if we have comments.
		 */
		if ( $comments_by_type['comment'] ) {
			/**
			 * Count the comments.
			 */
			$comment_number = count( $comments_by_type['comment'] );

			/**
			 * Display the comment count, linked to the comments area.
			 */
			printf(
				' · <a href="%s#comments-title">%s</a>',
				$permalink,
				sprintf(
					_n(
						'%s Comment',
						'%s Comments',
						$comment_number,
						'rindby'
					),

					/**
					 * Format the comment count depending on the install locale.
					 */
					number_format_i18n( $comment_number )
				)
			);
		} // End if().

		/**
		 * Check if we have pings.
		 */
		if ( $comments_by_type['pings'] ) {
			/**
			 * Count the pings.
			 */
			$pings_number = count( $comments_by_type['pings'] );

			/**
			 * Display the pings count, linked to the comment area.
			 */
			printf(
				' · <a href="%s#trackbacks-title">%s</a>',
				$permalink,
				sprintf(
					_n(
						'%s Trackback',
						'%s Trackbacks',
						$pings_number,
						'rindby'
					),

					/**
					 * Format the pings count depending on the install locale.
					 */
					number_format_i18n( $pings_number )
				)
			);
		} // End if().
	}
} // End if().

if ( ! function_exists( 'rindby_get_comments_by_type' ) ) {
	/**
	 * Returns the comments separated by type (comments and pingbacks).
	 *
	 * @return array Post reactions separated by type.
	 */
	function rindby_get_comments_by_type() {
		/**
		 * Build argument array.
		 */
		$comment_args = [
			'order'   => 'ASC',
			'orderby' => 'comment_date_gmt',
			'status'  => 'approve',
			'post_id' => get_the_ID(),
		];

		/**
		 * Get the comments.
		 */
		$comments = get_comments( $comment_args );

		/**
		 * Separate them.
		 */
		$comments_by_type = separate_comments( $comments );

		return $comments_by_type;
	}
}

if ( ! function_exists( 'rindby_the_date' ) ) {
	/**
	 * Displays the date of a post.
	 *
	 * @param bool $link true if date should be linked to single view,
	 *                   false if not.
	 */
	function rindby_the_date( $link = true ) {
		/**
		 * Save the date.
		 */
		$date_markup = get_the_date();

		/**
		 * Check if the date should be linked to the single view.
		 */
		if ( true === $link ) {
			/**
			 * Wrap the date into a link.
			 */
			$date_markup = sprintf(
				'<a href="%s">%s</a>',

				/**
				 * Get the permalink to the post.
				 */
				get_the_permalink(),
				$date_markup
			);
		} // End if().

		echo $date_markup;
	}
} // End if().

if ( ! function_exists( 'rindby_the_content' ) ) {
	/**
	 * Display content with improved read more link.
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
} // End if().

/**
 * Display meta data for post.
 */
function rindby_footer_meta() {
	/**
	 * Get the categories list.
	 */
	$categories_list = get_the_category_list( ', ' );

	/**
	 * Get the tags list.
	 */
	$tag_list = get_the_tag_list( /* translators: text before list of tags in post meta */
		__( ' Tags: ', 'rindby' ),
		', '
	);

	/**
	 * Build footer meta sentence.
	 */
	printf( /* translators: 1=categories list; 2=author name; 3=tag list with */
		__( 'Published in %1$s by %2$s.%3$s', 'rindby' ),
		$categories_list,
		get_the_author(),
		$tag_list
	);
}

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own rindby_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @param object $comment Comment object.
 * @param array  $args    Argument array.
 * @param int    $depth   Comment thread depth.
 */
function rindby_comments( $comment, $args, $depth ) { ?>
<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-meta comment-author vcard">
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
		</div>
		<?php if ( '0' == $comment->comment_approved ) { ?>
			<p class="comment-awaiting-moderation">Dein Kommentar wartet auf Moderation.</p>
		<?php } ?>
		<div class="comment-content">
			<?php comment_text(); ?>
			<?php edit_comment_link( __( '(Edit)', 'rindby' ), '<p class="edit-link">', '</p>' ); ?>
		</div>
		<div class="reply">
			<?php comment_reply_link(
				array_merge( $args,
					[
						'reply_text' => __( 'Reply', 'rindby' ),
						'depth'      => $depth,
						'max_depth'  => $args['max_depth']
					]
				)
			); ?>
		</div>
	</div>
	<?php
}
