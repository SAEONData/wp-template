<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage SAEON
 * @since 1.0.0
 */

?>

	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container'       => 'nav',
			'container_class' => 's-nav',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'menu_id'         => '',
			'menu_class'      => '',
			'depth'           => 0,
			'link_before'     => '',
			'link_after'      => '',
			'fallback_cb'     => '',
		)
	);
	?>

