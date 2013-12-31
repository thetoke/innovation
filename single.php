<?php
/**
 * The Template for displaying all single posts.
 *
 * @package innovation_ajax
 */
if ($_GET['ajax'] == 1) : ?>
	<script>setTitle("<?php wp_title( '|', true, 'right' ); ?>");</script>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>

<?php else : ?>
<?php get_header(); ?>
<div class="frame">
	<?php get_sidebar(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main animated" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
<?php endif; ?>
