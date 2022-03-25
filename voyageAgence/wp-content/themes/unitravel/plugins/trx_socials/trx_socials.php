<?php
/* ThemeREX Socials support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('unitravel_trx_socials_theme_setup9')) {
	add_action( 'after_setup_theme', 'unitravel_trx_socials_theme_setup9', 9 );
	function unitravel_trx_socials_theme_setup9() {

		if (is_admin()) {
			add_filter( 'unitravel_filter_tgmpa_required_plugins',			'unitravel_trx_socials_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'unitravel_trx_socials_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('unitravel_filter_tgmpa_required_plugins',	'unitravel_trx_socials_tgmpa_required_plugins');
	function unitravel_trx_socials_tgmpa_required_plugins($list=array()) {
		if (in_array('trx_socials', unitravel_storage_get('required_plugins'))) {
			$path = unitravel_get_file_dir('plugins/trx_socials/trx_socials.zip');
			// ThemeREX Socials plugin
			$list[] = array(
				'name' 		=> esc_html__('ThemeREX Socials', 'unitravel'),
				'slug' 		=> 'trx_socials',
				'version'	=> '1.4.3',
				'source'	=> !empty($path) ? $path : 'upload://trx_socials.zip',
				'required' 	=> false
			);
		}
		return $list;
	}
}


// Check if this plugin installed and activated
if ( !function_exists( 'unitravel_exists_trx_socials' ) ) {
	function unitravel_exists_trx_socials() {
		return function_exists( 'trx_socials_load_plugin_textdomain' );
	}
}
