<?php
/**
 * innovation_ajax functions and definitions
 *
 * @package innovation_ajax
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'innovation_ajax_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function innovation_ajax_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on innovation_ajax, use a find and replace
	 * to change 'innovation_ajax' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'innovation_ajax', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'innovation_ajax' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'innovation_ajax_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // innovation_ajax_setup
add_action( 'after_setup_theme', 'innovation_ajax_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function innovation_ajax_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'innovation_ajax' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'innovation_ajax_widgets_init' );

if ( ! function_exists( 'prevent_widows' ) )
{
	/**
	 * Replaces the last white space in $str with a no break space.
	 *
	 * @param  string $str
	 * @return $str
	 */
	function prevent_widows( $str, $last_words_max_length = 11 )
	{
			$pos = strrpos( $str, ' ' );

			if ( $pos === FALSE || strlen( $str ) - $pos > $last_words_max_length )
			{ // Nothing to do.
					return $str;
			}
			// U+00A0 NO-BREAK SPACE == C2 A0 in UTF-8
			// @see http://www.fileformat.info/info/unicode/char/00a0/index.htm
			return substr_replace( $str, "\xC2\xA0", $pos, 1 );
	}
}
add_filter( 'the_title', 'prevent_widows' );


/**
 * Enqueue scripts and styles.
 */
function innovation_ajax_scripts() {
	wp_enqueue_style( 'innovation_ajax-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'innovation_ajax-style', get_stylesheet_uri() );
	wp_enqueue_script( 'innovation_ajax-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '20120206', true );
	wp_enqueue_script( 'innovation_ajax-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20130115', true );
	wp_enqueue_script( 'innovation_ajax-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'innovation_ajax-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'innovation_ajax-js', get_template_directory_uri() . '/js/innovation_ajax.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'innovation_ajax_scripts' );

require get_template_directory().'/inc/nav-walker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
