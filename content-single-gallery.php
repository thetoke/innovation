<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'single', 'header' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<div class="pretty-embed">
			<iframe src="https://embed.spotify.com/?uri=<?php echo get_post_meta($post->ID, 'spotify_playlist_id', true); ?>&view=coverart" width="600" height="600" frameborder="0" allowtransparency="true"></iframe>
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


