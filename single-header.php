<header class="entry-header">
	<h1 class="entry-title" style="background-image: url(<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>)" data-bgi="<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>"><?php the_title(); ?></h1>
	<?php edit_post_link( __( 'Edit', 'innovation_ajax' ), '<span class="edit-link">', '</span>' ); ?>
</header><!-- .entry-header -->
