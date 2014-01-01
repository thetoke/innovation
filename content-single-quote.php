<?php
/**
 * @package innovation_ajax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<h1 class="entry-title" data-bgi="<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>"><?php echo get_the_content(); ?></h1>
		<h2 class="entry-subtitle" data-bgi="<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>"> &mdash; <?php echo get_the_subtitle(); ?></h1>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
