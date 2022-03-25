<?php
/**
 * ThemeREX Addons Custom post type: Dishes
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.6.09
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}


// -----------------------------------------------------------------
// -- Custom post type registration
// -----------------------------------------------------------------

// Define Custom post type and taxonomy constants
if ( ! defined('TRX_ADDONS_CPT_DISHES_PT') ) define('TRX_ADDONS_CPT_DISHES_PT', trx_addons_cpt_param('dishes', 'post_type'));
if ( ! defined('TRX_ADDONS_CPT_DISHES_TAXONOMY') ) define('TRX_ADDONS_CPT_DISHES_TAXONOMY', trx_addons_cpt_param('dishes', 'taxonomy'));

// Register post type and taxonomy
if (!function_exists('trx_addons_cpt_dishes_init')) {
	add_action( 'init', 'trx_addons_cpt_dishes_init' );
	function trx_addons_cpt_dishes_init() {

		// Add Courses parameters to the Meta Box support
		global $TRX_ADDONS_STORAGE;
		$TRX_ADDONS_STORAGE['post_types'][] = TRX_ADDONS_CPT_DISHES_PT;
		$TRX_ADDONS_STORAGE['meta_box_'.TRX_ADDONS_CPT_DISHES_PT] = array(
			"price" => array(
				"title" => esc_html__("Price",  'trx_addons'),
				"desc" => wp_kses_data( __("The price of the dish", 'trx_addons') ),
				"std" => "",
				"type" => "text"
			),
			"product" => array(
				"title" => __('Link to the dish product',  'trx_addons'),
				"desc" => __("Link to the product page for this dish", 'trx_addons'),
				"std" => '',
				"options" => is_admin() ? trx_addons_get_list_posts(false, 'product') : array(),
				"type" => "select"
			),
			"spicy" => array(
				"title" => esc_html__("Spicy",  'trx_addons'),
				"desc" => wp_kses_data( __("Spicy level of this dish from 1 to 5", 'trx_addons') ),
				"std" => "",
				"type" => "text"
			),
			"nutritions" => array(
				"title" => esc_html__("Nutritions",  'trx_addons'),
				"desc" => wp_kses_data( __("Nutritional information. Each element on the new row", 'trx_addons') ),
				"std" => "",
				"type" => "textarea"
			),
			"ingredients" => array(
				"title" => esc_html__("Ingredients",  'trx_addons'),
				"desc" => wp_kses_data( __("Ingredients of this dish. Each element on the new row", 'trx_addons') ),
				"std" => "",
				"type" => "textarea"
			)
		);
		
		// Register post type and taxonomy
		register_post_type( TRX_ADDONS_CPT_DISHES_PT, array(
			'label'               => esc_html__( 'Dishes', 'trx_addons' ),
			'description'         => esc_html__( 'Dish Description', 'trx_addons' ),
			'labels'              => array(
				'name'                => esc_html__( 'Dishes', 'trx_addons' ),
				'singular_name'       => esc_html__( 'Dish', 'trx_addons' ),
				'menu_name'           => esc_html__( 'Dishes', 'trx_addons' ),
				'parent_item_colon'   => esc_html__( 'Parent Item:', 'trx_addons' ),
				'all_items'           => esc_html__( 'All Dishes', 'trx_addons' ),
				'view_item'           => esc_html__( 'View Dish', 'trx_addons' ),
				'add_new_item'        => esc_html__( 'Add New Dish', 'trx_addons' ),
				'add_new'             => esc_html__( 'Add New', 'trx_addons' ),
				'edit_item'           => esc_html__( 'Edit Dish', 'trx_addons' ),
				'update_item'         => esc_html__( 'Update Dish', 'trx_addons' ),
				'search_items'        => esc_html__( 'Search Dishes', 'trx_addons' ),
				'not_found'           => esc_html__( 'Not found', 'trx_addons' ),
				'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'trx_addons' ),
			),
			'taxonomies'          => array(TRX_ADDONS_CPT_DISHES_TAXONOMY),
			'supports'            => trx_addons_cpt_param('dishes', 'supports'),
			'public'              => true,
			'hierarchical'        => false,
			'has_archive'         => true,
			'can_export'          => true,
			'show_in_admin_bar'   => true,
			'show_in_menu'        => true,
			'menu_position'       => '52.6',
			'menu_icon'			  => 'dashicons-carrot',
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => trx_addons_cpt_param('dishes', 'post_type_slug') )
			)
		);

		register_taxonomy( TRX_ADDONS_CPT_DISHES_TAXONOMY, TRX_ADDONS_CPT_DISHES_PT, array(
			'post_type' 		=> TRX_ADDONS_CPT_DISHES_PT,
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => esc_html__( 'Dishes Group', 'trx_addons' ),
				'singular_name'     => esc_html__( 'Group', 'trx_addons' ),
				'search_items'      => esc_html__( 'Search Groups', 'trx_addons' ),
				'all_items'         => esc_html__( 'All Groups', 'trx_addons' ),
				'parent_item'       => esc_html__( 'Parent Group', 'trx_addons' ),
				'parent_item_colon' => esc_html__( 'Parent Group:', 'trx_addons' ),
				'edit_item'         => esc_html__( 'Edit Group', 'trx_addons' ),
				'update_item'       => esc_html__( 'Update Group', 'trx_addons' ),
				'add_new_item'      => esc_html__( 'Add New Group', 'trx_addons' ),
				'new_item_name'     => esc_html__( 'New Group Name', 'trx_addons' ),
				'menu_name'         => esc_html__( 'Dishes Groups', 'trx_addons' ),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => trx_addons_cpt_param('dishes', 'taxonomy_slug') )
			)
		);
	}
}

// Add 'Dishes' parameters in the ThemeREX Addons Options
if (!function_exists('trx_addons_cpt_dishes_options')) {
	add_action( 'trx_addons_filter_options', 'trx_addons_cpt_dishes_options');
	function trx_addons_cpt_dishes_options($options) {

		trx_addons_array_insert_after($options, 'cpt_section', array(
			// Courses settings
			'dishes_info' => array(
				"title" => esc_html__('Dishes', 'trx_addons'),
				"desc" => wp_kses_data( __('Settings of the dishes archive', 'trx_addons') ),
				"type" => "info"
			),
			'dishes_style' => array(
				"title" => esc_html__('Style', 'trx_addons'),
				"desc" => wp_kses_data( __('Style of the dishes archive', 'trx_addons') ),
				"std" => 'default_2',
				"options" => apply_filters('trx_addons_filter_cpt_archive_styles', array(
					'default_2' => esc_html__('Default /2 columns/', 'trx_addons'),
					'default_3' => esc_html__('Default /3 columns/', 'trx_addons')
				), TRX_ADDONS_CPT_DISHES_PT),
				"type" => "select"
			)
		));
		return $options;
	}
}

	
// Load required styles and scripts for the frontend
if ( !function_exists( 'trx_addons_cpt_dishes_load_scripts_front' ) ) {
	add_action("wp_enqueue_scripts", 'trx_addons_cpt_dishes_load_scripts_front');
	function trx_addons_cpt_dishes_load_scripts_front() {
		if (trx_addons_is_on(trx_addons_get_option('debug_mode'))) {
			wp_enqueue_style( 'trx_addons-cpt_dishes', trx_addons_get_file_url('cpt/dishes/dishes.css'), array(), null );
		}
	}
}

	
// Merge shortcode's specific styles into single stylesheet
if ( !function_exists( 'trx_addons_cpt_dishes_merge_styles' ) ) {
	add_action("trx_addons_filter_merge_styles", 'trx_addons_cpt_dishes_merge_styles');
	function trx_addons_cpt_dishes_merge_styles($list) {
		$list[] = 'cpt/dishes/dishes.css';
		return $list;
	}
}

	
// Merge shortcode's specific scripts into single file
if ( !function_exists( 'trx_addons_cpt_dishes_merge_scripts' ) ) {
	add_action("trx_addons_filter_merge_scripts", 'trx_addons_cpt_dishes_merge_scripts');
	function trx_addons_cpt_dishes_merge_scripts($list) {
		$list[] = 'cpt/dishes/dishes.js';
		return $list;
	}
}


// Return true if it's dishes page
if ( !function_exists( 'trx_addons_is_dishes_page' ) ) {
	function trx_addons_is_dishes_page() {
		return defined('TRX_ADDONS_CPT_DISHES_PT') 
					&& !is_search()
					&& (
						(is_single() && get_post_type()==TRX_ADDONS_CPT_DISHES_PT)
						|| is_post_type_archive(TRX_ADDONS_CPT_DISHES_PT)
						|| is_tax(TRX_ADDONS_CPT_DISHES_TAXONOMY)
						);
	}
}


// Return taxonomy for the current post type
if ( !function_exists( 'trx_addons_cpt_dishes_post_type_taxonomy' ) ) {
	add_filter( 'trx_addons_filter_post_type_taxonomy',	'trx_addons_cpt_dishes_post_type_taxonomy', 10, 2 );
	function trx_addons_cpt_dishes_post_type_taxonomy($tax='', $post_type='') {
		if ( defined('TRX_ADDONS_CPT_DISHES_PT') && $post_type == TRX_ADDONS_CPT_DISHES_PT )
			$tax = TRX_ADDONS_CPT_DISHES_TAXONOMY;
		return $tax;
	}
}


// Return link to the all posts for the breadcrumbs
if ( !function_exists( 'trx_addons_cpt_dishes_get_blog_all_posts_link' ) ) {
	add_filter('trx_addons_filter_get_blog_all_posts_link', 'trx_addons_cpt_dishes_get_blog_all_posts_link', 10, 2);
	function trx_addons_cpt_dishes_get_blog_all_posts_link($link='', $args=array()) {
		if ($link=='') {
			if (trx_addons_is_dishes_page() && !is_post_type_archive(TRX_ADDONS_CPT_DISHES_PT))
				$link = '<a href="'.esc_url(get_post_type_archive_link( TRX_ADDONS_CPT_DISHES_PT )).'">'.esc_html__('All Dishes', 'trx_addons').'</a>';
		}
		return $link;
	}
}


// Return current page title
if ( !function_exists( 'trx_addons_cpt_dishes_get_blog_title' ) ) {
	add_filter( 'trx_addons_filter_get_blog_title', 'trx_addons_cpt_dishes_get_blog_title');
	function trx_addons_cpt_dishes_get_blog_title($title='') {
		if ( defined('TRX_ADDONS_CPT_DISHES_PT') ) {
			if ( is_post_type_archive(TRX_ADDONS_CPT_DISHES_PT) )
				$title = esc_html__('All Dishes', 'trx_addons');
		}
		return $title;
	}
}


// Replace standard theme templates
//-------------------------------------------------------------

// Change standard single template for the dishes posts
if ( !function_exists( 'trx_addons_cpt_dishes_single_template' ) ) {
	add_filter('single_template', 'trx_addons_cpt_dishes_single_template');
	function trx_addons_cpt_dishes_single_template($template) {
		global $post;
		if (is_single() && $post->post_type == TRX_ADDONS_CPT_DISHES_PT)
			$template = trx_addons_get_file_dir('cpt/dishes/tpl.single.php');
		return $template;
	}
}

// Change standard archive template for the dishes posts
if ( !function_exists( 'trx_addons_cpt_dishes_archive_template' ) ) {
	add_filter('archive_template',	'trx_addons_cpt_dishes_archive_template');
	function trx_addons_cpt_dishes_archive_template( $template ) {
		if ( is_post_type_archive(TRX_ADDONS_CPT_DISHES_PT) )
			$template = trx_addons_get_file_dir('cpt/dishes/tpl.archive.php');
		return $template;
	}	
}

// Change standard category template for the dishes categories (groups)
if ( !function_exists( 'trx_addons_cpt_dishes_taxonomy_template' ) ) {
	add_filter('taxonomy_template',	'trx_addons_cpt_dishes_taxonomy_template');
	function trx_addons_cpt_dishes_taxonomy_template( $template ) {
		if ( is_tax(TRX_ADDONS_CPT_DISHES_TAXONOMY) )
			$template = trx_addons_get_file_dir('cpt/dishes/tpl.archive.php');
		return $template;
	}	
}



// Admin utils
// -----------------------------------------------------------------

// Show <select> with dishes categories in the admin filters area
if (!function_exists('trx_addons_cpt_dishes_admin_filters')) {
	add_action( 'restrict_manage_posts', 'trx_addons_cpt_dishes_admin_filters' );
	function trx_addons_cpt_dishes_admin_filters() {
		if (get_query_var('post_type') != TRX_ADDONS_CPT_DISHES_PT) return;

		$tax = TRX_ADDONS_CPT_DISHES_TAXONOMY;

		if ( !($terms = get_transient("trx_addons_terms_filter_".trim($tax)))) {
			$terms = get_terms($tax);
			set_transient("trx_addons_terms_filter_".trim($tax), $terms, 24*60*60);
		}

		$list = '';
		if (is_array($terms) && count($terms) > 0) {
			$tax_obj = get_taxonomy($tax);
			$list .= '<select name="'.esc_attr($tax).'" id="'.esc_attr($tax).'" class="postform">'
					.  "<option value=''>" . esc_html($tax_obj->labels->all_items) . "</option>";
			foreach ($terms as $term) {
				$list .= '<option value='. esc_attr($term->slug) . (isset($_REQUEST[$tax]) && $_REQUEST[$tax] == $term->slug || (isset($_REQUEST['taxonomy']) && $_REQUEST['taxonomy'] == $tax && isset($_REQUEST['term']) && $_REQUEST['term'] == $term->slug) ? ' selected="selected"' : '') . '>' . esc_html($term->name) . '</option>';
			}
			$list .=  "</select>";
		}
		echo trim($list);
	}
}
  
// Clear terms cache on the taxonomy save
if (!function_exists('trx_addons_cpt_dishes_admin_clear_cache')) {
	add_action( 'edited_'.TRX_ADDONS_CPT_DISHES_TAXONOMY, 'trx_addons_cpt_dishes_admin_clear_cache', 10, 1 );
	add_action( 'delete_'.TRX_ADDONS_CPT_DISHES_TAXONOMY, 'trx_addons_cpt_dishes_admin_clear_cache', 10, 1 );
	add_action( 'created_'.TRX_ADDONS_CPT_DISHES_TAXONOMY, 'trx_addons_cpt_dishes_admin_clear_cache', 10, 1 );
	function trx_addons_cpt_dishes_admin_clear_cache( $term_id=0 ) {  
		// verify nonce
		$ok = true;
		if (!empty($_REQUEST['_wpnonce_add-tag'])) {
			check_admin_referer( 'add-tag', '_wpnonce_add-tag' );
		} else if (!empty($_REQUEST['_wpnonce']) && !empty($_REQUEST['tag_ID'])) {
			$tag_ID = (int) $_REQUEST['tag_ID'];
			if ($_POST['action'] == 'editedtag')
				check_admin_referer( 'update-tag_' . $tag_ID );
			else if ($_POST['action'] == 'delete-tag')
				check_admin_referer( 'delete-tag_' . $tag_ID );
			else if ($_POST['action'] == 'delete')
				check_admin_referer( 'bulk-tags' );
			else if ($_POST['action'] == 'bulk-delete')
				check_admin_referer( 'bulk-tags' );
			else
				$ok = false;
		} else
			$ok = false;
		if ($ok) 
			set_transient("trx_addons_terms_filter_".TRX_ADDONS_CPT_DISHES_TAXONOMY, '', 24*60*60);
	}
}


// AJAX details
// ------------------------------------------------------------
if ( !function_exists( 'trx_addons_callback_ajax_dishes_details' ) ) {
	add_action('wp_ajax_dishes_details',		'trx_addons_callback_ajax_dishes_details');
	add_action('wp_ajax_nopriv_dishes_details',	'trx_addons_callback_ajax_dishes_details');
	function trx_addons_callback_ajax_dishes_details() {
		if ( !wp_verify_nonce( trx_addons_get_value_gp('nonce'), admin_url('admin-ajax.php') ) )
			die();

		$response = array('error'=>'', 'data' => '');
		
		$post_id = $_REQUEST['post_id'];
	
		if (!empty($post_id)) {
			global $post;
			$post = get_post($post_id);
			setup_postdata( $post );
			ob_start();
			if (($fdir = trx_addons_get_file_dir('cpt/dishes/tpl.details.php')) != '') { include $fdir; }
			$response['data'] = ob_get_contents();
			ob_end_clean();
		} else {
			$response['error'] = '<article class="dishes_page">' . esc_html__('Invalid query parameter!', 'trx_addons') . '</article>';
		}
		
		echo json_encode($response);
		die();
	}
}


// trx_sc_dishes
//-------------------------------------------------------------
/*
[trx_sc_dishes id="unique_id" type="default" cat="category_slug or id" count="3" columns="3" slider="0|1"]
*/
if ( !function_exists( 'trx_addons_sc_dishes' ) ) {
	function trx_addons_sc_dishes($atts, $content=null) {	
		$atts = trx_addons_sc_prepare_atts('trx_sc_dishes', $atts, array(
			// Individual params
			"type" => "default",
			"columns" => "",
			"cat" => '',
			"count" => 3,
			"offset" => 0,
			"orderby" => '',
			"order" => '',
			"ids" => '',
			"popup" => 0,
			"slider" => 0,
			"slider_pagination" => 0,
			"slides_space" => 0,
			"featured_position" => "top",
			"hide_excerpt" => 0,
			"title" => "",
			"subtitle" => "",
			"description" => "",
			"link" => '',
			"link_image" => '',
			"link_text" => esc_html__('Learn more', 'trx_addons'),
			"title_align" => "left",
			"title_style" => "default",
			"title_tag" => '',
			// Common params
			"id" => "",
			"class" => "",
			"css" => ""
			)
		);

		if (!empty($atts['ids'])) {
			$atts['ids'] = str_replace(array(';', ' '), array(',', ''), $atts['ids']);
			$atts['count'] = count(explode(',', $atts['ids']));
		}
		$atts['count'] = max(1, (int) $atts['count']);
		$atts['offset'] = max(0, (int) $atts['offset']);
		if (empty($atts['orderby'])) $atts['orderby'] = 'title';
		if (empty($atts['order'])) $atts['order'] = 'asc';
		$atts['popup'] = max(0, (int) $atts['popup']);
		$atts['slider'] = max(0, (int) $atts['slider']);
		$atts['slider_pagination'] = $atts['slider'] > 0 ? max(0, (int) $atts['slider_pagination']) : 0;

		if (trx_addons_is_on(trx_addons_get_option('debug_mode')))
			wp_enqueue_script( 'trx_addons-cpt_dishes', trx_addons_get_file_url('cpt/dishes/dishes.js'), array('jquery'), null, true );

		ob_start();
		set_query_var('trx_addons_args_sc_dishes', $atts);
		if (($fdir = trx_addons_get_file_dir('cpt/dishes/tpl.'.trx_addons_esc($atts['type']).'.php')) != '') { include $fdir; }
		else if (($fdir = trx_addons_get_file_dir('cpt/dishes/tpl.default.php')) != '') { include $fdir; }
		$output = ob_get_contents();
		ob_end_clean();
		
		return apply_filters('trx_addons_sc_output', $output, 'trx_sc_dishes', $atts, $content);
	}
}


// Add [trx_sc_dishes] in the VC shortcodes list
if (!function_exists('trx_addons_sc_dishes_add_in_vc')) {
	function trx_addons_sc_dishes_add_in_vc() {

		if (!trx_addons_exists_visual_composer()) return;
		
		add_shortcode("trx_sc_dishes", "trx_addons_sc_dishes");

		vc_lean_map( "trx_sc_dishes", 'trx_addons_sc_dishes_add_in_vc_params');
		class WPBakeryShortCode_Trx_Sc_Dishes extends WPBakeryShortCode {}

	}
	add_action('init', 'trx_addons_sc_dishes_add_in_vc', 20);
}

// Return params
if (!function_exists('trx_addons_sc_dishes_add_in_vc_params')) {
	function trx_addons_sc_dishes_add_in_vc_params() {
		return apply_filters('trx_addons_sc_map', array(
				"base" => "trx_sc_dishes",
				"name" => esc_html__("Dishes", 'trx_addons'),
				"description" => wp_kses_data( __("Display dishes from specified group", 'trx_addons') ),
				"category" => esc_html__('ThemeREX', 'trx_addons'),
				"icon" => 'icon_trx_sc_dishes',
				"class" => "trx_sc_dishes",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array_merge(
					array(
						array(
							"param_name" => "type",
							"heading" => esc_html__("Layout", 'trx_addons'),
							"description" => wp_kses_data( __("Select shortcode's layout", 'trx_addons') ),
							"admin_label" => true,
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "default",
							"value" => apply_filters('trx_addons_sc_type', array(
								esc_html__('Default', 'trx_addons') => 'default',
								esc_html__('Float', 'trx_addons') => 'float',
								esc_html__('Compact', 'trx_addons') => 'compact'
							), 'trx_sc_dishes' ),
							"type" => "dropdown"
						),
						array(
							"param_name" => "featured_position",
							"heading" => esc_html__("Featured position", 'trx_addons'),
							"description" => wp_kses_data( __("Select the position of the featured element", 'trx_addons') ),
							"admin_label" => true,
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "top",
							"value" => array(
								esc_html__('Top', 'trx_addons') => 'top',
								esc_html__('Left', 'trx_addons') => 'left',
								esc_html__('Right', 'trx_addons') => 'right'
							),
							"type" => "dropdown"
						),
						array(
							"param_name" => "hide_excerpt",
							"heading" => esc_html__("Excerpt", 'trx_addons'),
							"description" => wp_kses_data( __("Check if you want hide excerpt", 'trx_addons') ),
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "0",
							"value" => array(esc_html__("Hide excerpt", 'trx_addons') => "1" ),
							"type" => "checkbox"
						),
						array(
							"param_name" => "popup",
							"heading" => esc_html__("Open in the popup", 'trx_addons'),
							"description" => wp_kses_data( __("Open details in the popup or navigate to the single post (default)", 'trx_addons') ),
							"admin_label" => true,
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "0",
							"value" => array(esc_html__("Popup", 'trx_addons') => "1" ),
							"type" => "checkbox"
						),
						array(
							"param_name" => "cat",
							"heading" => esc_html__("Group", 'trx_addons'),
							"description" => wp_kses_data( __("Dishes group", 'trx_addons') ),
							"value" => array_merge(array(esc_html__('- Select category -', 'trx_addons') => 0), array_flip(trx_addons_get_list_terms(false, TRX_ADDONS_CPT_DISHES_TAXONOMY))),
							"type" => "dropdown"
						)
					),
					trx_addons_vc_add_query_param(''),
					trx_addons_vc_add_slider_param(),
					trx_addons_vc_add_title_param(),
					trx_addons_vc_add_id_param()
				)
			), 'trx_sc_dishes' );
	}
}
?>