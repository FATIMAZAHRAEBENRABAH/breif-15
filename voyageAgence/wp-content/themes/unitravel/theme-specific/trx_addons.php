<?php
/* Theme-specific action to configure ThemeREX Addons components
------------------------------------------------------------------------------- */


/* ThemeREX Addons components
------------------------------------------------------------------------------- */

if (!function_exists('unitravel_trx_addons_theme_specific_setup1')) {
	add_action( 'after_setup_theme', 'unitravel_trx_addons_theme_specific_setup1', 1 );
	add_action( 'trx_addons_action_save_options', 'unitravel_trx_addons_theme_specific_setup1', 8 );
	function unitravel_trx_addons_theme_specific_setup1() {
		if (unitravel_exists_trx_addons()) {
			add_filter( 'trx_addons_cv_enable',				'unitravel_trx_addons_cv_enable');
			add_filter( 'trx_addons_cpt_list',				'unitravel_trx_addons_cpt_list');
			add_filter( 'trx_addons_sc_list',				'unitravel_trx_addons_sc_list');
			add_filter( 'trx_addons_widgets_list',			'unitravel_trx_addons_widgets_list');
            add_filter('trx_addons_sc_title_style', 'unitravel_specific_sc_add_title_style', 10);
		}
	}
}

// CV
if ( !function_exists( 'unitravel_trx_addons_cv_enable' ) ) {
	//Handler of the add_filter( 'trx_addons_cv_enable', 'unitravel_trx_addons_cv_enable');
	function unitravel_trx_addons_cv_enable($enable=false) {
		// To do: return false if theme not use CV functionality
		return false;
	}
}

// CPT
if ( !function_exists( 'unitravel_trx_addons_cpt_list' ) ) {
	//Handler of the add_filter('trx_addons_cpt_list',	'unitravel_trx_addons_cpt_list');
	function unitravel_trx_addons_cpt_list($list=array()) {
		// To do: Enable/Disable CPT via add/remove it in the list
        unset($list['portfolio']);
        unset($list['courses']);
        unset($list['certificates']);
        unset($list['resume']);
        unset($list['dishes']);
        unset($list['sport']);
		return $list;
	}
}

// Shortcodes
if ( !function_exists( 'unitravel_trx_addons_sc_list' ) ) {
	//Handler of the add_filter('trx_addons_sc_list',	'unitravel_trx_addons_sc_list');
	function unitravel_trx_addons_sc_list($list=array()) {
		// To do: Add/Remove shortcodes into list
		// If you add new shortcode - in the theme's folder must exists /trx_addons/shortcodes/new_sc_name/new_sc_name.php

		return $list;
	}
}

// Widgets
if ( !function_exists( 'unitravel_trx_addons_widgets_list' ) ) {
	//Handler of the add_filter('trx_addons_widgets_list',	'unitravel_trx_addons_widgets_list');
	function unitravel_trx_addons_widgets_list($list=array()) {
		// To do: Add/Remove widgets into list
		// If you add widget - in the theme's folder must exists /trx_addons/widgets/new_widget_name/new_widget_name.php
        unset($list['aboutme']);
        unset($list['banner']);
        unset($list['categories_list']);
        unset($list['flickr']);
        unset($list['popular_posts']);
        unset($list['recent_news']);
        unset($list['twitter']);
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('unitravel_trx_addons_theme_specific_setup3')) {
	add_action( 'after_setup_theme', 'unitravel_trx_addons_theme_specific_setup3', 3 );
	function unitravel_trx_addons_theme_specific_setup3() {
		
		// Section 'Courses' - settings to show 'Courses' blog archive and single posts
		if (unitravel_exists_courses()) {

			$need_lists = is_admin() && unitravel_options_need_lists();
		
			unitravel_storage_merge_array('options', '', array(
				'courses' => array(
					"title" => esc_html__('Courses', 'unitravel'),
					"desc" => wp_kses_data( __('Select parameters to display the courses pages', 'unitravel') ),
					"type" => "section"
					),
				'expand_content_courses' => array(
					"title" => esc_html__('Expand content', 'unitravel'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'unitravel') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'header_style_courses' => array(
					"title" => esc_html__('Header style', 'unitravel'),
					"desc" => wp_kses_data( __('Select style to display the site header on the courses pages', 'unitravel') ),
					"std" => 'inherit',
					"options" => !$need_lists ? array() :  unitravel_get_list_header_styles(true),
					"type" => "select"
					),
				'header_position_courses' => array(
					"title" => esc_html__('Header position', 'unitravel'),
					"desc" => wp_kses_data( __('Select position to display the site header on the courses pages', 'unitravel') ),
					"std" => 'inherit',
					"options" => !$need_lists ? array() :  unitravel_get_list_header_positions(true),
					"type" => "select"
					),
				'header_widgets_courses' => array(
					"title" => esc_html__('Header widgets', 'unitravel'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the courses pages', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'sidebar_widgets_courses' => array(
					"title" => esc_html__('Sidebar widgets', 'unitravel'),
					"desc" => wp_kses_data( __('Select sidebar to show on the courses pages', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'sidebar_position_courses' => array(
					"title" => esc_html__('Sidebar position', 'unitravel'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the courses pages', 'unitravel') ),
					"refresh" => false,
					"std" => 'left',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars_positions(true),
					"type" => "select"
					),
				'hide_sidebar_on_single_courses' => array(
					"title" => esc_html__('Hide sidebar on the single course', 'unitravel'),
					"desc" => wp_kses_data( __("Hide sidebar on the single course's page", 'unitravel') ),
					"std" => 0,
					"type" => "checkbox"
					),
				'widgets_above_page_courses' => array(
					"title" => esc_html__('Widgets above the page', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_above_content_courses' => array(
					"title" => esc_html__('Widgets above the content', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_below_content_courses' => array(
					"title" => esc_html__('Widgets below the content', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_below_page_courses' => array(
					"title" => esc_html__('Widgets below the page', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'footer_scheme_courses' => array(
					"title" => esc_html__('Footer Color Scheme', 'unitravel'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'unitravel') ),
					"std" => 'dark',
					"options" => !$need_lists ? array() :  unitravel_get_list_schemes(true),
					"type" => "select"
					),
				'footer_widgets_courses' => array(
					"title" => esc_html__('Footer widgets', 'unitravel'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'unitravel') ),
					"std" => 'footer_widgets',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'footer_columns_courses' => array(
					"title" => esc_html__('Footer columns', 'unitravel'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'unitravel') ),
					"dependency" => array(
						'footer_widgets_courses' => array('^hide')
					),
					"std" => 0,
					"options" => !$need_lists ? array() :  unitravel_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_courses' => array(
					"title" => esc_html__('Footer fullwide', 'unitravel'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'unitravel') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
		
		// Section 'Sport' - settings to show 'Sport' blog archive and single posts
		if (unitravel_exists_sport()) {
			unitravel_storage_merge_array('options', '', array(
				'sport' => array(
					"title" => esc_html__('Sport', 'unitravel'),
					"desc" => wp_kses_data( __('Select parameters to display the sport pages', 'unitravel') ),
					"type" => "section"
					),
				'expand_content_sport' => array(
					"title" => esc_html__('Expand content', 'unitravel'),
					"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'unitravel') ),
					"refresh" => false,
					"std" => 1,
					"type" => "checkbox"
					),
				'header_style_sport' => array(
					"title" => esc_html__('Header style', 'unitravel'),
					"desc" => wp_kses_data( __('Select style to display the site header on the sport pages', 'unitravel') ),
					"std" => 'inherit',
					"options" => !$need_lists ? array() :  unitravel_get_list_header_styles(true),
					"type" => "select"
					),
				'header_position_sport' => array(
					"title" => esc_html__('Header position', 'unitravel'),
					"desc" => wp_kses_data( __('Select position to display the site header on the sport pages', 'unitravel') ),
					"std" => 'inherit',
					"options" => !$need_lists ? array() :  unitravel_get_list_header_positions(true),
					"type" => "select"
					),
				'header_widgets_sport' => array(
					"title" => esc_html__('Header widgets', 'unitravel'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on the sport pages', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'sidebar_widgets_sport' => array(
					"title" => esc_html__('Sidebar widgets', 'unitravel'),
					"desc" => wp_kses_data( __('Select sidebar to show on the sport pages', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'sidebar_position_sport' => array(
					"title" => esc_html__('Sidebar position', 'unitravel'),
					"desc" => wp_kses_data( __('Select position to show sidebar on the sport pages', 'unitravel') ),
					"refresh" => false,
					"std" => 'left',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars_positions(true),
					"type" => "select"
					),
				'hide_sidebar_on_single_sport' => array(
					"title" => esc_html__('Hide sidebar on the single course', 'unitravel'),
					"desc" => wp_kses_data( __("Hide sidebar on the single course's page", 'unitravel') ),
					"std" => 0,
					"type" => "checkbox"
					),
				'widgets_above_page_sport' => array(
					"title" => esc_html__('Widgets above the page', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_above_content_sport' => array(
					"title" => esc_html__('Widgets above the content', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_below_content_sport' => array(
					"title" => esc_html__('Widgets below the content', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'widgets_below_page_sport' => array(
					"title" => esc_html__('Widgets below the page', 'unitravel'),
					"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'unitravel') ),
					"std" => 'hide',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'footer_scheme_sport' => array(
					"title" => esc_html__('Footer Color Scheme', 'unitravel'),
					"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'unitravel') ),
					"std" => 'dark',
					"options" => !$need_lists ? array() :  unitravel_get_list_schemes(true),
					"type" => "select"
					),
				'footer_widgets_sport' => array(
					"title" => esc_html__('Footer widgets', 'unitravel'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'unitravel') ),
					"std" => 'footer_widgets',
					"options" => !$need_lists ? array() :  unitravel_get_list_sidebars(true, true),
					"type" => "select"
					),
				'footer_columns_sport' => array(
					"title" => esc_html__('Footer columns', 'unitravel'),
					"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'unitravel') ),
					"dependency" => array(
						'footer_widgets_sport' => array('^hide')
					),
					"std" => 0,
					"options" => !$need_lists ? array() :  unitravel_get_list_range(0,6),
					"type" => "select"
					),
				'footer_wide_sport' => array(
					"title" => esc_html__('Footer fullwide', 'unitravel'),
					"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'unitravel') ),
					"std" => 0,
					"type" => "checkbox"
					)
				)
			);
		}
	}
}

// Add mobile menu to the plugin's cached menu list
if ( !function_exists( 'unitravel_trx_addons_menu_cache' ) ) {
	add_filter( 'trx_addons_filter_menu_cache', 'unitravel_trx_addons_menu_cache');
	function unitravel_trx_addons_menu_cache($list=array()) {
		if (in_array('#menu_main', $list)) $list[] = '#menu_mobile';
		return $list;
	}
}

// Add vars into localize array
if (!function_exists('unitravel_trx_addons_localize_script')) {
	add_filter( 'unitravel_filter_localize_script','unitravel_trx_addons_localize_script' );
	function unitravel_trx_addons_localize_script($arr) {
		$arr['alter_link_color'] = unitravel_get_scheme_color('alter_link');
		return $arr;
	}
}


// Add theme-specific layouts to the list
if (!function_exists('unitravel_trx_addons_theme_specific_default_layouts')) {
	add_filter( 'trx_addons_filter_default_layouts',	'unitravel_trx_addons_theme_specific_default_layouts');
	function unitravel_trx_addons_theme_specific_default_layouts($default_layouts=array()) {
		require_once UNITRAVEL_THEME_DIR . 'theme-specific/trx_addons.layouts.php';
		return isset($layouts) && is_array($layouts) && count($layouts) > 0
						? array_merge($default_layouts, $layouts)
						: $default_layouts;
	}
}

// Disable override header image on team pages
if ( !function_exists( 'unitravel_trx_addons_allow_override_header_image' ) ) {
	add_filter( 'unitravel_filter_allow_override_header_image', 'unitravel_trx_addons_allow_override_header_image' );
	function unitravel_trx_addons_allow_override_header_image($allow) {
		return unitravel_is_team_page() || unitravel_is_portfolio_page() ? false : $allow;
	}
}

// Hide sidebar on the team pages
if ( !function_exists( 'unitravel_trx_addons_sidebar_present' ) ) {
	add_filter( 'unitravel_filter_sidebar_present', 'unitravel_trx_addons_sidebar_present' );
	function unitravel_trx_addons_sidebar_present($present) {
		return !is_single() && (unitravel_is_team_page() || unitravel_is_portfolio_page()) ? false : $present;
	}
}


// WP Editor addons
//------------------------------------------------------------------------

// Theme-specific configure of the WP Editor
if ( !function_exists( 'unitravel_trx_addons_editor_init' ) ) {
	if (is_admin()) add_filter( 'tiny_mce_before_init', 'unitravel_trx_addons_editor_init', 11);
	function unitravel_trx_addons_editor_init($opt) {
		if (unitravel_exists_trx_addons()) {
			// Add style 'Arrow' to the 'List styles'
			// Remove 'false &&' from condition below to add new style to the list
			if (false && !empty($opt['style_formats'])) {
				$style_formats = json_decode($opt['style_formats'], true);
				if (is_array($style_formats) && count($style_formats)>0 ) {
					foreach ($style_formats as $k=>$v) {
						if ( $v['title'] == esc_html__('List styles', 'unitravel') ) {
							$style_formats[$k]['items'][] = array(
										'title' => esc_html__('Arrow', 'unitravel'),
										'selector' => 'ul',
										'classes' => 'trx_addons_list trx_addons_list_arrow'
									);
						}
					}
					$opt['style_formats'] = json_encode( $style_formats );		
				}
			}
		}
		return $opt;
	}
}


// Theme-specific thumb sizes
//------------------------------------------------------------------------

// Replace thumb sizes to the theme-specific
if ( !function_exists( 'unitravel_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'unitravel_trx_addons_add_thumb_sizes');
	function unitravel_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// Return theme-specific thumb size instead removed plugin's thumb size
if ( !function_exists( 'unitravel_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'unitravel_trx_addons_get_thumb_size');
	function unitravel_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
                            'trx_addons-thumb-testimonials',
                            'trx_addons-thumb-testimonials-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
                            'trx_addons-thumb-blogger',
							'trx_addons-thumb-blogger-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
                            'trx_addons-thumb-team-short',
							'trx_addons-thumb-team-short-@retina',
							),
							array(
							'unitravel-thumb-huge',
							'unitravel-thumb-huge-@retina',
							'unitravel-thumb-big',
							'unitravel-thumb-big-@retina',
							'unitravel-thumb-med',
							'unitravel-thumb-med-@retina',
							'unitravel-thumb-tiny',
							'unitravel-thumb-tiny-@retina',
                            'unitravel-thumb-testimonials',
							'unitravel-thumb-testimonials-@retina',
							'unitravel-thumb-masonry-big',
							'unitravel-thumb-masonry-big-@retina',
                            'unitravel-thumb-blogger',
							'unitravel-thumb-blogger-@retina',
							'unitravel-thumb-masonry',
							'unitravel-thumb-masonry-@retina',
                            'unitravel-thumb-team-short',
							'unitravel-thumb-team-short-@retina',
							),
							$thumb_size);
	}
}

// Get thumb size for the team items
if ( !function_exists( 'unitravel_trx_addons_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_thumb_size',	'unitravel_trx_addons_thumb_size', 10, 2);
	function unitravel_trx_addons_thumb_size($thumb_size='', $type='') {
		if ($type == 'team-default')
			$thumb_size = unitravel_get_thumb_size('team');
		return $thumb_size;
	}
}



// Shortcodes support
//------------------------------------------------------------------------

// Return tag for the item's title
if ( !function_exists( 'unitravel_trx_addons_sc_item_title_tag' ) ) {
	add_filter( 'trx_addons_filter_sc_item_title_tag', 'unitravel_trx_addons_sc_item_title_tag');
	function unitravel_trx_addons_sc_item_title_tag($tag='') {
		return $tag=='h1' ? 'h2' : $tag;
	}
}

// Return args for the item's button
if ( !function_exists( 'unitravel_trx_addons_sc_item_button_args' ) ) {
	add_filter( 'trx_addons_filter_sc_item_button_args', 'unitravel_trx_addons_sc_item_button_args');
	function unitravel_trx_addons_sc_item_button_args($args, $sc='') {
		if (false && $sc != 'sc_button') {
			$args['type'] = 'simple';
			$args['icon_type'] = 'fontawesome';
			$args['icon_fontawesome'] = 'icon-down-big';
			$args['icon_position'] = 'top';
		}
		return $args;
	}
}
if ( !function_exists('unitravel_specific_sc_add_title_style') ) {
    //Handler of the add_filter('trx_addons_sc_title_style', 'unitravel_specific_sc_add_title_style', 10);
    function unitravel_specific_sc_add_title_style($list) {
        $list[esc_html__('Inverse', 'unitravel')] = 'inverse';
        $list[esc_html__('Light', 'unitravel')] = 'light';
        return $list;
    }
}

// Add new types in the shortcodes
if ( !function_exists( 'unitravel_trx_addons_sc_type' ) ) {
	add_filter( 'trx_addons_sc_type', 'unitravel_trx_addons_sc_type', 10, 2);
	function unitravel_trx_addons_sc_type($list, $sc) {
		return $list;
	}
}

// Add new styles to the Google map
if ( !function_exists( 'unitravel_trx_addons_sc_googlemap_styles' ) ) {
	add_filter( 'trx_addons_filter_sc_googlemap_styles',	'unitravel_trx_addons_sc_googlemap_styles');
	function unitravel_trx_addons_sc_googlemap_styles($list) {
		$list[esc_html__('Dark', 'unitravel')] = 'dark';
		return $list;
	}
}
