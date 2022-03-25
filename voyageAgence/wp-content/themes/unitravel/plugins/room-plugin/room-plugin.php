<?php
/* Room Plugin support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('unitravel_room_plugin_theme_setup9')) {
    add_action( 'after_setup_theme', 'unitravel_room_plugin_theme_setup9', 9 );
    function unitravel_room_plugin_theme_setup9() {
        if (is_admin()) {
            add_filter( 'unitravel_filter_tgmpa_required_plugins',	'unitravel_room_plugin_tgmpa_required_plugins' );
        }
    }
}

// Check if RoomPlugin installed and activated
if ( !function_exists( 'unitravel_exists_room_plugin' ) ) {
    function unitravel_exists_room_plugin() {
        return function_exists('room_plugin_shortcode');
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'unitravel_room_plugin_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('unitravel_filter_tgmpa_required_plugins',	'unitravel_room_plugin_tgmpa_required_plugins');
    function unitravel_room_plugin_tgmpa_required_plugins($list=array()) {
        if (in_array('room-plugin', unitravel_storage_get('required_plugins'))) {
            $path = unitravel_get_file_dir('plugins/room-plugin/room-plugin.zip');
            $list[] = array(
                'name' 		=> esc_html__('Room Plugin', 'unitravel'),
                'slug' 		=> 'room-plugin',
                'version'	=> '1.0',
                'source'	=> !empty($path) ? $path : 'upload://room-plugin.zip',
                'required' 	=> false
            );
        }
        return $list;
    }
}
?>