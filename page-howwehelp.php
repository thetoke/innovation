<?php
/*
Template Name: How We Help page designs
*/
?>

<?php if ($_GET['ajax'] == 1) : ?>
<script>setTitle("<?php wp_title( '|', true, 'right' ); ?>");</script>
<?php get_template_part( 'content', 'page' ); ?>
<?php get_template_part( 'content', 'howwehelp' ); ?>

<?php else: ?>

<?php get_header(); ?>

<div class="frame">
	<?php get_sidebar(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main animated" role="main">
			<?php get_template_part( 'content', 'page' ); ?>
			<?php get_template_part( 'content', 'howwehelp' ); ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>

<?php endif; ?>
