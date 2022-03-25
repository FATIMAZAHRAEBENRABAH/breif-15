<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

// Header sidebar
$unitravel_header_name = unitravel_get_theme_option('header_widgets');
$unitravel_header_present = !unitravel_is_off($unitravel_header_name) && is_active_sidebar($unitravel_header_name);
if ($unitravel_header_present) { 
	unitravel_storage_set('current_sidebar', 'header');
	$unitravel_header_wide = unitravel_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($unitravel_header_name) ) {
		dynamic_sidebar($unitravel_header_name);
	}
	$unitravel_widgets_output = ob_get_contents();
	ob_end_clean();
	if (trim(strip_tags($unitravel_widgets_output)) != '') {
		$unitravel_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $unitravel_widgets_output);
		$unitravel_need_columns = strpos($unitravel_widgets_output, 'columns_wrap')===false;
		if ($unitravel_need_columns) {
			$unitravel_columns = max(0, (int) unitravel_get_theme_option('header_columns'));
			if ($unitravel_columns == 0) $unitravel_columns = min(6, max(1, substr_count($unitravel_widgets_output, '<aside ')));
			if ($unitravel_columns > 1)
				$unitravel_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($unitravel_columns).' widget ', $unitravel_widgets_output);
			else
				$unitravel_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($unitravel_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$unitravel_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($unitravel_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'unitravel_action_before_sidebar' );
				unitravel_show_layout($unitravel_widgets_output);
				do_action( 'unitravel_action_after_sidebar' );
				if ($unitravel_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$unitravel_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>