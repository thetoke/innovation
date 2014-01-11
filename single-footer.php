<footer class="entry-meta">
<hr />
	<span class="posted-on"><?php innovation_ajax_posted_on(); ?></span>
	<br />
	<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'innovation_ajax' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'innovation_ajax' ) );

		if ( ! innovation_ajax_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = __( '<span>Tagged: %2$s </span><br /><span>Bookmark the <a href="%3$s" rel="bookmark">permalink</a></span>', 'innovation_ajax' );
			} else {
				$meta_text = __( '<span>Bookmark the <a href="%3$s" rel="bookmark">permalink</a></span>', 'innovation_ajax' );
			}

		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( '<span>Categories: %1$s</span><br /><span>Tagged: %2$s</span><span>Bookmark the <a href="%3$s" rel="bookmark">permalink</a></span>', 'innovation_ajax' );
			} else {
				$meta_text = __( '<span>Categories: %1$s</span><br /><span>Bookmark this: <a href="%3$s" rel="bookmark">Permalink</a></span>', 'innovation_ajax' );
			}

		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);
	?>
</footer><!-- .entry-meta -->
