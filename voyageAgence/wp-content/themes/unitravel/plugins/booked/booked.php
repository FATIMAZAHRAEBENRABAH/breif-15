<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('unitravel_booked_theme_setup9')) {
	add_action( 'after_setup_theme', 'unitravel_booked_theme_setup9', 9 );
	function unitravel_booked_theme_setup9() {
		if (unitravel_exists_booked()) {
			add_action( 'wp_enqueue_scripts', 							'unitravel_booked_frontend_scripts', 1100 );
			add_filter( 'unitravel_filter_merge_styles',					'unitravel_booked_merge_styles' );
			add_filter( 'unitravel_filter_get_css',						'unitravel_booked_get_css', 10, 4);
		}
		if (is_admin()) {
			add_filter( 'unitravel_filter_tgmpa_required_plugins',		'unitravel_booked_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'unitravel_exists_booked' ) ) {
	function unitravel_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'unitravel_booked_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('unitravel_filter_tgmpa_required_plugins',	'unitravel_booked_tgmpa_required_plugins');
	function unitravel_booked_tgmpa_required_plugins($list=array()) {
		if (in_array('booked', unitravel_storage_get('required_plugins'))) {
			$path = unitravel_get_file_dir('plugins/booked/booked.zip');
			$list[] = array(
					'name' 		=> esc_html__('Booked Appointments', 'unitravel'),
					'slug' 		=> 'booked',
					'version'	=> '2.3.5',
					'source' 	=> !empty($path) ? $path : 'upload://booked.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'unitravel_booked_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'unitravel_booked_frontend_scripts', 1100 );
	function unitravel_booked_frontend_scripts() {
		if (unitravel_is_on(unitravel_get_theme_option('debug_mode')) && unitravel_get_file_dir('plugins/booked/booked.css')!='')
			wp_enqueue_style( 'unitravel-booked',  unitravel_get_file_url('plugins/booked/booked.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'unitravel_booked_merge_styles' ) ) {
	//Handler of the add_filter('unitravel_filter_merge_styles', 'unitravel_booked_merge_styles');
	function unitravel_booked_merge_styles($list) {
		$list[] = 'plugins/booked/booked.css';
		return $list;
	}
}


// Add plugin-specific rules into custom CSS
//------------------------------------------------------------------------

// Add css styles into global CSS stylesheet
if (!function_exists('unitravel_booked_get_css')) {
	//Handler of the add_filter('unitravel_filter_get_css', 'unitravel_booked_get_css', 10, 4);
	function unitravel_booked_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS
body #booked-profile-page input[type="submit"],
body #booked-profile-page button,
body .booked-list-view input[type="submit"],
body .booked-list-view button,
body table.booked-calendar input[type="submit"],
body table.booked-calendar button,
body .booked-modal input[type="submit"],
body .booked-modal button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

CSS;
		}
		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

/* Calendar */


CSS;
		}

		return $css;
	}
}
?>