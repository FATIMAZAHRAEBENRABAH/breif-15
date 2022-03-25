<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_args = get_query_var('unitravel_logo_args');

// Site logo
$unitravel_logo_image  = unitravel_get_logo_image(isset($unitravel_args['type']) ? $unitravel_args['type'] : '');
$unitravel_logo_text   = unitravel_is_on(unitravel_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$unitravel_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($unitravel_logo_image) || !empty($unitravel_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($unitravel_logo_image)) {
			$unitravel_attr = unitravel_getimagesize($unitravel_logo_image);
			echo '<img src="'.esc_url($unitravel_logo_image).'" alt="'.esc_attr__('logo', 'unitravel').'"'.(!empty($unitravel_attr[3]) ? sprintf(' %s', $unitravel_attr[3]) : '').'>' ;
		} else {
			unitravel_show_layout(unitravel_prepare_macros($unitravel_logo_text), '<span class="logo_text">', '</span>');
			unitravel_show_layout(unitravel_prepare_macros($unitravel_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>