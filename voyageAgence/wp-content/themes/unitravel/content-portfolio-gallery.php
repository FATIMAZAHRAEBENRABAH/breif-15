<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_blog_style = explode('_', unitravel_get_theme_option('blog_style'));
$unitravel_columns = empty($unitravel_blog_style[1]) ? 2 : max(2, $unitravel_blog_style[1]);
$unitravel_post_format = get_post_format();
$unitravel_post_format = empty($unitravel_post_format) ? 'standard' : str_replace('post-format-', '', $unitravel_post_format);
$unitravel_animation = unitravel_get_theme_option('blog_animation');
$unitravel_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($unitravel_columns).' post_format_'.esc_attr($unitravel_post_format) ); ?>
	<?php echo (!unitravel_is_off($unitravel_animation) ? ' data-animation="'.esc_attr(unitravel_get_animation_classes($unitravel_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($unitravel_image[1]) && !empty($unitravel_image[2])) echo intval($unitravel_image[1]) .'x' . intval($unitravel_image[2]); ?>"
	data-src="<?php if (!empty($unitravel_image[0])) echo esc_url($unitravel_image[0]); ?>"
	>

	<?php
	$unitravel_image_hover = 'icon';
	if (in_array($unitravel_image_hover, array('icons', 'zoom'))) $unitravel_image_hover = 'dots';
	// Featured image
	unitravel_show_post_featured(array(
		'hover' => $unitravel_image_hover,
		'thumb_size' => unitravel_get_thumb_size( strpos(unitravel_get_theme_option('body_style'), 'full')!==false || $unitravel_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. unitravel_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'unitravel') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>