<?php
/*
Template Name: How We Help page designs
*/
?>

<?php if ($_GET['ajax'] == 1) : ?>
	<script>setTitle("<?php echo html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'); ?> | Mash the Keyboard"); setBodyClass('<?php echo implode(" ", get_body_class()); ?>');</script>
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
