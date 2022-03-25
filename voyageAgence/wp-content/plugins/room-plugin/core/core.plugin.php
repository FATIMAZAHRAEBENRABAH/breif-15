<?php
/**
 * Plugin support: Core
 *
 * @package WordPress
 * @subpackage Room Plugin
 * @since v1.0
 */
// Return list of taxonomies
if ( !function_exists( 'room_plugin_get_list_cats' ) ) {
    function room_plugin_get_list_cats() {
        $list['room_taxonomy'] = array();
        $terms = get_terms( array(
            'taxonomy' => 'room_taxonomy',
            'order' => 'ASC',
            'hierarchical' => 1,
            'hide_empty' => false,
        ) );

        if (!is_wp_error( $terms ) && is_array($terms) && count($terms) > 0) {
                foreach ($terms as $term) {
                    $list['room_taxonomy'][$term->term_id] = $term->name;
                }
            }
        return $list['room_taxonomy'];
    }
}


