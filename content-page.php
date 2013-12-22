<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package innovation_ajax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title" style="background-image: url(<?php echo (get_post_thumbnail_id( $post->ID )) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : print_backup_image_url() ; ?>)"><?php the_title(); ?></h1>
		<h2 class="entry-subtitle"><?php the_subtitle(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'innovation_ajax' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'innovation_ajax' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
