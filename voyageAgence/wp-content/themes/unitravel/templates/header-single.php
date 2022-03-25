<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

if ( get_query_var('unitravel_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	$unitravel_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($unitravel_src[0])) {
		unitravel_sc_layouts_showed('featured', true);
		?><div class="sc_layouts_featured with_image <?php echo esc_attr(unitravel_add_inline_css_class('background-image:url('.esc_url($unitravel_src[0]).');')); ?>"></div><?php
	}
}
?>