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
	<h1 class="widget-title"><span class="logo"><span class="stripe blue"></span><span class="stripe green"></span><span class="stripe yellow"></span><span class="stripe orange"></span></span>Mash the Keyboard</h1>

	<aside id="nav_menu-2" class="widget widget_nav_menu">
		<div class="menu-sidebar-container">
			<?php wp_nav_menu( $menu ); ?>
		</div>
	</aside>

<?php $menu['menu'] = 'howwehelp'; ?>
	<aside id="categories-3" class="widget widget_categories">
		<h3>How we help</h3>
		<div class="menu-sidebar-container">
			<?php wp_nav_menu( $menu ); ?>
		</div>
	</aside>
</div><!-- #secondary -->
