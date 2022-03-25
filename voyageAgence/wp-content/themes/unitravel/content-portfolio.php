<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($unitravel_columns).' post_format_'.esc_attr($unitravel_post_format) ); ?>
	<?php echo (!unitravel_is_off($unitravel_animation) ? ' data-animation="'.esc_attr(unitravel_get_animation_classes($unitravel_animation)).'"' : ''); ?>
	>

	<?php
	$unitravel_image_hover = unitravel_get_theme_option('image_hover');
	// Featured image
	unitravel_show_post_featured(array(
		'thumb_size' => unitravel_get_thumb_size(strpos(unitravel_get_theme_option('body_style'), 'full')!==false || $unitravel_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $unitravel_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $unitravel_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>