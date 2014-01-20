<div class="entry-social">
	<a class="btn btn-tweet" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo the_title(); ?>&url=<?php echo the_permalink(); ?>&via=@bill_riley"><b class="mtk-twitter"></b></a>
	<a class="btn btn-facebook" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>"><b class="mtk-facebook"></b></a>
	<a class="btn btn-google" target="_blank" href="https://plus.google.com/share?url=<?php echo the_permalink(); ?>"><b class="mtk-google-plus"></b></a>
	<a class="btn btn-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>&title=<?php echo the_title(); ?>&summary=<?php echo the_subtitle(); ?>&source=<?php echo the_permalink(); ?>"><b class="mtk-linkedin"></b></a>
	<a class="btn btn-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo the_permalink(); ?>&description=<?php echo the_title(); ?>&media=<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>"><b class="mtk-pinterest"></b></a>
	<?php if (true == false): ?><a class="btn btn-github" target="_blank" href="#"><b class="mtk-github"></b></a><?php endif; ?>
</div>
