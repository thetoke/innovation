<footer class="entry-meta">
	<div class="entry-meta">
		<?php innovation_ajax_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'innovation_ajax' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'innovation_ajax' ) );

		if ( ! innovation_ajax_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = __( 'Tagged: %2$s <br /><br />Bookmark the <a href="%3$s" rel="bookmark">permalink</a>', 'innovation_ajax' );
			} else {
				$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>', 'innovation_ajax' );
			}

		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = __( 'Categories: %1$s <br /><br />Tagged: %2$s <br /><br />Bookmark the <a href="%3$s" rel="bookmark">permalink</a>', 'innovation_ajax' );
			} else {
				$meta_text = __( 'Categories: %1$s <br /><br />Bookmark this: <a href="%3$s" rel="bookmark">Permalink</a>', 'innovation_ajax' );
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
