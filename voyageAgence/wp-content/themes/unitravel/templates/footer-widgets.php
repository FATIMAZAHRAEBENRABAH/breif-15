<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0.10
 */

// Footer sidebar
$unitravel_footer_name = unitravel_get_theme_option('footer_widgets');
$unitravel_footer_present = !unitravel_is_off($unitravel_footer_name) && is_active_sidebar($unitravel_footer_name);
if ($unitravel_footer_present) { 
	unitravel_storage_set('current_sidebar', 'footer');
	$unitravel_footer_wide = unitravel_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($unitravel_footer_name) ) {
		dynamic_sidebar($unitravel_footer_name);
	}
	$unitravel_out = trim(ob_get_contents());
	ob_end_clean();
	if (trim(strip_tags($unitravel_out)) != '') {
		$unitravel_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $unitravel_out);
		$unitravel_need_columns = true;
		if ($unitravel_need_columns) {
			$unitravel_columns = max(0, (int) unitravel_get_theme_option('footer_columns'));
			if ($unitravel_columns == 0) $unitravel_columns = min(6, max(1, substr_count($unitravel_out, '<aside ')));
			if ($unitravel_columns > 1)
				$unitravel_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($unitravel_columns).' widget ', $unitravel_out);
			else
				$unitravel_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($unitravel_footer_wide) ? ' footer_fullwidth' : ''; ?>">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$unitravel_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($unitravel_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'unitravel_action_before_sidebar' );
				unitravel_show_layout($unitravel_out);
				do_action( 'unitravel_action_after_sidebar' );
				if ($unitravel_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$unitravel_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>