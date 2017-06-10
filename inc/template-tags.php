<?php
/**
 * Functions, directly called from template files.
 *
 * @version 1.1.4
 *
 * @package Rindby
 */

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

/**
 * Display number for comments or trackbacks, depending on the parameter
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
			'| <a href="%s#comments-title">%s</a>',
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
			'| <a href="%s#trackbacks-title">%s</a>',
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

if ( ! function_exists( 'rindby_get_comments_by_type' ) ) {
	/**
	 * Returns the comments separated by type (comments and pingbacks).
	 *
	 * @return array Post reactions reparated by type.
	 */
	function rindby_get_comments_by_type() {
		$comment_args     = [
			'order'   => 'ASC',
			'orderby' => 'comment_date_gmt',
			'status'  => 'approve',
			'post_id' => get_the_ID(),
		];
		$comments         = get_comments( $comment_args );
		$comments_by_type = separate_comments( $comments );

		return $comments_by_type;
	}
}

if ( ! function_exists( 'rindby_the_date' ) ) {
	/**
	 * Returns the date of a post.
	 *
	 * @param bool $link true if date should be linked to single view,
	 *                   false if not.
	 *
	 * @return string
	 */
	function rindby_the_date( $link = true ) {
		/**
		 * Save the date.
		 */
		$date_markup = sprintf(
			__( '%1$s @ %2$s', 'rindby' ),

			/**
			 * Get the date of the post.
			 */
			get_the_date(),

			/**
			 * Get the time of the post.
			 */
			get_the_time()
		);

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
