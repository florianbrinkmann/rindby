<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( ! empty( $comments_by_type['comment'] ) ) {
		$comment_number = count( $comments_by_type['comment'] ); ?>
		<h2 id="comments-title">
			<?php /* translators: Title for comment list. 1=comment number, 2=post title */
			printf( _n(
				'%1$s Comment on &ldquo;%2$s&rdquo;',
				'%1$s Comments on &ldquo;%2$s&rdquo;',
				$comment_number,
				'rindby'
			), number_format_i18n( $comment_number ),
				get_the_title() ) ?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array(
				'callback' => 'rindby_comment',
				'style'    => 'ol',
				'type'     => 'comment'
			) ); ?>
		</ol>
	<?php }
	if ( ! empty( $comments_by_type['pings'] ) ) {
		$trackback_number = count( $comments_by_type['pings'] ); ?>
		<h2 id="trackbacks-title">
			<?php printf( _n(
				'%1$s Trackback on &ldquo;%2$s&rdquo;',
				'%1$s Trackbacks on &ldquo;%2$s&rdquo;',
				$trackback_number,
				'rindby'
			), number_format_i18n( $trackback_number ), get_the_title() ) ?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array(
				'callback' => 'rindby_comment',
				'type'     => 'pings',
			) ); ?>
		</ol>
	<?php }
	the_comments_navigation();
	if ( ! comments_open() && get_comments_number() ) { ?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'rindby' ); ?></p>
	<?php }
	comment_form(); ?>

</div><!-- #comments .comments-area -->