<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage UNITRAVEL
 * @since UNITRAVEL 1.0
 */

$unitravel_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$unitravel_post_format = get_post_format();
$unitravel_post_format = empty($unitravel_post_format) ? 'standard' : str_replace('post-format-', '', $unitravel_post_format);
$unitravel_animation = unitravel_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($unitravel_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($unitravel_post_format) ); ?>
	<?php echo (!unitravel_is_off($unitravel_animation) ? ' data-animation="'.esc_attr(unitravel_get_animation_classes($unitravel_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	unitravel_show_post_featured(array(
		'thumb_size' => unitravel_get_thumb_size($unitravel_columns==1 ? 'big' : ($unitravel_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($unitravel_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			unitravel_show_post_meta();
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div>