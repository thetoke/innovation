<article class="post-preview">
	<a href="<?php the_permalink(); ?>" class="ajax">
		<div class="img-container">
			<img src="<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>" />
		</div>
		<header><?php the_title(); ?></header>
	</a>
</article>
