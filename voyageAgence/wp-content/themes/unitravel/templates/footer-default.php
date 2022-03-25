<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.10
 */

$unitravel_footer_scheme =  unitravel_is_inherit(unitravel_get_theme_option('footer_scheme')) ? unitravel_get_theme_option('color_scheme') : unitravel_get_theme_option('footer_scheme');
?>
<footer class="footer_wrap footer_default scheme_<?php echo esc_attr($unitravel_footer_scheme); ?>">
	<?php

	// Footer widgets area
	get_template_part( 'templates/footer-widgets' );

	// Menu
	get_template_part( 'templates/footer-menu' );

	// Copyright area
	get_template_part( 'templates/footer-copyright' );
	
	?>
</footer><!-- /.footer_wrap -->
