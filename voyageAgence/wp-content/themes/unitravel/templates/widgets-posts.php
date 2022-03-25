<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_post_id    = get_the_ID();
$unitravel_post_date  = unitravel_get_date();
$unitravel_post_title = get_the_title();
$unitravel_post_link  = get_permalink();
$unitravel_post_author_id   = get_the_author_meta('ID');
$unitravel_post_author_name = get_the_author_meta('display_name');
$unitravel_post_author_url  = get_author_posts_url($unitravel_post_author_id, '');

$unitravel_args = get_query_var('unitravel_args_widgets_posts');
$unitravel_show_date = isset($unitravel_args['show_date']) ? (int) $unitravel_args['show_date'] : 1;
$unitravel_show_image = isset($unitravel_args['show_image']) ? (int) $unitravel_args['show_image'] : 1;
$unitravel_show_author = isset($unitravel_args['show_author']) ? (int) $unitravel_args['show_author'] : 1;
$unitravel_show_counters = isset($unitravel_args['show_counters']) ? (int) $unitravel_args['show_counters'] : 1;
$unitravel_show_categories = isset($unitravel_args['show_categories']) ? (int) $unitravel_args['show_categories'] : 1;

$unitravel_output = unitravel_storage_get('unitravel_output_widgets_posts');

$unitravel_post_counters_output = '';
if ( $unitravel_show_counters ) {
	$unitravel_post_counters_output = '<span class="post_info_item post_info_counters">'
								. unitravel_get_post_counters('comments')
							. '</span>';
}


$unitravel_output .= '<article class="post_item with_thumb">';

if ($unitravel_show_image) {
	$unitravel_post_thumb = get_the_post_thumbnail($unitravel_post_id, unitravel_get_thumb_size('tiny'), array(
		'alt' => the_title_attribute( array( 'echo' => false ) )
	));
	if ($unitravel_post_thumb) $unitravel_output .= '<div class="post_thumb">' . ($unitravel_post_link ? '<a href="' . esc_url($unitravel_post_link) . '">' : '') . ($unitravel_post_thumb) . ($unitravel_post_link ? '</a>' : '') . '</div>';
}

$unitravel_output .= '<div class="post_content">'
			. ($unitravel_show_categories 
					? '<div class="post_categories">'
						. unitravel_get_post_categories()
						. $unitravel_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($unitravel_post_link ? '<a href="' . esc_url($unitravel_post_link) . '">' : '') . ($unitravel_post_title) . ($unitravel_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('unitravel_filter_get_post_info', 
								'<div class="post_info">'
									. ($unitravel_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($unitravel_post_link ? '<a href="' . esc_url($unitravel_post_link) . '" class="post_info_date">' : '') 
											. esc_html($unitravel_post_date) 
											. ($unitravel_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($unitravel_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'unitravel') . ' ' 
											. ($unitravel_post_link ? '<a href="' . esc_url($unitravel_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($unitravel_post_author_name) 
											. ($unitravel_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$unitravel_show_categories && $unitravel_post_counters_output
										? $unitravel_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
unitravel_storage_set('unitravel_output_widgets_posts', $unitravel_output);
?>