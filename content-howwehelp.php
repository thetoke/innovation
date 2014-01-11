<?php $paged = query_posts('category_name='.get_post_meta($post->ID, 'category_to_pull', true)); ?>
	<div class="howwehelp-container">
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'content', 'preview' ); ?>
	<?php endwhile; ?>
		<div class="clearfix"></div>
	</div>
