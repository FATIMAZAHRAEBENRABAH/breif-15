<?php
/* WR Review Plugin support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('unitravel_wp_review_theme_setup9')) {
    add_action( 'after_setup_theme', 'unitravel_wp_review_theme_setup9', 9 );
    function unitravel_wp_review_theme_setup9() {
        if (is_admin()) {
            add_filter( 'unitravel_filter_tgmpa_required_plugins',	'unitravel_wp_review_tgmpa_required_plugins' );
        }
    }
}

// Check if RoomPlugin installed and activated
if ( !function_exists( 'unitravel_exists_wp_review' ) ) {
    function unitravel_exists_wp_review() {
        return function_exists('wp_review_show_total');
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'unitravel_wp_review_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('unitravel_filter_tgmpa_required_plugins',	'unitravel_wp_review_tgmpa_required_plugins');
    function unitravel_wp_review_tgmpa_required_plugins($list=array()) {
        if (in_array('wp-review', unitravel_storage_get('required_plugins'))) {
            $list[] = array(
                'name' 		=> esc_html__('WP Review', 'unitravel'),
                'slug' 		=> 'wp-review',
                'required' 	=> false
            );
        }
        return $list;
    }
}
?>