<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_header_css = $unitravel_header_image = '';
$unitravel_header_video = unitravel_get_header_video();
if (true || empty($unitravel_header_video)) {
	$unitravel_header_image = get_header_image();
	if (unitravel_is_on(unitravel_get_theme_option('header_image_override')) && apply_filters('unitravel_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($unitravel_cat_img = unitravel_get_category_image()) != '')
				$unitravel_header_image = $unitravel_cat_img;
		} else if (is_singular() || unitravel_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$unitravel_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($unitravel_header_image)) $unitravel_header_image = $unitravel_header_image[0];
			} else
				$unitravel_header_image = '';
		}
	}
}

?><header class="top_panel top_panel_default<?php
					echo !empty($unitravel_header_image) || !empty($unitravel_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($unitravel_header_video!='') echo ' with_bg_video';
					if ($unitravel_header_image!='') echo ' '.esc_attr(unitravel_add_inline_css_class('background-image: url('.esc_url($unitravel_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (unitravel_is_on(unitravel_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(unitravel_is_inherit(unitravel_get_theme_option('header_scheme')) 
													? unitravel_get_theme_option('color_scheme') 
													: unitravel_get_theme_option('header_scheme'));
					?>"><?php

	// Background video
	if (!empty($unitravel_header_video)) {
		get_template_part( 'templates/header-video' );
	}
	
	// Main menu
	if (unitravel_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	if (false) get_template_part( 'templates/header-single' );

?></header>