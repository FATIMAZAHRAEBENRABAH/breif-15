<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_sidebar_position = unitravel_get_theme_option('sidebar_position');
if (unitravel_sidebar_present()) {
	ob_start();
	$unitravel_sidebar_name = unitravel_get_theme_option('sidebar_widgets');
	unitravel_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($unitravel_sidebar_name) ) {
		dynamic_sidebar($unitravel_sidebar_name);
	}
	$unitravel_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($unitravel_out)) != '') {
		?>
		<div class="sidebar <?php echo esc_attr($unitravel_sidebar_position); ?> widget_area<?php if (!unitravel_is_inherit(unitravel_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(unitravel_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'unitravel_action_before_sidebar' );
				unitravel_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $unitravel_out));
				do_action( 'unitravel_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>