<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr(unitravel_get_theme_option('menu_mobile_fullscreen') > 0 ? 'fullscreen' : 'narrow'); ?>">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a><?php

		// Logo
		set_query_var('unitravel_logo_args', array('type' => 'inverse'));
		get_template_part( 'templates/header-logo' );
		set_query_var('unitravel_logo_args', array());

		// Mobile menu
		$unitravel_menu_mobile = unitravel_get_nav_menu('menu_mobile');
		if (empty($unitravel_menu_mobile)) {
			$unitravel_menu_mobile = apply_filters('unitravel_filter_get_mobile_menu', '');
			if (empty($unitravel_menu_mobile)) $unitravel_menu_mobile = unitravel_get_nav_menu('menu_main');
			if (empty($unitravel_menu_mobile)) $unitravel_menu_mobile = unitravel_get_nav_menu();
		}
		if (!empty($unitravel_menu_mobile)) {
			if (!empty($unitravel_menu_mobile))
				$unitravel_menu_mobile = str_replace(
					array('menu_main', 'id="menu-', 'sc_layouts_menu_nav', 'sc_layouts_hide_on_mobile', 'hide_on_mobile'),
					array('menu_mobile', 'id="menu_mobile-', '', '', ''),
					$unitravel_menu_mobile
					);
			if (strpos($unitravel_menu_mobile, '<nav ')===false)
				$unitravel_menu_mobile = sprintf('<nav class="menu_mobile_nav_area">%s</nav>', $unitravel_menu_mobile);
			unitravel_show_layout(apply_filters('unitravel_filter_menu_mobile_layout', $unitravel_menu_mobile));
		}

		?>
	</div>
</div>
