<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package innovation_ajax
 */
?>
		<div class="spinner">
			<div class="dot1"></div>
			<div class="dot2"></div>
			<div class="dot3"></div>
			<div class="dot4"></div>
		</div>
		<div class="konami">
			<div class="ghost">
				<div class="tail"></div>
				<div class="mouth"><div class="corners"></div></div>
				<div class="hand left"></div>
				<div class="hand right"></div>
				<div class="eye left"></div>
				<div class="eye right"></div>
			</div>
			<audio src="<?php echo get_template_directory_uri(); ?>/audio/boo_laugh.mp3" preload="auto" />
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="section">
				<h1>Privacy</h1>
			</div>
			<div class="section">
				<h1>Legal</h1>
			</div>
			<div class="section">
				<h1>712&#8209;314&#8209;4963</h1>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="<?php echo get_template_directory_uri(); ?>/js/soundmanager.js"></script>
<?php wp_footer(); ?>
</body>
</html>
