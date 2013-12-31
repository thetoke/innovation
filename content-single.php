<?php

if (function_exists('get_post_format')):

	$post_formats = get_theme_support( 'post-formats' );
	$post_format = get_post_format($post->ID);

	if (in_array($post_format, $post_formats[0])):
		get_template_part( 'content', 'single-'.$post_format );
	else:
		get_template_part( 'content', 'single-standard' );
	endif;
else:
	get_template_part( 'content', 'single-standard' );
endif;

?>
