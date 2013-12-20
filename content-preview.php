<article class="post-preview">
	<a href="<?php the_permalink(); ?>" class="ajax">
		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" />
		<header><?php the_title(); ?></header>
		<section><?php the_excerpt(); ?></section>
		<footer><?php the_date(); ?></footer>
	</a>
</article>
