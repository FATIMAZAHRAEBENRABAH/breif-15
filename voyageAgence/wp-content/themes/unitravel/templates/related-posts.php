<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_link = get_permalink();
$unitravel_post_format = get_post_format();
$unitravel_post_format = empty($unitravel_post_format) ? 'standard' : str_replace('post-format-', '', $unitravel_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_1 post_format_'.esc_attr($unitravel_post_format) ); ?>><?php
	unitravel_show_post_featured(array(
		'thumb_size' => unitravel_get_thumb_size( 'big' ),
		'show_no_image' => true,
		'singular' => false,
		'post_info' => '<div class="post_header entry-header">'
							. '<div class="post_categories">' . unitravel_get_post_categories('') . '</div>'
							. '<h6 class="post_title entry-title"><a href="' . esc_url($unitravel_link) . '">' . wp_kses_post( get_the_title() ) . '</a></h6>'
							. (in_array(get_post_type(), array('post', 'attachment'))
									? '<span class="post_date"><a href="' . esc_url($unitravel_link) . '">' . unitravel_get_date() . '</a></span>'
									: '')
						. '</div>'
		)
	);
?></div>