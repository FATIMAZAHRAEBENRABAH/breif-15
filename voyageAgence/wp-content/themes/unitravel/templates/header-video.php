<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.14
 */
$unitravel_header_video = unitravel_get_header_video();
if (!empty($unitravel_header_video) && !unitravel_is_from_uploads($unitravel_header_video)) {
	global $wp_embed;
	if (is_object($wp_embed))
		$unitravel_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($unitravel_header_video) . '[/embed]' ));
	$unitravel_embed_video = unitravel_make_video_autoplay($unitravel_embed_video);
	?><div id="background_video"><?php unitravel_show_layout($unitravel_embed_video); ?></div><?php
}
?>