<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package innovation_ajax
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function innovation_ajax_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'innovation_ajax_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function innovation_ajax_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'innovation_ajax_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function innovation_ajax_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'innovation_ajax' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'innovation_ajax_wp_title', 10, 2 );

class Flickr {
	private $apiKey = '6f4c4d7fe35166effc5017a5bf59222c';
	private $secret = 'c336f186beab8628';

	public function __construct() {

	}

	public function search($query = null, $limit = 1) {
			$search1 = 'http://api.flickr.com/services/rest/?method=flickr.groups.pools.getPhotos&api_key=' . $this->apiKey . '&group_id=91264491@N00&text=' . urlencode($query) . '&per_page='.$limit.'&format=php_serial';
			$result1 = file_get_contents($search1);
			$result1 = unserialize($result1);
			foreach($result1['photos']['photo'] as $photo) {
					$search2 = 'http://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=' . $this->apiKey . '&photo_id='.$photo["id"].'&format=php_serial';
			}
			$result2 = file_get_contents($search2);
			$result2 = unserialize($result2);
			return $result2;
	}
}

function return_random_flickr_photo($query, $encode = false) {
		$Flickr = new Flickr;
		$data = $Flickr->search($query, 1);
		foreach ($data["sizes"]["size"] as $photo) {
				if ($photo['width'] <= 4000 || $photo['height'] <= 2000){
						$im = $photo['source'];
				}
		}

		if ($encode) {
				$im = file_get_contents($photo['source']);
				$imdata = base64_encode($im);
				$im = "data:image/jpeg;base64,".$imdata;
		}

		return $im;
}

function print_backup_image_url( ) {
	return return_random_flickr_photo('minimalism');
}

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 20 );
