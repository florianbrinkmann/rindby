<?php
/**
 * Displays page content.
 *
 * @version 2.0.0
 *
 * @package Rindby
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="entry-content">
		<?php
		/**
		 * Display the content.
		 */
		rindby_the_content();

		/**
		 * Display page pagination.
		 */
		rindby_link_pages(); ?>
	</div>
</article>
