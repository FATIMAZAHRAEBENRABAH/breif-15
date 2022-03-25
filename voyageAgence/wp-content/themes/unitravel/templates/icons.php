<?php
/**
 * The template to displaying popup with Theme Icons
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_icons = unitravel_get_list_icons();
if (is_array($unitravel_icons)) {
	?>
	<div class="unitravel_list_icons">
		<?php
		foreach($unitravel_icons as $icon) {
			?><span class="<?php echo esc_attr($icon); ?>" title="<?php echo esc_attr($icon); ?>"></span><?php
		}
		?>
	</div>
	<?php
}
?>