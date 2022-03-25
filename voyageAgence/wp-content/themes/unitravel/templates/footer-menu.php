<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.10
 */

// Footer menu
$unitravel_menu_footer = unitravel_get_nav_menu('menu_footer');
if (!empty($unitravel_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php unitravel_show_layout($unitravel_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>