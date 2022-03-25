<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.10
 */

// Logo
if (unitravel_is_on(unitravel_get_theme_option('logo_in_footer'))) {
	$unitravel_logo_image = '';
	if (unitravel_get_retina_multiplier(2) > 1)
		$unitravel_logo_image = unitravel_get_theme_option( 'logo_footer_retina' );
	if (empty($unitravel_logo_image)) 
		$unitravel_logo_image = unitravel_get_theme_option( 'logo_footer' );
	$unitravel_logo_text   = get_bloginfo( 'name' );
	if (!empty($unitravel_logo_image) || !empty($unitravel_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($unitravel_logo_image)) {
					$unitravel_attr = unitravel_getimagesize($unitravel_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($unitravel_logo_image).'" class="logo_footer_image" alt="'.esc_attr__('logo', 'unitravel').'"'.(!empty($unitravel_attr[3]) ? sprintf(' %s', $unitravel_attr[3]) : '').'></a>' ;
				} else if (!empty($unitravel_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($unitravel_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>