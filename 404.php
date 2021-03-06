<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package innovation_ajax
 */

if ($_GET['ajax'] == 1) : ?>
	<script>setTitle("<?php echo html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'); ?> | Mash the Keyboard"); setBodyClass('<?php echo implode(" ", get_body_class()); ?>');</script>
	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'innovation_ajax' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'innovation_ajax' ); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

<?php else :

get_header(); ?>

<div class="frame">
	<?php get_sidebar(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'innovation_ajax' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
<?php endif; ?>
