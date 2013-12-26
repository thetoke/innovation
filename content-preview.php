<article class="post-preview">
	<a href="<?php the_permalink(); ?>" class="ajax">
		<img src="<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>" />
		<header><?php the_title(); ?></header>
		<section><?php the_content(); ?></section>
		<footer><?php the_date(); ?></footer>
	</a>
</article>
