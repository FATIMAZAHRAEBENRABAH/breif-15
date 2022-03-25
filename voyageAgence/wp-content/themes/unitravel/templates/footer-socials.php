<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.10
 */


// Socials
if ( unitravel_is_on(unitravel_get_theme_option('socials_in_footer')) && ($unitravel_output = unitravel_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php unitravel_show_layout($unitravel_output); ?>
		</div>
	</div>
	<?php
}
?>