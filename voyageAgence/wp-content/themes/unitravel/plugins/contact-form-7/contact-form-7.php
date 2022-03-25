<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('unitravel_cf7_theme_setup9')) {
	add_action( 'after_setup_theme', 'unitravel_cf7_theme_setup9', 9 );
	function unitravel_cf7_theme_setup9() {

		if (unitravel_exists_cf7()) {
			add_action( 'wp_enqueue_scripts', 								'unitravel_cf7_frontend_scripts', 1100 );
			add_filter( 'unitravel_filter_merge_styles',						'unitravel_cf7_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'unitravel_filter_tgmpa_required_plugins',			'unitravel_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'unitravel_cf7_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('unitravel_filter_tgmpa_required_plugins',	'unitravel_cf7_tgmpa_required_plugins');
	function unitravel_cf7_tgmpa_required_plugins($list=array()) {
		if (in_array('contact-form-7', unitravel_storage_get('required_plugins'))) {
			// CF7 plugin
			$list[] = array(
					'name' 		=> esc_html__('Contact Form 7', 'unitravel'),
					'slug' 		=> 'contact-form-7',
					'required' 	=> false
			);
		}
		return $list;
	}
}


// Check if cf7 installed and activated
if ( !function_exists( 'unitravel_exists_cf7' ) ) {
	function unitravel_exists_cf7() {
		return class_exists('WPCF7');
	}
}

// Enqueue custom styles
if ( !function_exists( 'unitravel_cf7_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'unitravel_cf7_frontend_scripts', 1100 );
	function unitravel_cf7_frontend_scripts() {
		if (unitravel_is_on(unitravel_get_theme_option('debug_mode')) && unitravel_get_file_dir('plugins/contact-form-7/contact-form-7.css')!='')
			wp_enqueue_style( 'unitravel-contact-form-7',  unitravel_get_file_url('plugins/contact-form-7/contact-form-7.css'), array(), null );
	}
}

// Merge custom styles
if ( !function_exists( 'unitravel_cf7_merge_styles' ) ) {
	//Handler of the add_filter('unitravel_filter_merge_styles', 'unitravel_cf7_merge_styles');
	function unitravel_cf7_merge_styles($list) {
		$list[] = 'plugins/contact-form-7/contact-form-7.css';
		return $list;
	}
}
?>