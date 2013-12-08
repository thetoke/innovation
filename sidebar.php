<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package innovation_ajax
 */

$menu = array(
		'theme_location'  => '',
		'menu'            => 'sidebar',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => 'primary_nav',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new innovation_ajax_walker_nav_menu()
	);

?>
<div id="secondary" class="widget-area" role="complementary">
	<aside id="nav_menu-2" class="widget widget_nav_menu">
		<h1 class="widget-title"><span class="logo"><span class="stripe blue"></span><span class="stripe green"></span><span class="stripe yellow"></span><span class="stripe orange"></span></span>Mash the Keyboard</h1>
		<div class="menu-sidebar-container">
			<?php wp_nav_menu( $menu ); ?>
		</div>
	</aside>

<?php $categories = array(
	'show_option_all'    => '',
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 0,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => __( '' ),
	'show_option_none'   => __('No categories'),
	'number'             => null,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => new innovation_ajax_walker_category_menu()
); ?>
	<aside id="categories-3" class="widget widget_categories">
		<h3>Services</h3>
		<div class="menu-sidebar-container">
			<ul id="menu-sidebar" class="menu list-unstyled">
				<?php wp_list_categories( $categories ); ?>
			</ul>
		</div>
	</aside>
</div><!-- #secondary -->
