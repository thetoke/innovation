<?php
/**
 * @package innovation_ajax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'single', 'header' ); ?>

	<div class="entry-content">
		<div class="pretty-embed">
			<iframe src="//www.youtube.com/embed/<?php echo get_the_content(); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'innovation_ajax' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'single', 'footer' ); ?>
</article><!-- #post-## -->
<?php innovation_ajax_post_nav(); ?>
